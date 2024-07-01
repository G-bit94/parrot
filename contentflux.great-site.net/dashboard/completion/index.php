<?php

include "../../session.php";

header('Content-Type: application/json');

$_POST = json_decode(file_get_contents('php://input'), true);

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (hash_equals($_POST['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {
        // $_SESSION += $_POST;
        $_SESSION = array_merge($_SESSION, $_POST);
    } else {
        $response['status'] = 'hash_error';
        echo json_encode($response['status']);
    }

    // print_r($_SESSION);
}
