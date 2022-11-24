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

            // Remove unnecessary parameters in Goose API request
            $rm_array = array('rem_input');
        } elseif ($api === 'OpenAI') {
            //Set the Authorization header
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: Bearer ' . $key));

            $_POST['model'] = 'text-davinci-edit-001';
            $_POST['input'] = $_POST['prompt'];
            $_POST['instruction'] = "Rewrite the following paragraph without changing its meaning and using as few words from the original paragraph as possible";

            // Remove unnecessary parameters in OpenAI API request
            $rm_array = array('rem_input', 'prompt', 'stop', 'max_tokens');
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
        $url = 'https://api.openai.com/v1/edits';
        $text = json_decode(curlRequest($url, $api, $key))->choices[0]->text;
        return $text;
    }

    // TextCortex API
    function genHemingwAI()
    {
        $api = 'hemingwai';
        $key = 'gAAAAABjXQytyEPV48PJ-3lTSOqFaaLSBMthrH8fQEzW6Tgq-6uwjM0PoJAHBSUGddybaJx9Kzh3KtWskLo7_HSe7QYLS1TFN1QzSD5VwQZGRWRYzPY8QTwQH1OIPDGVWHiVXTnRAPj6';
        $url = 'https://api.textcortex.com/hemingwai/generate_text_v3/';
        $text = json_decode(curlRequest($url, $api, $key))->choices[0]->text;
        return $text;
    }

    $text = genHemingwAI();

    return $text;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = json_decode(file_get_contents('php://input'), true);

    // demo prompt
    if (isset($_POST['demo'])) {
        $response['signon'] = 'signedout';
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
