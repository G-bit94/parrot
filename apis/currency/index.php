<?php

// error_reporting(0);

$from = $_GET['from'];
$to = $_GET['to'];
$search = $_GET['search'];
$result = [];

$url = "https://api.exchangerate-api.com/v4/latest/USD";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = json_decode(curl_exec($curl));

$fromRate = $curl_response->rates->$from;
$toRate = $curl_response->rates->$to;

$finalValue = (($toRate / $fromRate) * $search);

$result["finalValue"] = $finalValue;

echo json_encode($result);
