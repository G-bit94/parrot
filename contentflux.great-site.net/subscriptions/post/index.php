<?php

include "../../config.php";

include "../../session.php";

// error_reporting(0);

header("Content-Type:application/json");

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_POST = json_decode(file_get_contents('php://input'), true);

    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {

        if (isset($_POST['new_sub'])) {

            $user = $mysqli->real_escape_string($_POST['user'] ?? '');
            $plan = $mysqli->real_escape_string($_POST['plan'] ?? '');
            $period = $mysqli->real_escape_string($_POST['period'] ?? '');
            $plan_id = $mysqli->real_escape_string($_POST['plan_id'] ?? '');
            $amount = $mysqli->real_escape_string($_POST['amount'] ?? '');
            $description = $mysqli->real_escape_string($_POST['description'] ?? '');
            $date = date("Y-m-d");
            $time = date("H:i:s");

            // decrypt user string
            $key = "ThisIsJustAStringOfGibberishToEncryptTheUserId";
            $userID = openssl_decrypt($user, "AES-128-ECB", $key);

            if ($_POST['mode'] == 'M-PESA') {
                // M-PESA payment

                $MSISDN = $_POST['msisdn'];
                $amount = $_POST['price'];

                /*** Authorization Request in PHP ***/

                function generateAccessToken()
                {
                    $consumer_key = "04ERURZNA2WXrSiHJyH7vvk9BGcvQQKx";
                    $consumer_secret = "OLAEcscTIs3RhcIC";
                    $credentials = base64_encode($consumer_key . ":" . $consumer_secret);
                    $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic " . $credentials));
                    curl_setopt($curl, CURLOPT_HEADER, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $curl_response = curl_exec($curl);
                    $access_token = json_decode($curl_response);
                    return $access_token->access_token;
                }

                /**
                 * Lipa na M-PESA password
                 * */
                function lipaNaMpesaPassword()
                {
                    $lipa_time = date('YmdHms');
                    $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
                    $BusinessShortCode = 174379;
                    $timestamp = $lipa_time;
                    $lipa_na_mpesa_password = base64_encode($BusinessShortCode . $passkey . $timestamp);
                    return $lipa_na_mpesa_password;
                }

                /**
                 * Lipa na M-PESA STK Push method
                 * */
                function customerMpesaSTKPush()
                {
                    $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . generateAccessToken()));
                    $curl_post_data = [
                        //Fill in the request parameters with valid values
                        'BusinessShortCode' => 174379,
                        'Password' => lipaNaMpesaPassword(),
                        'Timestamp' => date('YYYYMMDDHHmmss'),
                        'TransactionType' => 'CustomerBuyGoodsOnline',
                        'Amount' => $amount,
                        'PartyA' => $MSISDN, // replace this with your phone number
                        'PartyB' => 174379,
                        'PhoneNumber' => $MSISDN, // replace this with your phone number
                        'CallBackURL' => 'https://6a78-102-219-210-56.ngrok.io/parrot/subscriptions/post.php',
                        'AccountReference' => "ParrotAI",
                        'TransactionDesc' => "Testing stk push on sandbox"
                    ];
                    $data_string = json_encode($curl_post_data);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
                    $curl_response = curl_exec($curl);
                    return $curl_response;
                }
            }

            if ($_POST['mode'] == 'PayPal') {
                $mode = $_POST['mode'];
                $amount = $mysqli->real_escape_string($_POST['price'] ?? '');
                $ref = $mysqli->real_escape_string($_POST['payment_ref'] ?? '');

                // Plan ID
                $sql_plan = "SELECT id FROM subscription_plans WHERE name = '$plan'";
                $rs_plan = $mysqli->query($sql_plan);
                $row_plan = $rs_plan->fetch_assoc();
                $planID = $row_plan['id'];

                // Payment mode id
                $sql_mode = "SELECT id FROM payment_modes WHERE mode = '$mode'";
                $rs_mode = $mysqli->query($sql_mode);
                $row_mode = $rs_mode->fetch_assoc();
                $modeID = $row_mode['id'];

                // Change plan if already subscribed  
                $sqla = "SELECT plan FROM subscriptions WHERE plan = $planID AND user = '$userID' AND subscriptions.status = '1'";
                $rsa = $mysqli->query($sqla);
                if ($mysqli->query($sqla) === true) {
                    $response['status'] = "SUCCESS";
                } else {
                    $response['status'] = "ERROR";
                }


                // Change subscription status to pending <status == 2>
                if ($rsa->num_rows !== 0) {
                    $sql_update = "UPDATE subscriptions SET plan = $planID, subscriptions.status = '2' WHERE user = '$userID' AND subscriptions.status = '1'";
                    $mysqli->query($sql_update);
                } else {

                    // Subscribe new user
                    $sql = "INSERT INTO subscriptions (plan, duration, user, date, time, status, mode, payment_ref, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $status = 2;

                    if ($stmt = $mysqli->prepare($sql)) {
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("sssssssss", $planID, $period, $userID, $date, $time, $status, $modeID, $ref, $amount);

                        // Attempt to execute the prepared statement
                        if ($stmt->execute()) {
                            // Encrypt latest id
                            $id = $mysqli->insert_id;
                            $string_to_encrypt = $id;
                            $key = "ThisIsJustAStringOfGibberishToEncryptThLastInsertedId";
                            $encrypted_string = openssl_encrypt($string_to_encrypt, "AES-128-ECB", $key);

                            // Set indentifier
                            $q = "UPDATE subscriptions SET unique_id = '$encrypted_string' WHERE id = '$id'";
                            if ($mysqli->query($q)) {
                                $response['status'] = "SUCCESS";
                            } else {
                                $response['status'] = "ERROR";
                            }
                        } else {
                            $response['status'] = "ERROR";
                        }

                        // Close statement
                        $stmt->close();
                    } else {
                        $response['status'] = "ERROR";
                    }
                }
                // Close connection
                $mysqli->close();
            }
        }
    }
}
echo json_encode($response);
