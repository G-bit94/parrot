<?php

error_reporting(0);

// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = "";

$response = [];

// Default status to "ERROR"
$response["status"] = "ERROR";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $country = $_POST["country"];
    $city = $_POST["city"];
    $ip = $_POST["ip"];
    $browser = $_POST["browser"];
    $device = $_POST["device"];
    $platform = $_POST["platform"];

    $user_email = trim($mysqli->real_escape_string($_POST["emailsignup"]));

    // Validate username
    if ($_POST["usernamesignup"] !== "") {

        function insertUserCreds($type)
        {

            global
                $response,
                $mysqli,
                $email,
                $user_email,
                $username,
                $lname,
                $password,
                $param_username,
                $param_lname,
                $param_email,
                $param_password,
                $ip,
                $browser,
                $device,
                $platform,
                $country,
                $city;

            // Prepare an insert statement
            $sql = "INSERT INTO users (username,
                                    l_name,
                                    email,
                                    password,
                                    ip,
                                    useragent,
                                    device,
                                    platform,
                                    country,
                                    city) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = $mysqli->prepare($sql)) {

                if ($type == "email_pass") {
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                } else if ($type == "google") {
                    $param_password = $ip = $browser = $device = $platform = $country = $city = "";
                    $email = $user_email;
                }

                // Set parameters
                $param_username = $username;
                $param_lname = $lname;
                $param_email = $email;

                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ssssssssss", $param_username, $param_lname, $param_email, $param_password, $ip, $browser, $device, $platform, $country, $city);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    $response["status"] = "SIGNUP_SUCCESS";
                } else {
                    $response["status"] = "ERROR";
                }

                // Close statement
                $stmt->close();
            } else {
                $response["status"] = "ERROR";
            }

            return $response;
        }

        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["usernamesignup"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                $username = trim($_POST["usernamesignup"]);
                $response["status"] = "";
            } else {
                $response["status"] = "ERROR";
            }

            // Close statement
            $stmt->close();
        }

        // Validate last name
        // if ($_POST['lname'] !== "") {
        $lname = $mysqli->real_escape_string($_POST['lname']);

        // Validate email
        if ($user_email !== "") {
            /**
             * Disposable email check.
             * Returns true if temporary/disposable email.
             */
            function is_temp_email($email)
            {
                $url = "https://disposable.debounce.io/?email=" . $email;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_TIMEOUT, 39); //Timeout in seconds        
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $curl_response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                if ($err) {
                    $response['status'] = "cURL Error #:" . $err;
                    return false;
                } else {
                    $result = json_decode($curl_response)->disposable;
                    if ($result == "false") {
                        return false;
                    } else {
                        return true;
                    }
                }
            }

            // Google Auth
            if ($_POST["auth"] == "google" && $_POST["password"] == "") {
                insertUserCreds("google");
            } else {

                if (is_temp_email($user_email)) {
                    $response["status"] = "TEMP_EMAIL";
                } else {

                    // Prepare a select statement
                    $sqla = "SELECT id FROM users WHERE email = ?";

                    if ($stmta = $mysqli->prepare($sqla)) {

                        // Set parameters
                        $param_email = $user_email;

                        // Bind variables to the prepared statement as parameters
                        $stmta->bind_param("s", $param_email);

                        // Attempt to execute the prepared statement
                        if ($stmta->execute()) {
                            // store result
                            $stmta->store_result();

                            if ($stmta->num_rows == 1) {
                                $response["status"] = "EMAIL_EXISTS";
                            } else {
                                $email = $user_email;

                                // Validate password
                                if ($_POST["pwdsignup"] !== "") :
                                    $password = trim($_POST["pwdsignup"]);
                                    // Validate confirm password
                                    $confirm_password = trim($_POST["confirmpwd"]);
                                    if (($password != $confirm_password)) :
                                        $response["status"] = "PASSWORD_MISMATCH";
                                    endif;
                                else : $response["status"] = "EMPTY_PASS";
                                endif;
                            }
                        } else {
                            $response["status"] = "ERROR";
                        }

                        // Close statement
                        $stmta->close();
                    }
                }
            }
        } else $response["status"] = "EMAIL_BLANK";
    } else $response["status"] = "USERNAME_BLANK";


    // Check input errors before inserting in database
    if (empty($response["status"])) {
        insertUserCreds("email_pass");
    }

    echo json_encode($response);

    // Close connection
    $mysqli->close();
}
