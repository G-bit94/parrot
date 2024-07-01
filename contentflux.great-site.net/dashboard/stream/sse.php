<?php

// This should be at the very top, alternatively can be set in you php.ini file
@ini_set('zlib.output_compression', 0);
// @ini_set('implicit_flush', 1);
// This function discards the contents of the topmost output buffer and turns off this output buffering.
// @ob_end_clean();

ob_implicit_flush(true);
ob_end_flush();

// header("Connection: keep-alive");

// $json = file_get_contents('php://input');
// $data = json_decode($json);
// $api_key = "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";
// $model = "text-davinci-003";
// $prompt = $data->prompt;
// $num_completions = $data->num_completions;
// $temperature = $data->temperature;

// $payload = "{\n  \"model\": \"$model\",\n  \"prompt\": \"$prompt\",\n  \"max_tokens\": $num_completions,\n  \"temperature\": $temperature,\n  \"stream\": true\n}";
// // echo $payload;
// // exit;

// $curl = curl_init();

// function write_callback($curl, $data)
// {
//     while (true) {
//         $response_obj = json_decode($data);
//         if (isset($response_obj->choices) && is_array($response_obj->choices)) {
//             $text = $response_obj->choices[0]->text;

//             if ($response_obj->choices[0]->finish_reason == "length") {
//                 $resp = "DONE";
//                 break;
//             }

//             $resp = "data: $text\n\n";

//             if (connection_aborted()) break;

//             ob_flush();
//             flush();

//             sleep(1);
//         } else {
//             $resp = "No text available";
//         }

//         # str_repeat(' ',1024*8) is needed to fill the buffer and will make streaming the data possible
//         //    echo $data.str_repeat(' ',1024*8);
//         $response = $resp . str_repeat(' ', 1024 * 8);
//         return $response . "\n";
//     }
// }


// $options = array(
//     CURLOPT_URL => "https://api.openai.com/v1/completions",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_VERBOSE => true,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "POST",
//     CURLOPT_POSTFIELDS => $payload,
//     CURLOPT_HTTPHEADER => array(
//         "Authorization: Bearer $api_key",
//         "Content-Type: application/json"
//     ),
//     CURLOPT_WRITEFUNCTION => "write_callback"
// );

// curl_setopt_array($curl, $options);

// $curl_response = curl_exec($curl);

// $err = curl_error($curl);
// curl_close($curl);

// if ($err) {
//     echo "Error: " . $err;
// } else {
//     header("Content-Type: text/event-stream");
//     header("Cache-Control: no-cache");
//     header("Connection: keep-alive");
//     echo $curl_response;
// }

// function openAI()
// {
//     $OPENAI_API_KEY = "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";

//     $prompt = "tell me what you can do for me.";
//     $temperature = 0.5;  // 1 adds complete randomness  0 no randomness 0.0
//     $max_tokens = 60;

//     $data = array(
//         'model' => 'text-davinci-003',
//         'prompt' => $prompt,
//         'temperature' => $temperature,
//         'max_tokens' => $max_tokens,
//         'top_p' => 1.0,
//         'stream' => TRUE, // stream back response
//         'frequency_penalty' => 0.0,
//         'presence_penalty' => 0.0
//     );

//     $post_json = json_encode($data);
//     $curl = curl_init();
//     curl_setopt($curl, CURLOPT_URL, 'https://api.openai.com/v1/completions');
//     $headers = array();
//     $headers[] = 'Content-Type: application/json';
//     // $headers[] = 'Content-Type: text/event-stream';
//     $headers[] = "Authorization: Bearer $OPENAI_API_KEY";
//     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($curl, CURLOPT_POST, 1);
//     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($curl, CURLOPT_POSTFIELDS, $post_json);
//     curl_setopt($curl, CURLOPT_WRITEFUNCTION, function ($curl, $data) {
//         # str_repeat(' ',1024*8) is needed to fill the buffer and will make streaming the data possible
//         // while (true) {
//         // echo $data . str_repeat(' ', 1024);
//         echo $data;
//         // $c = strlen($data);
//         // var_dump($c);
//         return strlen($data);

//         ob_end_flush();
//         flush();

//         // Break the loop if the client aborted the connection (closed the page)

//         //     if (connection_aborted()) break;
//         //     sleep(0.1);
//         // }
//     });


//     $result = curl_exec($curl);
//     return $result;

//     curl_close($curl);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

$_POST = json_decode(file_get_contents('php://input'), true);

$prompt = $_POST['prompt'];

// $prompt = "Write an article on Why AI is Not Going to Replace Human Employees Any Soon";
$temperature = 0.5;  // 1 adds complete randomness  0 no randomness 0.0
$max_tokens = 100;

// exit;

header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");

// Run only once
for ($i = 0; $i < 1; $i++) {

    $OPENAI_API_KEY = "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";

    $data = array(
        'model' => 'text-davinci-003',
        'prompt' => $prompt,
        'temperature' => $temperature,
        'max_tokens' => $max_tokens,
        'top_p' => 1.0,
        'stream' => TRUE, // stream back response
        'frequency_penalty' => 0.0,
        'presence_penalty' => 0.0
    );

    $post_json = json_encode($data);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.openai.com/v1/completions');
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    // $headers[] = 'Content-Type: text/event-stream';
    $headers[] = "Authorization: Bearer $OPENAI_API_KEY";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_json);
    curl_setopt($curl, CURLOPT_WRITEFUNCTION, function ($curl, $data) {
        # str_repeat(' ',1024*8) is needed to fill the buffer and will make streaming the data possible
        // while (true) {
        // echo $data . str_repeat(' ', 1024);
        echo $data;
        // $c = strlen($data);
        // var_dump($c);
        return strlen($data);
        // return 0;

        // ob_end_flush();
        // flush();

        // Break the loop if the client aborted the connection (closed the page)

        //     if (connection_aborted()) break;
        //     sleep(0.1);
        // }
    });

    $result = curl_exec($curl);
    echo $result;
    if (connection_aborted()) break;
    curl_close($curl);
}
// }

// $obj = (object) $response;
// var_dump($obj);
