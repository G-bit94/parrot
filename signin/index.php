<?php

error_reporting(0);

include_once '../config.php';

// Define variables and initialize with empty values
$email = $password = $status = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signin"])) {

        $email = trim($_POST["useremail"]);

        $password = trim($_POST["password"]);

        if ($email) {
            $sql = "SELECT id, username, email, password FROM users WHERE email = ?";

            if ($stmt = $mysqli->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_email);

                // Set parameters
                $param_email = $email;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Store result
                    $stmt->store_result();

                    // Check if email exists
                    if ($stmt->num_rows == 1) {
                        // Bind result variables
                        $stmt->bind_result($id, $username, $email, $hashed_password);
                        if ($stmt->fetch()) {

                            // Google Auth
                            if ($_POST["auth"] == "google" && $_POST["password"] == "") {
                                $status = "SIGNIN_SUCCESS";
                            } elseif ($_POST["auth"] == "email_pass") {
                                // Verify password
                                if (password_verify($password, $hashed_password)) {
                                    // Password is correct, so start a new session
                                    include "../session.php";
                                    // Store data in session variables

                                    $_SESSION['user'] = [
                                        "loggedin" => true,
                                        "id" => $id, //user ID
                                        "username" => $username,
                                        "email" => $email,
                                        'session_id' => session_id(),
                                        'csrf_token' => bin2hex(random_bytes(24))
                                    ];
                                    $status = "SIGNIN_SUCCESS";
                                } else {
                                    // Display an error message if password is not valid                                
                                    $status = "INVALID_PASSWORD";
                                }
                            }
                        }
                    } else {
                        // Display an error message if email doesn't exist                        
                        $status = "EMAIL_INEXISTENT";
                    }
                } else {
                    $status = "SIGNIN_FAILED: " . $mysqli->error;
                }

                // Close statement
                $stmt->close();
            }

            // Close connection
            $mysqli->close();
        } else
            $status = "EMAIL_BLANK";
    } else
        $status = "Malformed request to signin";    
}

echo $status;
