<?php

error_reporting(0);

include "../../config.php";

include "../../session.php";

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = json_decode(file_get_contents('php://input'), true);

    // if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {

    $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");

    if (isset($_POST['action'])) {

        $url = $_POST['url'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        if ($_POST['action'] == "add" || $_POST['action'] == "update") {

            if (!empty($url) && !empty($username) && !empty($pass)) {
                $sql = "UPDATE users SET wp_user = ?, wp_pass = ?, wp_url = ? WHERE id = ?";

                if ($stmt = $mysqli->prepare($sql)) {

                    $stmt->bind_param("ssss", $username, $pass, $url, $user_id);

                    if ($stmt->execute()) {
                        $response["status"] = "SUCCESS";
                        $response["message"] = "WordPress credentials saved successfully";
                    } else {
                        $response["status"] = "ERROR";
                        $response["message"] = "Sorry, couldn't save WordPress credentials";
                    }

                    $stmt->close();
                }
            } else {
                $response["status"] = "ERROR";
                $response["message"] = "Please fill out all fields";
            }
        }

        echo json_encode($response);
        // }
    }
}
