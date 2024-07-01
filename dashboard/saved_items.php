<?php

include "../config.php";

error_reporting(0);

$queryStatus = "";
$response = [];

$noresults = '
<div class="modal-content rounded-6">        
    <h5 class="bg-danger text-white rounded-top fw-bold">Blimey!</h5>        
    <p class="p-1 fs-6">No results found.<br></p>    
</div>';

$generalError = '
<div class="modal-content rounded-6">        
    <h5 class="bg-danger text-white rounded-top fw-bold">Blimey!</h5>        
    <p class="p-1 fs-6">Oops! An error occurred.<br></p>    
</div>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_POST = json_decode(file_get_contents('php://input'), true);

    // save item
    if (isset($_POST['new_item'])) {
        $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");
        $text = $_POST['text'] ?? ''; //Yep, unescaped -\_(^_^)_/- //prepared statements :) Youre welcome
        $date = date("Y-m-d");
        $time = date("H:i:s");

        // Validate text   
        $sql_check = "SELECT text FROM saved_items WHERE text = '$text' AND saved_items.user = '$user_id'";
        $rs_check = $mysqli->query($sql_check);

        if ($rs_check->num_rows !== 0) {
            $queryStatus = "ITEM_EXISTS";
        }

        // Check input errors before inserting in database
        if (empty($queryStatus)) {

            // Prepare an insert statement
            $sql = "INSERT INTO saved_items (user, text, date, time) VALUES (?, ?, ?, ?)";

            if ($stmt = $mysqli->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("isss", $user_id, $text, $date, $time);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {

                    $id = $mysqli->insert_id;

                    // Encrypt latest id                        
                    $encrypted_string = openssl_encrypt($id, "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheLastInsertedId");

                    // Set indentifier
                    $q = "UPDATE saved_items SET unique_id = '$encrypted_string' WHERE id = '$id'";
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

    // fetch all items 
    if (isset($_POST['fetch_all'])) {
        $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");

        $sqla = "SELECT * FROM saved_items WHERE saved_items.user = '$user_id' ORDER BY id DESC LIMIT 20";
        $rsa = $mysqli->query($sqla);

        if ($rsa->num_rows !== 0) {
            foreach ($rsa as $row) {
                $text = $row["text"];
?>
                <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="itemDetails('<?php echo $row['unique_id']; ?>');">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <strong><?php echo mb_strimwidth($text, 0, 20, "..."); ?></strong><br>
                            <small class="mb-0"><?php echo mb_strimwidth($text, 0, 90, "..."); ?></small>
                        </div>
                    </div>
                </div>
<?php
            }
        } else echo $noresults;
    }

    // fetch single
    if (isset($_POST['fetch_single'])) {
        $item = openssl_decrypt($_POST['item'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheLastInsertedId");

        $sqla = "SELECT text, date, time FROM saved_items WHERE saved_items.id = '$item'";
        $rsa = $mysqli->query($sqla);
        if ($rsa->num_rows > 0) {
            $row = $rsa->fetch_assoc();
            $response["uid"] = $_POST["item"];
            $response["text"] = $row["text"];
            $response["title"] = mb_strimwidth($row["text"], 0, 20, "...");
            $response["status"] = "SUCCESS";
            $response["date"] = date("D, d M Y", strtotime($row["date"]));
            $response["time"] = date("H:i a", strtotime($row["time"]));
        } else {
            $response["status"] = "ERROR";
            $response["error"] = $noresults;
        }
        echo json_encode($response);
    }

    // delete
    if (isset($_POST['delete'])) {
        if ($_POST["delete"] === "single") {
            $item = openssl_decrypt($_POST['item'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheLastInsertedId");
            $sqla = "DELETE FROM saved_items WHERE saved_items.id = '$item'";
        } else if ($_POST["delete"] === "clear") {
            $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");
            $sqla = "DELETE FROM saved_items WHERE saved_items.user = '$user_id'";
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
