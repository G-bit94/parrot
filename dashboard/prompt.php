<?php

// error_reporting(0);

set_time_limit(60); // TIME LIMIT IN SECONDS

header("Content-Type:application/json");

include "../session.php";

$response = [];

function generateText()
{
    $url = 'https://api.eleuther.ai/completion';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($curl, CURLOPT_TIMEOUT, 50); //Timeout in seconds
    $data_string = json_encode($_POST);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    return $curl_response;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = json_decode(file_get_contents('php://input'), true);
    // demo prompt
    if (isset($_POST['demo'])) {
        $response['signon'] = 'signedout';
        $response['results'] = json_decode(generateText());
        echo json_encode($response);
    } else {
        if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            echo generateText();
        }
    }
}
