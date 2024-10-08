<?php

// error_reporting(0);

set_time_limit(40); // TIME LIMIT IN SECONDS

header("Content-Type:application/json");

include "../../session.php";

$response = [];

function generateText()
{

    //Type cast necessary numerical params
    $_POST['temperature'] = (float) $_POST['temperature'];
    $_POST['max_tokens'] = (int) $_POST['max_tokens'] / 4; //Should be a factor of 4

    function curlRequest($url, $api, $key)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($api === 'Goose') {

            //Set the Authorization header
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: Bearer ' . $key));

            $_POST['frequency_penalty'] = 1.0;

            // Remove unnecessary parameters in Goose API request
            $rm_array = array('rem_input');
        } elseif ($api === 'Eleuther') {

            // Set headers to spoof browser request    
            $headers = array(
                'POST /completion HTTP/1.1',
                'Host: api.eleuther.ai',
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0',
                'Accept: application/json',
                'Accept-Language: en-US,en;q=0.5',
                'Accept-Encoding: gzip, deflate, br',
                'Referer: https://6b.eleuther.ai/',
                'Content-Type: application/json',
                'Content-Length: 95',
                'Origin: https://6b.eleuther.ai',
                'Connection: keep-alive',
                'Sec-Fetch-Dest: empty',
                'Sec-Fetch-Mode: cors',
                'Sec-Fetch-Site: same-site'
            );

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            // Set parameters in Eleuther API request
            $rm_array = array('prompt', 'max_tokens', 'temperature', 'stop', 'rem_input');

            $_POST['context'] = $_POST['prompt'];
            $_POST['top_p'] = 0.9;
            $_POST['temp'] = $_POST['temperature'];
            $_POST['response_length'] = $_POST['max_tokens'];
            $_POST['remove_input'] = true;
        } elseif ($api === 'OpenAI') {
            //Set the Authorization header
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: Bearer ' . $key));

            // Remove unnecessary parameters in Goose API request
            $rm_array = array('rem_input');
            $_POST['model'] = 'text-davinci-002';
        }

        array_map('rm_array_items', $rm_array);

        // Remove other unnecessary parameters
        unset($_POST['csrf_token']);

        $data_string = json_encode($_POST);

        curl_setopt($curl, CURLOPT_TIMEOUT, 39); //Timeout in seconds        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            $response['status'] = "cURL Error #:" . $err;
            return false;
        } else {
            return $curl_response;
        }
    }

    function rm_array_items($index)
    {
        unset($_POST[$index]);
    }

    // Eleuther API
    function genEleuther()
    {
        $api = 'Eleuther';
        $url = 'https://api.eleuther.ai/completion';
        // $text = json_decode(curlRequest($url, $api, '')[0])->generated_text;
        // $text = json_decode(curlRequest($url, $api, ''))[0]->generated_text;
        $text = curlRequest($url, $api, '');
        return $text;
    }

    // Goose API
    function genGoose()
    {
        $api = 'Goose';
        $key = "sk-CiBPYrqosAQcJZMrkAn6ZCckL3KCYoO509g2NeC6w3ziLvMg";
        $url = 'https://api.goose.ai/v1/engines/gpt-j-6b/completions';
        $text = json_decode(curlRequest($url, $api, $key))->choices[0]->text;
        return $text;
    }

    // OpenAI
    function genOpenAI()
    {
        $api = 'OpenAI';
        $key = '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';
        $url = 'https://api.openai.com/v1/completions';
        $text = json_decode(curlRequest($url, $api, $key))->choices[0]->text;
        return $text;
    }

    $text = genGoose();

    return $text;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = json_decode(file_get_contents('php://input'), true);

    // demo prompt
    if (isset($_POST['demo'])) {
        $response['signon'] = 'signedout';
        // $response['results'] = json_decode(generateText());
        echo json_encode($response);
    } else {
        if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {
            if (empty($response['status'])) {
                echo json_encode(generateText());
            } else {
                echo json_encode($response['status']);
            }
        }
    }
}
