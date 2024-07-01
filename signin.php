<?php

include_once 'config.php';

// Define variables and initialize with empty values
$email = $password = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signin"])) {

        $email = trim($_POST["useremail"]);

        $password = trim($_POST["password"]);

        // Prepare a select statement
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

                // Check if email exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $username, $email, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;

                            $queryStatus = "SIGNIN_SUCCESS";
                        } else {
                            // Display an error message if password is not valid                                
                            $queryStatus = "INVALID_PASSWORD";
                        }
                    }
                } else {
                    // Display an error message if email doesn't exist                        
                    $queryStatus = "EMAIL_INEXISTENT";
                }
            } else {
                $queryStatus = "SIGNIN_FAILED: " . $mysqli->error;
            }
            echo $queryStatus;

            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysqli->close();
    }
}
