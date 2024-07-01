<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = "";

// Default queryStatus to "ERROR"
$queryStatus = "ERROR";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if ($_POST["usernamesignup"] !== "") {
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
                $queryStatus = "";
            } else {
                $queryStatus = "ERROR";
            }

            // Close statement
            $stmt->close();
        }

        // Validate last name
        if ($_POST['lname'] !== "") {
            $lname = $mysqli->real_escape_string($_POST['lname']);

            // Validate email
            if ($_POST["emailsignup"] !== "") {
                // Prepare a select statement
                $sqla = "SELECT id FROM users WHERE email = ?";

                if ($stmta = $mysqli->prepare($sqla)) {
                    // Bind variables to the prepared statement as parameters
                    $stmta->bind_param("s", $param_email);

                    // Set parameters
                    $param_email = trim($_POST["emailsignup"]);

                    // Attempt to execute the prepared statement
                    if ($stmta->execute()) {
                        // store result
                        $stmta->store_result();

                        if ($stmta->num_rows == 1) {
                            $queryStatus = "EMAIL_EXISTS";
                        } else {
                            $email = trim($_POST["emailsignup"]);

                            // Validate password
                            if ($_POST["pwdsignup"] !== "") :
                                $password = trim($_POST["pwdsignup"]);
                                // Validate confirm password
                                $confirm_password = trim($_POST["confirmpwd"]);
                                if (($password != $confirm_password)) :
                                    $queryStatus = "PASSWORD_MISMATCH";
                                endif;
                            else : $queryStatus = "EMPTY_PASS";
                            endif;
                        }
                    } else {
                        $queryStatus = "ERROR";
                    }

                    // Close statement
                    $stmta->close();
                }
            } else $queryStatus = "EMAIL_BLANK";
        } else $queryStatus = "LNAME_BLANK";
    } else $queryStatus = "USERNAME_BLANK";


    // Check input errors before inserting in database
    if (empty($queryStatus)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, l_name, email, password) VALUES (?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_username, $param_lname, $param_email, $param_password);

            // Set parameters
            $param_username = $username;
            $param_lname = $lname;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $queryStatus = "SIGNUP_SUCCESS";
            } else {
                $queryStatus = "ERROR";
            }

            // Close statement
            $stmt->close();
        } else {
            $queryStatus = "ERROR";
        }
    }

    echo $queryStatus;

    // Close connection
    $mysqli->close();
}
