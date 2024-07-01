<?php

session_start();

$sign_in_btn = '<div class="p-3 m-1 shadow-sm rounded-3">
                    <div class="col-sm p-1 fs-6">
                        <p>
                            Looks like <span id="site-name-signedout"></span> is open in another tab or you\'ve been signed out.
                        </p>
                        <button class="btn btn-primary mt-1" onclick="handleStartBtn()">
                            Continue working here
                        </button>
                    </div>
                </div>
                <script>Id("site-name-signedout").innerText=site_name;</script>';

//Get current URL and parameters for correct pagination
$protocol = $_SERVER['SERVER_PROTOCOL'];
$domain     = $_SERVER['HTTP_HOST'];
$script   = $_SERVER['SCRIPT_NAME'];
$parameters   = $_SERVER['QUERY_STRING'];
$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https')
    === FALSE ? 'http' : 'https';
$currenturl = $protocol . '://' . $domain . $script . '?' . $parameters;
$new_url = preg_replace('/&?pageno=[^&]*/', '', $currenturl);

$site_name = "ContentFlux";

$site_url = "https://" . $domain;

$base_url = $site_url;

$today = date("Y-m-d");

$sql_offset = $result = "";

$signinStatus = 0;

// Define a custom error handler function
function customErrorHandler($errno, $errstr, $errfile, $errline)
{
    // Only log serious errors
    // if ($errno & error_reporting()) {
    // Log the error message to a file
    $log_file = $_SERVER['DOCUMENT_ROOT'] . "/.custom_error_log";
    $time = gmdate("Y-m-d H:i:s", time() + 10800);
    error_log("[$time] [$errno] $errstr in $errfile on line $errline\n", 3, $log_file);
    // }
}

// Set the custom error handler
set_error_handler("customErrorHandler");
