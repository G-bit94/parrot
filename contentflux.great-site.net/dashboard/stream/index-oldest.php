<?php

error_reporting(0);

set_time_limit(60); // TIME LIMIT IN SECONDS

header("Content-Type:application/json");

include "../../session.php";

$response = [];

function generateText()
{
    $key = "sk-mvDpjkFThv1Jr3BbydtUjhcrRRBx7w0OLoyuTFmvholGjBOn";
    $url = 'https://api.goose.ai/v1/engines/gpt-j-6b/completions';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: Bearer ' . $key));
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); //Timeout in seconds

    //Type cast necessary integer params
    $_POST['temperature'] = (int) $_POST['temperature'];
    $_POST['max_tokens'] = (int) $_POST['max_tokens'];


    $data_string = json_encode($_POST);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    $text = json_decode($curl_response)->choices[0]->text;
    return $text;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = json_decode(file_get_contents('php://input'), true);
    $max_tokens = $_POST['max_tokens'];
    $_POST['max_tokens'] = $max_tokens / 4;

    // demo prompt
    if (isset($_POST['demo'])) {
        $response['signon'] = 'signedout';
        // $response['results'] = json_decode(generateText());
        echo json_encode($response);
    } else {
        if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {
            echo json_encode(generateText());
        }
    }
}
