<?php

// error_reporting(0);

// header("Content-Type: text/event-stream");
// header("Cache-Control: no-cache");
// header("Connection: keep-alive");

// include "../../session.php";

// $response = [];


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//     if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {

function rm_array_items($index)
{
    unset($_POST[$index]);
}

//         $key = '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';
//         $url = 'https://api.openai.com/v1/completions';

//         $curl = curl_init();
//         curl_setopt($curl, CURLOPT_URL, $url);
//         $command = $_POST['command'];

//         // Set important params
//         $_POST['model'] = 'text-davinci-003';
//         $_POST["stop"] = "<|endoftext|>";
//         $_POST["stream"] = true;
//         $_POST["max_tokens"] = $_POST["word_count"];

//         //Type cast necessary numerical params
//         $_POST['temperature'] = (float) $_POST['creativity'];

//         $length = (int) $_POST['max_tokens'];

//         $length = ceil($length);

//         if ($length == 0)
//             $length = 2;
//         $_POST['max_tokens'] = $length;

/**
 * Prompts
 */
include 'prompts.php';

// Remove other unnecessary parameters            
$rm_array = array('csrf_token', 'command', 'rem_input', 'stop', 'word_count', 'creativity', 'tone');
array_map('rm_array_items', $rm_array);











// Read the POST data from the client
$json = file_get_contents('php://input');

// Parse the JSON string into a PHP object
$data = json_decode($json);
// echo $data;
// exit;
// Set the OpenAI API key
$api_key = "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'";

// Set the text generation model
$model = "text-davinci-003";

// Set the input text
$prompt = $data->prompt;

// Set the number of completions to generate
$num_completions = 100;

// Set the temperature (controls the creativity of the generated text)
$temperature = $data->creativity;

// Set the cURL options for the request
$options = array(
    CURLOPT_URL => "https://api.openai.com/v1/completions",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\n  \"model\": \"$model\",\n  \"prompt\": \"$prompt\",\n  \"max_tokens\": $num_completions,\n  \"temperature\": $temperature\n}",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer $api_key",
        "Content-Type: application/json"
    ),
);

// Initialize the cURL session
$curl = curl_init();

// Set the cURL options for the request
curl_setopt_array($curl, $options);

// Make the request
$response =
    curl_exec($curl);

if (!$response) {
    die("Connection Failure.n");
}

curl_close($curl);

// send the response back to the client
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
header("Connection: keep-alive");

echo "data: $response\n\n";
ob_flush();
flush();



















    //     $data_string = json_encode($_POST);
    //     echo $data_string;
    //     exit();
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         "Content-Type: application/json",
    //         "Authorization: Bearer " . $key
    //     ));
    //     curl_setopt($curl, CURLOPT_TIMEOUT, 30); //Timeout in seconds        
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($curl, CURLOPT_POST, 1);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    //     curl_setopt($curl, CURLOPT_WRITEFUNCTION, function ($curl, $data) {

    //         // Extract the completion text from the response
    //         $text = json_decode($data, true)->choices[0]->text;

    //         // Encode the data as a JSON object
    //         $jsonData = json_encode("data: " . $text . "\n\n");

    //         // Send the data as an SSE to the client
    //         echo $jsonData;

    //         // Flush the output buffer
    //         flush();
    //     });

    //     $curl_response = curl_exec($curl);
    //     $err = curl_error($curl);
    //     curl_close($curl);
    // } else {
    //     $response['status'] = 'hash_error';
    //     echo json_encode($response);
    // }
// }
