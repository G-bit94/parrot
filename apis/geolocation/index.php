<?php

error_reporting(0);

header("Content-Type:application/json");

$navigator_arr = (array) json_decode($_GET['nav_obj']); //Convert GET parameter (object) and convert to array bt typecasting 

function getGeolocationInfo()
{
    $response = [];

    global $navigator_arr;

    $apikey = "glm9znqelitu1301";

    $url = "https://api.ipregistry.co/?key=" . $apikey;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);

    // Remove unnecessary headers before making request
    $whitelist = array(
        'userAgent',
        'appVersion',
        'oscpu',
        'platform'
    );

    $filtered = array_intersect_key($navigator_arr, array_flip($whitelist));

    // Convert $navigator_arr (associative array) to indexed/numerical array for use in API request
    $numerical = [];
    $sep = ':';

    foreach ($filtered as $k => $v) {
        $numerical[] = $k . $sep . $v;
    }

    curl_setopt($curl, CURLOPT_HTTPHEADER, $numerical);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        $response['status'] = "cURL Error #:" . $err;
        return $response;
    } else {
        return $curl_response;
    }
}

//Convert cURL response string to object
//Note that getGeolocationInfo() results in StdClass Object here
$geo_data = json_decode(getGeolocationInfo());

// Assign object properties
/** 
 * These properties are returned null in API request for some reason.
 * Need to append Navigator object (from GET parameter) properties to API result
 */
$geo_data->user_agent->name = $navigator_arr['userAgent'] . ':' . $navigator_arr['appVersion'];
$geo_data->user_agent->device->name = $navigator_arr['userAgent'];
$geo_data->user_agent->os->name = $navigator_arr['oscpu'];
$geo_data->user_agent->os->version = $navigator_arr['platform'];

// Convert StdClass Object to JSON object
echo (json_encode($geo_data, true));
