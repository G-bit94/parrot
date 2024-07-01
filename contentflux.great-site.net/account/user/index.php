<?php

error_reporting(0);

include "../../config.php";

include "../../session.php";

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {

    $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");

    $username = $_POST['edit_username'];
    $lname = $_POST['edit_lname'];
    $email = $_POST['edit_user_email'];

    if (!empty($username) && !empty($lname) && !empty($email)) {
        $sql = "UPDATE users SET username = ?, l_name = ?, email = ? WHERE id = ?";

        if ($stmt = $mysqli->prepare($sql)) {

            $stmt->bind_param("ssss", $username, $lname, $email, $user_id);

            if ($stmt->execute()) {
                $response["status"] = "SUCCESS";
                $response["message"] = "Details updated successfully";
            } else {
                $response["status"] = "ERROR";
                $response["message"] = "Sorry, couldn't updated your details";
            }

            $stmt->close();
        } else {
            $response["status"] = "ERROR";
            $response["message"] = "Sorry, couldn't updated your details";
        }
    } else {
        $response["status"] = "ERROR";
        $response["message"] = "Please fill out all fields";
    }

    echo json_encode($response);
    // }

}
