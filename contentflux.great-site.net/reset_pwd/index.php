<?php

session_start();

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "../config.php";

    $state = "";

    if (!empty($_POST["reset_pwd"])) {

        $user_id = $_POST["user"];

        // Validate new password
        if (empty(trim($_POST["reset_pwd"]))) {
            $state = "PASS_MISSING";
        } elseif (strlen(trim($_POST["reset_pwd"])) < 6) {
            $state = "TOO_SHORT";
        } else {
            $new_password = trim($_POST["reset_pwd"]);
        }

        // Validate confirm password
        if (empty(trim($_POST["reset_pwd_confirm"]))) {
            $state = "CONFIRM_PASS";
        } else {
            $confirm_password = trim($_POST["reset_pwd_confirm"]);
            if (empty($state) && ($new_password != $confirm_password)) {
                $state = "MISMATCH";
            }
        }

        // Check input errors before updating the database
        if (empty($state)) {
            // Prepare an update statement
            $sql = "UPDATE users SET password = ? WHERE id = ?";

            if ($stmt = $mysqli->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("si", $param_password, $param_id);

                // Set parameters
                $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                $param_id = $user_id;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Remove token and expiry date                    
                    $mysqli->query("UPDATE users SET token = '', expiry_date = '' WHERE id = $user_id");

                    // Password updated successfully. Destroy the session, and redirect to login page
                    session_destroy();
                    $state = "SUCCESS";
                } else {
                    $state = "FAILED";
                }

                // Close statement
                $stmt->close();
            }
        }

        // Close connection
        $mysqli->close();
    }

    echo $state;

    exit;
}

if (isset($_GET['key']) && isset($_GET['xvg'])) {

    include "../header.php";

    date_default_timezone_set('Africa/Nairobi');

    // session_start();

    $state = "INVALID";

    $token = $_GET["key"];
    $xvg = $_GET["xvg"];

    $encrypted_string = (string) $xvg . "==";

    $key = "NipTheClipDipBidKitahYeahThisIsAStringOfGibberishToEncryptTheUserId";

    $user_id = openssl_decrypt($encrypted_string, "AES-128-ECB", $key);

    $stmt = $mysqli->prepare("SELECT id, token, expiry_date FROM users WHERE id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();

    $db_token = $row["token"];
    $expiry_date = date("Y-m-d H:i:s", strtotime($row["expiry_date"]));
    if (hash_equals($db_token, $token)) { //First condition
        $datenow = date("Y-m-d H:i:s");

        $start_date = new DateTime($expiry_date);
        $since_start = $start_date->diff(new DateTime($datenow));

        $minutes = $since_start->days * 24 * 60;
        $minutes += $since_start->h * 60;
        $minutes += $since_start->i;

        // Get user email
        $email = ($mysqli->query("SELECT email FROM users WHERE id = '$user_id'")->fetch_assoc())['email'];

        if ($datenow < $expiry_date) { //Second condition
            $state = "VALID";
        }
    }

?>

    <script type="text/javascript">
        var reset_email = <?php echo json_encode($email); ?>;
    </script>

    <span id="title" style="display: none;">Reset your password</span>
    <div class="container col-xl-10 col-xxl-8 px-4 py-3 my-4 rounded-5">
        <div class="row g-lg-5 py-5 my-1 rounded-3">
            <div class="centred-bg-image col-lg-7 text-center text-lg-start bg-light">
                <p class="col-lg-10 fs-3 fw-bold text-center" id="secure-header-text"><strong>Secure your ParrotAI account</strong></p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <?php if ($state === "VALID") { ?>
                    <div class="text-start">
                        <h3 class="fs-6 align-items-center fw-bold lh-1 my-4 mb-3">Reset password</h3>
                        <div class="text-start">
                            <p class="text-muted">To finish resetting your password, please enter a new one below.</p>
                        </div>
                    </div>
                    <form class="p-4 p-md-4 border rounded-3 bg-white needs-validation" action="" method="POST" id="resetPasswordForm" novalidate>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-inputs pass-input rounded-3 border" id="reset_pwd" name="reset_pwd" placeholder="" autocomplete="off" maxlength="50" required>
                            <label for="reset_pwd">New password</label>
                            <span id="reset_pwd_err" class="invalid-tooltip"></span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-inputs pass-input rounded-3 border" id="reset_pwd_confirm" name="reset_pwd_confirm" placeholder="" autocomplete="off" maxlength="50" required>
                            <label for="reset_pwd_confirm">Confirm new password</label>
                            <span id="reset_pwd_confirm_err" class="invalid-tooltip"></span>
                        </div>
                        <div class="justify-content-start mt-1">
                            <div class="form-check">
                                <input class="form-check-input pass-toggle" type="checkbox" id="showPassSwitch">
                                <label class="form-check-label text-dark text-sm" for="flexCheckDefault">
                                    Show password
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="user" value="<?php echo $user_id; ?>">
                        <div class="text-center">
                            <button class="w-50 mt-3 mb-2 btn rounded-4 py-2 btn-primary" id="pwd_reset_btn" onclick="resetPassword(reset_email);">
                                <span id="reset-pwd-spinner" style="display: none;">
                                    <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                                </span>
                                <span id="reset-pwd-text">Submit</span>
                            </button>
                            <br>
                        </div>
                    </form>
            </div>

        <?php } else { ?>
            <div class="mb-5">
                <h3 class="fs-6 align-items-center fw-bold lh-1 my-5">Uh oh!...</h3>
                <div class="text-start">
                    <p class="lead fw-bold fs-4 my-2">
                        <strong><i class="bi bi-exclamation-triangle-fill text-danger"></i> That link seems to be invalid.</strong>
                    </p>
                    <p class="my-2">That usually happens when you use an old or expired link. Please re-check your email or request a new one below.</p>
                </div>
            </div>
            <div class="d-flex justify-content-between my-5">
                <div class="text-center">
                    <button class="mt-3 mb-2 btn btn-sm rounded-4 py-2 btn-primary" onclick="popResetPwdEmailEntryModal();">
                        <span>Request another</span>
                    </button>
                    <br>
                </div>
                <div class="text-center">
                    <a class="mt-3 mb-2 btn btn-sm rounded-4 py-2 btn-outline-primary" href="<?php echo $base_url; ?>">
                        <span><i class="bi bi-caret-left-fill"></i> Take me home</span>
                    </a>
                    <br>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>


<?php
} else {
    echo '<script type="text/javascript">window.location.href = history.back();</script>';
}
include "../footer.php";

?>