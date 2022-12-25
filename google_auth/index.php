<?php

error_reporting(0);

// header("Referrer-Policy: no-referrer-when-downgrade");

require_once '../vendor/autoload.php';

// Load the client ID and secret from the JSON file
$credentials = json_decode(file_get_contents(__DIR__ . '/client_secret.json'), true);

$redirectUri = 'http://localhost/parrot/google_auth/';

// Initialize the client object
$client = new Google_Client();
$client->setAuthConfig($credentials);
// $client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow 
if (isset($_GET['code'])) {

    // Exchange the authorization code for an access token
    $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    // Set the access token
    $client->setAccessToken($accessToken);

    // Use the Google OAuth2 API to request the user's email and name
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();
    $email = $userInfo->getEmail();
    $firstName = $userInfo->getGivenName();
    $lastName = $userInfo->getFamilyName();

    include "../session.php";
    $_SESSION["email"] = $email;

    $data_string_signin = (object) [
        'useremail' => $email,
        'signin' => true,
        'auth' => 'google',
        'password' => ''
    ];

    function authUserLocal($data, $url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); //Timeout in seconds        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
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

    $signin_status = authUserLocal($data_string_signin, "http://localhost/parrot/signin/");

    if ($signin_status == "SIGNIN_SUCCESS") {
        echo '<script type="text/javascript">window.location.href="http://localhost/parrot/dashboard/";</script>';
    } elseif ($signin_status == "EMAIL_INEXISTENT") {
        $data_string_signup = (object) [
            'emailsignup' => $email,
            'usernamesignup' => $firstName,
            'lname' => $lastName,
            'signup' => true,
            'auth' => 'google',
            'password' => '',
            'ip' => '',
            'browser' => '',
            'device' => '',
            'platform' => '',
            'country' => '',
            'city' => ''
        ];

        $signup = json_decode(authUserLocal($data_string_signup, "http://localhost/parrot/signup/"));

        if ($signup->status == "SIGNUP_SUCCESS") {
            echo '<script type="text/javascript">window.location.href="http://localhost/parrot/dashboard/";</script>';
        } else {
            echo $signup->status;
            exit;
        }
    } else {
        echo $signin_status;
        exit;
    }
} else {
    echo '<script>location.href="' . $client->createAuthUrl() . '";</script>';
}
