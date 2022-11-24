<?php

error_reporting(0);

include "../../config.php";

include "../../session.php";

$queryStatus = "";
$response = [];

$base_url = "/parrot";

$today = date("Y-m-d");

$noresults = '
<div class="modal-content rounded-6">        
    <h6 class="bg-primary p-1 text-white rounded-top fw-bold">Blimey!</h6>        
    <p class="p-1 fs-6">It' . "'" . 's so empty here. <i class="bi bi-emoji-neutral"></i><br></p>    
</div>';

$generalError = '
<div class="modal-content rounded-6">        
    <h6 class="bg-primary p-1 text-white rounded-top fw-bold">Blimey!</h6>        
    <p class="p-1 fs-6">Oops! An error occurred.<br></p>    
</div>';

// Truncate strings by words
function truncStringToNrstWord($phrase, $max_words)
{
    $phrase_array = explode(' ', $phrase);
    if (count($phrase_array) > $max_words && $max_words > 0)
        $phrase = implode(' ', array_slice($phrase_array, 0, $max_words)) . '...';
    return $phrase;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_POST = json_decode(file_get_contents('php://input'), true);

    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {

        $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");

        // save template
        if (isset($_POST['new_template'])) {

            $text = $_POST['text'] ?? '';
            $type = $mysqli->real_escape_string($_POST['type']) ?? '';
            $category = $mysqli->query("SELECT id FROM content_types WHERE type = '$type'")->fetch_assoc()['id'];
            $text_esc = str_replace("'", "''", $text); //escape apostrophe ' using  ''
            $date = date("Y-m-d");
            $time = date("H:i:s");

            // Validate text   
            $stmt_check = $mysqli->prepare("SELECT text FROM saved_templates WHERE text = ? AND saved_templates.user = ?");
            $stmt_check->bind_param("ss", $text_esc, $user_id);
            $stmt_check->execute();

            $rs_check = $stmt_check->get_result();
            if ($rs_check->num_rows !== 0) {
                $queryStatus = "ITEM_EXISTS";
            }

            // Check input errors before inserting in database
            if (empty($queryStatus)) {

                // Prepare an insert statement
                $sql = "INSERT INTO saved_templates (user, text, category, date, time) VALUES (?, ?, ?, ?, ?)";

                if ($stmt = $mysqli->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("issss", $user_id, $text, $category, $date, $time);

                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {

                        $id = $mysqli->insert_id;

                        // Encrypt latest id                        
                        $encrypted_string = openssl_encrypt($id, "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheLastInsertedId");

                        // Set indentifier
                        $q = "UPDATE saved_templates SET unique_id = '$encrypted_string' WHERE id = '$id'";
                        if ($mysqli->query($q)) {
                            $queryStatus = "SUCCESS";
                        } else {
                            $queryStatus = "ERROR";
                        }
                    } else {
                        $queryStatus = "ERROR";
                    }

                    // Close statement
                    $stmt->close();
                } else {
                    $queryStatus = "ERROR";
                }
            }
            // Close connection
            $mysqli->close();
            $response["status"] = $queryStatus;
            echo json_encode($response);
        }

        // fetch single
        if (isset($_POST['fetch_single'])) {
            $template = openssl_decrypt($_POST['template'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheLastInsertedId");

            $stmt = $mysqli->prepare("SELECT content_types.id, content_types.full_name, text, date, time FROM saved_templates
            LEFT OUTER JOIN content_types ON saved_templates.category = content_types.id WHERE saved_templates.id = ?");
            $stmt->bind_param("s", $template);
            $stmt->execute();
            $rs = $stmt->get_result();

            if ($rs->num_rows !== 0) {
                $row = $rs->fetch_assoc();
                $response["uid"] = $_POST["template"];
                $response["text"] = $row["text"];
                $response["category"] = $row["full_name"];
                $response["title"] = truncStringToNrstWord($row['text'], 2);
                $response["status"] = "SUCCESS";
                $response["date"] = date("D, d M Y", strtotime($row["date"]));
                $response["time"] = date("H:i a", strtotime($row["time"]));
            } else {
                $response["status"] = "ERROR";
                $response["error"] = $generalError;
            }
            echo json_encode($response);
        }


        // Fetch templates
        if (isset($_POST['page'])) {
            $page = $mysqli->real_escape_string($_POST['page']) ?? '';
            $intent = $mysqli->real_escape_string($_POST['intent']) ?? '';
            $rs =  '';

            // Dashboard page
            // List
            if ($page == 'dashboard') {
                if ($intent == 'list') {
                    $limit = 20;
                    $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");

                    $stmt = $mysqli->prepare("SELECT content_types.full_name, saved_templates.* FROM saved_templates 
                    LEFT OUTER JOIN content_types ON saved_templates.category = content_types.id WHERE saved_templates.user = ? ORDER BY id DESC LIMIT $limit");
                    $stmt->bind_param("s", $user_id);
                    $stmt->execute();
                    $rs = $stmt->get_result();
                }

                // Search
                if ($intent == 'search') {
                    $search_term = $mysqli->real_escape_string($_POST['search_term']) ?? '';
                    // Check if the user is logged in, if not then redirect him to login page
                    if (empty($user_id)) {
                        echo "<div class='text-center'><p>You are currently logged out. </p> <br>" . "<button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#signinModal'>Signin here</button></div>";
                        exit;
                    }

                    $limit = 20;
                    $order = " ORDER BY unique_id ";
                    $sort = " DESC ";

                    $where = "WHERE CONCAT (saved_templates.text, 
                                                content_types.full_name,
                                                saved_templates.date, 
                                                saved_templates.time)
                                                LIKE CONCAT('%',?,'%') AND saved_templates.user = '$user_id'";

                    // count all results to limit accordingly
                    $sql_count = "SELECT content_types.full_name, saved_templates.* FROM saved_templates
                    LEFT OUTER JOIN content_types ON saved_templates.category = content_types.id $where";

                    $stmt_count = $mysqli->prepare($sql_count);
                    $stmt_count->bind_param("s", $param_term);
                    $param_term = $search_term . '%';
                    $stmt_count->execute();
                    $result_count = $stmt_count->get_result();

                    // final query
                    $sql = $sql_count . $order .  $sort . " LIMIT " . $limit;

                    ob_start();
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $param_term);
                    $param_term = $search_term . '%';
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $rs = $result;
                }

                if ($rs->num_rows !== 0) {
                    foreach ($rs as $row) {
                        $text = $row["text"];
?>
                        <object>
                            <div class="position-relative col-md rounded-3 border shadow-sm" role="button" onclick="fetchSingleItem('<?php echo $row['unique_id']; ?>');">
                                <label class="py-2 px-2">
                                    <div class="d-flex-justify-content-between">
                                        <strong class="fw-semibold">
                                            <small>
                                                <?php echo truncStringToNrstWord($text, 5); ?>
                                            </small>
                                        </strong>
                                        <span class="badge bg-primary opacity-75"><?php echo $row['full_name'] ?></span>
                                        <span class="d-block small mt-2"><?php echo truncStringToNrstWord($text, 20); ?></span>
                                </label>
                            </div>
                        </object>
                    <?php
                    }
                } else echo $noresults;
            }

            //Account page
            if ($page == 'account') {
                // List
                if ($intent == 'list') {
                    $stmt = $mysqli->prepare("SELECT content_types.full_name, saved_templates.* FROM saved_templates
                    LEFT OUTER JOIN content_types ON saved_templates.category = content_types.id WHERE saved_templates.user = ? ORDER BY id DESC LIMIT 50");
                    $stmt->bind_param("s", $user_id);
                    $stmt->execute();
                    $rs = $stmt->get_result();
                }

                // Search
                if ($intent == 'search') {

                    $search_term = $mysqli->real_escape_string($_POST['search_term']) ?? '';

                    // Check if the user is logged in, if not then redirect him to login page
                    if (empty($user_id)) {
                        echo "<div class='text-center'><p>You are currently logged out. </p> <br>" . "<button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#signinModal'>Signin here</button></div>";
                        exit;
                    }

                    $limit = 20;
                    $order = " ORDER BY unique_id ";
                    $sort = " DESC ";

                    $where = "WHERE CONCAT (saved_templates.text, 
                                                content_types.full_name,
                                                saved_templates.date, 
                                                saved_templates.time)
                                                LIKE CONCAT('%',?,'%') AND saved_templates.user = '$user_id'";

                    // count all results to limit accordingly
                    $sql_count = "SELECT content_types.full_name, saved_templates.* FROM saved_templates 
                    LEFT OUTER JOIN content_types ON saved_templates.category = content_types.id $where";

                    $stmt_count = $mysqli->prepare($sql_count);
                    $stmt_count->bind_param("s", $param_term);
                    $param_term = $search_term . '%';
                    $stmt_count->execute();
                    $result_count = $stmt_count->get_result();

                    // final query
                    $sql = $sql_count . $order .  $sort . " LIMIT " . $limit;

                    ob_start();
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $param_term);
                    $param_term = $search_term . '%';
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $rs = $result;
                }

                if ($rs->num_rows !== 0) {
                    ?>

                    <div id="table-wrapper" class="table-responsive">
                        <table class="table table-hover align-middle overflow-auto">
                            <tbody>

                                <?php

                                $x = 1;
                                foreach ($rs as $row) {
                                    $text = $row["text"];
                                ?>

                                    <tr class="spacer" style="height: 6px;"><input type="hidden" name="keys_array[]" value="<?php echo $row["unique_id"]; ?>" /></tr>
                                    <tr class="rounded-3 card-body shadow-sm reg-rows">
                                        <td class="p-1 border-end border-bottom-0 text-center counter">
                                            <?php
                                            echo $x;
                                            $x++;
                                            ?>
                                        </td>
                                        <td class="p-1 border-0"><strong><small><?php echo truncStringToNrstWord($text, 3); ?></small></strong></td>
                                        <td class="p-1 border-0"><small class="mb-0"><?php echo truncStringToNrstWord($text, 15); ?></small></td>
                                        <td class="p-1 border-0">
                                            <small>
                                                <?php
                                                $reg_date = date("Y-m-d", strtotime($row["date"]));
                                                if ($reg_date === $today) {
                                                    echo "Today";
                                                } else {
                                                    echo date("d M", strtotime($row["date"]));
                                                }
                                                // echo date("d M", strtotime($row["date"])); 
                                                ?>
                                                <br>
                                                <?php echo date("H:i", strtotime($row["time"])); ?>
                                            </small>
                                        </td>
                                        <td class="py-1 rounded-end border-0" onclick="fetchSingleItem('<?php echo $row['unique_id']; ?>');" type="button">
                                            <i class="bi bi-three-dots-vertical fs-5"></i>
                                        </td>
                                        <td class="py-1 rounded-end border-0" onclick="fetchSingleItem('<?php echo $row['unique_id']; ?>');" type="button">
                                            <div class="form-check">
                                                <input class="form-check-input position-static" onclick="" name="uids_array[]" value="" data-bs-toggle="tooltip" title="Click to approve" type="checkbox">
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo $noresults;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

    <?php
            }
        }

        // delete
        if (isset($_POST['delete'])) {
            if ($_POST["delete"] === "single") {
                $template = openssl_decrypt($_POST['template'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheLastInsertedId");
                $sqla = "DELETE FROM saved_templates WHERE saved_templates.id = '$template'";
            } else if ($_POST["delete"] === "clear") {
                $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");
                $sqla = "DELETE FROM saved_templates WHERE saved_templates.user = '$user_id'";
            }
            if ($mysqli->query($sqla) == true) {
                $response["status"] = "SUCCESS";
            } else {
                $response["status"] = "ERROR";
                $response["error"] = $generalError;
            }
            echo json_encode($response);
        }
    } else echo $sign_in_btn;
}
