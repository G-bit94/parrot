<?php

// error_reporting(0);

// header("Content-Type:application/json");
// header("Content-Type: text/event-stream");
// header("Cache-Control: no-cache");
// header("Connection: keep-alive");

// This should be at the very top, alternatively can be set in you php.ini file
@ini_set('zlib.output_compression', 0);
@ini_set('implicit_flush', 1);
// This function discards the contents of the topmost output buffer and turns off this output buffering.
@ob_end_clean();

include "../../session.php";

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = json_decode(file_get_contents('php://input'), true);

    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {
        if (empty($response['status'])) {
            // echo json_encode(generateText());

            function rm_array_items($index)
            {
                unset($_POST[$index]);
            }

            $key = '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';
            $url = 'https://api.openai.com/v1/completions';

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            $command = $_POST['command'];

            // Set important params
            $_POST['model'] = 'text-davinci-003';
            $_POST["stream"] = true;
            $_POST["max_tokens"] = $_POST["word_count"];

            //Type cast necessary numerical params
            $_POST['temperature'] = (float) $_POST['creativity'];

            $length = (int) $_POST['max_tokens'];

            $length = ceil($length);

            if ($length == 0)
                $length = 2;
            $_POST['max_tokens'] = $length;

            // Remove other unnecessary parameters            
            $rm_array = array('csrf_token', 'command', 'rem_input', 'word_count', 'creativity');


            /**
             * Prompt building
             */
            include 'prompts.php';

            // Remove other unnecessary parameters            
            array_push($rm_array, 'tone');
            array_map('rm_array_items', $rm_array);

            $data_string = json_encode($_POST);
            // echo json_encode($data_string);
            // exit();
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "Authorization: Bearer " . $key
            ));
            curl_setopt($curl, CURLOPT_TIMEOUT, 30); //Timeout in seconds        
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_VERBOSE, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($curl, CURLOPT_WRITEFUNCTION, function ($curl, $data) {
                # str_repeat(' ',1024*8) is needed to fill the buffer and will make streaming the data possible
                echo $data . str_repeat(' ', 1024 * 8);
                return strlen($data);
            });

            $curl_response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            // Check for cURL error
            if ($err)
                $response['status'] = $err;

            echo $curl_response;

            // $response_obj = json_decode($curl_response, true);

            // while (true) {

            //     $text = $response_obj->choices[0]->text;

            //     if ($response_obj->choices[0]->finish_reason == "length") {
            //         $text =  "[DONE]";
            //         break;
            //     }

            //     // $text = $response_obj->choices[0]->text;

            //     echo json_encode($text);

            //     ob_flush();
            //     flush();
            //     sleep(1);
            // }
        } else {
            echo json_encode($response['status']);
        }
    } else {
        $response['status'] = 'hash_error';
        echo json_encode($response);
    }
}
