<?php

// Sample request

$data_string = '{
    "template_name": "paraphrase",
    "prompt": {
        "original_sentence": "If you have a knack for organization, you can make money online as a virtual assistant helping people to keep their days in order. A virtual assistant will do everything from bookkeeping to research, database entry, booking travel, and managing email. It can also be an awesome way to rub shoulders with some very important people, build up your professional network, and of course grow another stream of income. You can find great gigs on UpWork, Fiverr, Indeed, and Remote.co."
    },
    "temperature": 1.3,
    "token_count": 20,
    "n_gen": 2,
    "source_language": "en",
    "api_key": "gAAAAABjXQytyEPV48PJ-3lTSOqFaaLSBMthrH8fQEzW6Tgq-6uwjM0PoJAHBSUGddybaJx9Kzh3KtWskLo7_HSe7QYLS1TFN1QzSD5VwQZGRWRYzPY8QTwQH1OIPDGVWHiVXTnRAPj6"
}';

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.textcortex.com/hemingwai/generate_text_v3/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data_string,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

/* Sample response

{
    "status": "success",
    "generated_text": [
      {
        "text": "If you have a knack for organizing, you can make a living as a virtual assistant helping people with their daily tasks online. A virtual assistant will be able to do many of the same things as a real person. It's an awesome way to increase your income and build a professional network, as well as rub shoulders with some very important people. UpWork, Indeed, and Remote are places to find great work. There is a co.",
        "id": "fa72f96f-251a-4c32-a5e5-72f2785b89f2"
      },
      {
        "text": "If you have a knack for organizing, you can make money online as a virtual assistant by helping people to keep their days in order. A virtual assistant can do everything from researching to booking travel. It can be a good way to grow your income, as well as build up your professional network and rub shoulders with some very important people. Gigs can be found on Up Work, Indeed, and Remote. It was co.",
        "id": "e23d7d50-1106-4dd5-adef-b4fff47df1c4"
      },
      {
        "text": "If you can organize, you can work as a virtual assistant to help people stay focused on what's important. A virtual assistant is someone who can do anything from admin to booking travel and managing email. It's a great way to grow your income, as well as build a professional network, and rub shoulders with some very important people. UpWork, Indeed, andRemote are a few of the places where you can find great work. Co.",
        "id": "1fc2587a-b794-49aa-a00f-d2cbd55c4a38"
      },
      {
        "text": "If you have the organizational skills, you can make money online as a virtual assistant helping people keep their days in order. A virtual assistant can do anything from research to booking travel. It is an incredible way to make new friends and build up a professional network, and also to grow your income. UpWork, Indeed, and Remote have great paying jobs on them. Co.",
        "id": "4971f16f-20c3-4c64-9ac9-fbe95cc643ee"
      }
    ],
    "remaining_credits": 4.99794,
    "error": 200
  }
  
  */
