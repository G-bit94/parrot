<?php

error_reporting(0);

set_time_limit(60); // TIME LIMIT IN SECONDS

header("Content-Type:application/json");

include "../../session.php";

$response = [];

/**
 * Using basic authentication
 */
// function wpRemotPostBasicAuth($url, $data)
// {
//     $curl = curl_init();
//     curl_setopt($curl, CURLOPT_URL, $url);
//     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json',  array(
//         'Authorization' => 'Basic ' . base64_encode($_POST['username'] . ':' . $_POST['pass'])
//     )));
//     curl_setopt($curl, CURLOPT_TIMEOUT, 50); //Timeout in seconds
//     $data_string = json_encode($data);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($curl, CURLOPT_POST, true);
//     curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
//     $curl_response = curl_exec($curl);
//     return $curl_response;
// }

/**
 * Using XML-RPC
 */
function wpRemotePostXMLRPC($url, array $post_data = array())
{
    $client_path = '../../vendor/hieu-le/wordpress-xmlrpc-client/src';
    require_once $client_path . '/WordpressClient.php';
    require_once($client_path . '/Exception/NetworkException.php');
    require_once($client_path . '/Exception/XmlrpcException.php');

    $remove = "/"; // remove trailing / if supplied by the user
    $new_url = preg_replace('/' . preg_quote($remove, '/') . '$/', '', $url); //preg_quote() escapes the / in the regex

    $endpoint = $new_url . '/xmlrpc.php';
    $wpUser = $post_data['username'];
    $wpPass = $post_data['pass'];
    $wpClient = new \HieuLe\WordpressXmlrpcClient\WordpressClient($endpoint, $wpUser, $wpPass);
    // $wpClient->setCredentials($endpoint, $wpUser, $wpPass);
    $title = $post_data['title'];
    $title = htmlentities($title, ENT_NOQUOTES, 'UTF-8');
    $content = array(
        'author' => $post_data['author'],
        'categories' => array($post_data['cat']),
        'tags' => array($post_data['tags']),
        'post_type' => 'post',
        'status' => $post_data['status'],
        'title' => $title,
        'post_content' => $post_data['content'],
        'excerpt' => $post_data['excerpt'],
        'ping_status' => 'closed',
        'comment_status' => 'closed'
    );

    $post_meta = array('post_title', 'post_status');
    $post_info = $wpClient->getPost($wpClient->newPost($title, $content), $post_meta); //Get post id after post creation
    $post_title = $post_info['post_title'];

    return $post_title;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = json_decode(file_get_contents('php://input'), true);

    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {

        $response['title'] = wpRemotePostXMLRPC($_POST['url'], $_POST);

        if (!empty($response['title'])) {
            $response['status'] = 'Success! Post submitted successfully.';
            $post = $response['title'];
        } else { //error message
            $response['status'] = 'Oops! Something went wrong.';
        }
    }

    echo json_encode($response);
}