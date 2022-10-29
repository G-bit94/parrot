<?php

error_reporting(0);

include "../../config.php";

include "../../session.php";

$queryStatus = "";
$response = [];

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

        // save template
        if (isset($_POST['new_template'])) {
            $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");
            $text = $_POST['text'] ?? '';
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
                $sql = "INSERT INTO saved_templates (user, text, date, time) VALUES (?, ?, ?, ?)";

                if ($stmt = $mysqli->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bind_param("isss", $user_id, $text, $date, $time);

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

        // fetch all templates - dashboard page
        if (isset($_POST['fetch_all'])) {
            $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");

            $stmt_all = $mysqli->prepare("SELECT * FROM saved_templates WHERE saved_templates.user = ? ORDER BY id DESC LIMIT 50");
            $stmt_all->bind_param("s", $user_id);
            $stmt_all->execute();
            $rs_all = $stmt_all->get_result();

            if ($rs_all->num_rows !== 0) {
                foreach ($rs_all as $row) {
                    $text = $row["text"];
?>
                    <div class="list-group-item list-group-item-action d-flex gap-1 py-1 truncated" type="button" onclick="fetchSingleItem('<?php echo $row['unique_id']; ?>');">
                        <div class="d-flex gap-1 w-100 justify-content-between">
                            <div>
                                <strong><small><?php echo truncStringToNrstWord($text, 4); ?></small></strong><br>
                                <small class="mb-0"><?php echo truncStringToNrstWord($text, 12); ?></small>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else echo $noresults;
        }

        // fetch all templates - user account page
        if (isset($_POST['fetch_temps'])) {
            $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");

            $stmt_all = $mysqli->prepare("SELECT * FROM saved_templates WHERE saved_templates.user = ? ORDER BY id DESC LIMIT 50");
            $stmt_all->bind_param("s", $user_id);
            $stmt_all->execute();
            $rs_all = $stmt_all->get_result();

            if ($rs_all->num_rows !== 0) {

                ?>
                <div id="table-wrapper" class="table-responsive">
                    <table class="table table-hover align-middle overflow-auto">
                        <tbody>

                            <?php

                            $x = 1;
                            foreach ($rs_all as $row) {
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

            // Search
            if (isset($_POST['search_term'])) {

                $search_term = $_POST["search_term"];

                if (strlen($search_term) > 1) {

                    // decrypt user id
                    $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");
                    $user_id = trim($user_id);


                    // Check if the user is logged in, if not then redirect him to login page
                    if (empty($user_id)) {
                        echo "<div class='text-center'><p>You are currently logged out. </p> <br>" . "<button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#signinModal'>Signin here</button></div>";
                        exit;
                    }

                    $base_url = "/parrot";

                    $limit = 20;
                    $order = " ORDER BY unique_id ";
                    $sort = " DESC ";

                    $where = "WHERE CONCAT (saved_templates.text, 
                            saved_templates.date, 
                            saved_templates.time)
                            LIKE CONCAT('%',?,'%') AND saved_templates.user = '$user_id'";

                    // count all results to limit accordingly
                    $sql_count = "SELECT * FROM saved_templates $where";

                    $stmt_count = $mysqli->prepare($sql_count);
                    $stmt_count->bind_param("s", $param_term);
                    $param_term = $search_term . '%';
                    $stmt_count->execute();
                    $result_count = $stmt_count->get_result();

                    // final query
                    $sql = $sql_count . $order .  $sort . " LIMIT " . $limit;

                    ob_start();
                    if ($stmt = $mysqli->prepare($sql)) {
                        $stmt->bind_param("s", $param_term);
                        $param_term = $search_term . '%';
                        if ($stmt->execute()) {
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) { ?>
                                <div id="table-wrapper" class="table-responsive">
                                    <table class="table table-hover align-middle overflow-auto">
                                        <tbody>
                                            <?php
                                            if ($result_count->num_rows > $limit) { ?>
                                                <div class="col-sm p-1 rounded-3 card-body m-3">
                                                    <div class="col-sm p-1 shadow rounded-top fs-6">
                                                        Some records have been omitted from the results but you can view all <a href="<?php echo $base_url . '/?filter=true&search=' . $search_term; ?>" class="bg-primary text-white btn btn-sm clickable"> here</a>
                                                    </div>
                                                </div>
                                            <?php }
                                            $x = 1;
                                            foreach ($result as $row) {
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
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            } else {
                                ob_start(); ?>
                                <div class="p-1 m-1 text-center">
                                    <?php echo "<span class='fs-6 fw-bold'>No results found!<span>"; ?>
                                </div>
                        <?php
                                $no_results = ob_get_clean();
                                echo $no_results;
                            }
                        }
                    } else { ?>
                        <div class="col-sm p-1 rounded-3 card-body m-3">
                            <div class="col-sm p-1 shadow rounded-top">
                                <i class="bi bi-emoji-smile-upside-down"></i>Dang! Something went wrong. </span>
                            </div>
                        </div>
                    <?php
                    }
                    $search_results = ob_get_clean();
                    echo $search_results;
                    ?>
                <?php
                } else {
                ?>
                    <div class="p-1 m-1 text-center">
                        <?php echo "<span class='fs-6 fw-bold'>Search term is too short!<span>"; ?>
                    </div>
    <?php }
            }

            // fetch single
            if (isset($_POST['fetch_single'])) {
                $template = openssl_decrypt($_POST['template'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheLastInsertedId");

                $stmt = $mysqli->prepare("SELECT text, date, time FROM saved_templates WHERE saved_templates.id = ?");
                $stmt->bind_param("s", $template);
                $stmt->execute();
                $rs = $stmt->get_result();

                if ($rs->num_rows !== 0) {
                    $row = $rs->fetch_assoc();
                    $response["uid"] = $_POST["template"];
                    $response["text"] = $row["text"];
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
        }
    }
