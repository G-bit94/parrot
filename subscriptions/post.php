<?php

include "../config.php";

error_reporting(0);

$queryStatus = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_POST = json_decode(file_get_contents('php://input'), true);

    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {

        if (isset($_POST['new_sub'])) {
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

        if (isset($_POST["new_reg"])) {
            $dealer = $mysqli->real_escape_string($_POST['dealer'] ?? '');
            $reg_by = $mysqli->real_escape_string($_POST['reg_by'] ?? '');
            $line = $mysqli->real_escape_string($_POST['line'] ?? '');
            $serial = $mysqli->real_escape_string($_POST['serial'] ?? '');
            $mobigo = $mysqli->real_escape_string($_POST['mobigo'] ?? '');
            $region = $mysqli->real_escape_string($_POST['region'] ?? '');
            $date = date("Y-m-d");
            $time = date("H:i:s");

            // Validate line   
            $sqla = "SELECT line FROM registrations WHERE line = '$line'";
            $rsa = $mysqli->query($sqla);

            if ($rsa->num_rows !== 0) {
                $queryStatus = "LINE_EXISTS";
            }

            // Check input errors before inserting in database
            if (empty($queryStatus)) {

                if (!empty($line) && !empty($reg_by)) {

                    // Prepare an insert statement
                    $sql = "INSERT INTO registrations (dealer, reg_by, line, serial_no, mobigo, region, date, time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                    $sqld = "SELECT id FROM dealers WHERE name = '$dealer'";
                    $rsd = $mysqli->query($sqld);
                    $rowd = $rsd->fetch_assoc();
                    $e_dealer = $rowd["id"];

                    $sqlq = "SELECT id FROM regions WHERE region = '$region'";
                    $rsq = $mysqli->query($sqlq);
                    $rowq = $rsq->fetch_assoc();
                    $e_region = $rowq["id"];

                    if ($stmt = $mysqli->prepare($sql)) {
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("issssiss", $e_dealer, $reg_by, $line, $serial, $mobigo, $e_region, $date, $time);

                        // Attempt to execute the prepared statement
                        if ($stmt->execute()) {

                            // Encrypt latest id
                            $id = $mysqli->insert_id;
                            $string_to_encrypt = $id;
                            $key = "ThisIsJustAStringOfGibberishToEncryptThLastInsertedId";
                            $encrypted_string = openssl_encrypt($string_to_encrypt, "AES-128-ECB", $key);

                            // Set indentifier
                            $q = "UPDATE registrations SET identifier = '$encrypted_string' WHERE id = '$id'";
                            if ($mysqli->query($q)) {
                                $queryStatus = "SUCCESS";
                            } else {
                                $queryStatus = "ERROR";
                            }
                        } else {
                            $queryStatus = "ERROR";
                        }

                        // Close statement
                        $stmt->close();
                    } else {
                        $queryStatus = "ERROR";
                    }
                }
            }
            // Close connection
            $mysqli->close();
        }
    }
}
echo $queryStatus;
