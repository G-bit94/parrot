<?php

include '../../session.php';

@ini_set('zlib.output_compression', 0);

ob_implicit_flush(true);
ob_end_flush();

$temperature = 0.5;
$max_tokens = 100;

$OPENAI_API_KEY = "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";
$data = array(
    'model' => 'text-davinci-003',
    'prompt' => $_SESSION['prompt'],
    'temperature' => $temperature,
    'max_tokens' => $max_tokens,
    'top_p' => 1.0,
    'stream' => TRUE, // stream back response
    'frequency_penalty' => 0.0,
    'presence_penalty' => 0.0
);

// Set content type and cache control headers
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");

// Run only once
for ($i = 0; $i < 1; $i++) {


    $post_json = json_encode($data);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.openai.com/v1/completions');
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = "Authorization: Bearer $OPENAI_API_KEY";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_json);
    curl_setopt($curl, CURLOPT_WRITEFUNCTION, function ($curl, $data) {
        //   str_repeat(' ',1024*8) is needed to fill the buffer and will make streaming the data possible
        echo $data;
        return strlen($data);
    });

    $result = curl_exec($curl);
    echo $result;
    if (connection_aborted()) break;
    curl_close($curl);
}

// session_start();

// // Check if the session_id cookie is set
// if (isset($_COOKIE['session_id'])) {
//     // Set the session ID from the cookie
//     session_id($_COOKIE['session_id']);
// }

// // Restore the session data from the temporary variable
// $_SESSION = $_SESSION_INIT;

// $_SESSION_INIT = $_SESSION;
