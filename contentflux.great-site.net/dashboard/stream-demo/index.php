<?php

include "../../config.php";

include "../../session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $_SESSION_INIT = $_SESSION;

    $_POST = json_decode(file_get_contents('php://input'), true);

    // Set a cookie with the session ID
    // setcookie('session_id', session_id());

    // $_SESSION = $_POST;

    $_SESSION = array_merge($_SESSION, $_POST);

    // $POST_DATA += $_POST;

    // $curl = curl_init();
    // curl_setopt($curl, CURLOPT_URL, "sse2.php");
    // curl_setopt($curl, CURLOPT_TIMEOUT, 30); //Timeout in seconds        
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // $curl_response = curl_exec($curl);
    // $err = curl_error($curl);
    // curl_close($curl);

    // print_r($POST_DATA);
}
