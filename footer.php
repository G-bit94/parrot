<!-- Toast -->
<!-- General -->
<div class="position-fixed bottom-0 start-0 p-3 rounded-3" style="z-index: 9999;">
    <div id="liveToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastMessageCmpnt"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- Delete confirmation toast -->
<div class="position-fixed top-0 end-0 p-3 rounded-3" style="z-index: 9999;">
    <div id="deleteConfirm" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="toast-header bg-white text-dark">
            Sure to permanently delete the template(s)?
        </div>
        <div class="toast-body bg-white">
            <div id="delete_error"></div>
            <div class="pt-2">
                <button type="button" id="cancel_deletion" class="btn btn-white border btn-sm" data-bs-dismiss="toast">No, keep</button>
                <button type="button" id="confirm_deletion" class="btn btn-danger btn-sm mx-2">Yes, delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Cookie consent -->
<div class="row fixed-bottom m-2" id="cookie-consent" style="display: none !important;">
    <div class="col-md-4 col-sm-12" style="transform: translate(200%, 0%);">
        <div class="p-2 bg-custom text-light shadow-lg">
            <div class="row">
                <div class="col-10">
                    <h6><i class='fas fa-cookie-bite' style='font-size:24px;'></i> Some delectable cookies just for you!</h6>
                </div>
            </div>
            <p style="font-size: 12px;">
                They add a little extra crunch to your experience on <?php echo $site_name; ?>.
                Happy browsing!
            </p>
            <div class="text-center">
                <button style="font-size: 14px;" type="button" class="btn btn-danger w-50" onclick="setCookie('cookie_consent', 'true', 365)">Yummy! (Accept cookies)</button>
            </div>
        </div>
    </div>
</div>
</main>

<style type="text/css">
    .site-footer {
        color: #fff;
        width: 100%;
        height: 300px;
        background-color: #CA6F1E;
        padding: 40px;
        border-top: 2px solid #4A235A;
        /* margin-top: 40px; */
        background: -webkit-linear-gradient(74deg, #180c3c 40%, #673AB7 40%);
        background: -o-linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
        background: -moz-linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
        background: linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
    }

    .site-footer h2 h4 {
        color: #fff;
        text-align: center;
    }

    p {
        line-height: 1.6;
        font-size: 16px;
        padding: 10px;
        /* text-transform: capitalize; */
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .address li {
        text-align: left;
    }

    li {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .text-left {
        text-align: left;
        padding-left: 10px;
    }

    .fa {
        padding-right: 15px;
    }

    a {
        text-decoration: none;
        font-size: 18px;
        color: #fff;

    }

    .text-left:nth-child(3) {
        text-align: center;
    }

    .bottom {
        background: #000;
        color: #fff;
        padding: 0;
        position: relative;
        text-align: center;
    }

    .bottom p {
        padding: 10px;
        margin: 0;
        /* text-transform: uppercase; */
    }

    @media(max-width: 1024px) {

        .site-footer {
            padding: 20px;
            height: 500px;
        }

    }

    @media(max-width: 936px) {

        .address li {
            text-align: center;
        }

        .text-left {
            text-align: center;
            padding-left: 0;
        }

        .text-left:nth-child(4) {
            text-align: center;
        }

        .site-footer {
            padding: 20px 0;
            height: 100%;
            background: -webkit-linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
            background: -o-linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
            background: -moz-linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
            background: linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
        }
    }

    @media(max-width: 470px) {
        .site-footer {
            background: linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
            background: -o-linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
            background: -moz-linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
            background: linear-gradient(70deg, #180c3c 40%, #673AB7 40%);
        }
    }
</style>

<!-- Footer -->
<footer class="site-footer">
    <div class="row">
        <div class="col-md-3 p-4">
            <h4 class="text-left fw-bold"><?php echo $site_name; ?></h4>
            <p>Generate quality content in <strong>just a couple of clicks</strong>. Take the hassle
                out of content creation and let <?php echo $site_name; ?> generate
                <strong>professional-grade content</strong> for you in a fraction of the time.
            </p>
        </div>
        <div class="col-md-3 p-4">
            <h4>Quick actions</h4>
            <ul class="list-group list-group-flush">
                <li><i class="fa fa-angle-double-right"></i><a class="text-light" href="<?php echo $base_url; ?>/dashboard" onclick="handleStartBtn()" class="empty-link">Get started</a></li>
                <li><i class="fa fa-angle-double-right"></i><a class="text-light" href="<?php echo $base_url; ?>/pricing"><strong>Go pro!</strong></a></li>
                <li><i class="fa fa-angle-double-right"></i><a class="text-light" href="#services">Become an affiliate</a></li>
                <li><i class="fa fa-angle-double-right"></i><a class="text-light" href="javascript: void(0)" onclick="startChat()">Help</a></li>
            </ul>
        </div>
        <div class="col-md-3 p-4">
            <h4>Company</h4>
            <ul class="list-group list-group-flush">
                <li><i class="fa fa-angle-double-right"></i><a class="text-light" href="#about-us">About us</a></li>
                <li><i class="fa fa-angle-double-right"></i><a class="text-light" href="#contact-us">Contact us</a></li>
                <li><i class="fa fa-angle-double-right"></i><a class="text-light" href="<?php echo $base_url; ?>/blog">News and insights</a></li>
                <li><i class="fa fa-angle-double-right"></i><a class="text-light" href="#!press">Media & Press</a></li>
            </ul>
        </div>
        <div class="col-md-3 p-4">
            <h4 class="text-left">Stay in the know</h4>
            <form>
                <p class="text-light">Get a monthly digest of whats new and exciting from us.</p>
                <div class="d-flex w-100 gap-2">
                    <input id="newsletter" type="text" class="form-control" placeholder="Email address">
                    <button class="btn bg-custom-dark text-light" type="button">Notify&nbsp;me</button>
                </div>
            </form>
        </div>
    </div>
</footer>
<div class="bottom d-flex justify-content-center">
    <p class="fw-bold">&copy; <?php echo $site_name; ?> <?php date("Y") ?></p>
    <div class="d-flex justify-content-between">
        <ul class="list-group list-unstyled list-group-horizontal pt-1">
            <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-twitter"></i></a></li>
            <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-instagram"></i></a></li>
            <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-facebook"></i></a></li>
            <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-linkedin"></i></a></li>
        </ul>
    </div>
</div>

<!-- Footer -->

<!-- Signup modal -->
<div class="modal py-5 fade" tabindex="-1" role="dialog" id="signupModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h2 class="fw-bold mb-0">Sign up</h2>
                <button id="dismiss-signup" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="row needs-validation" action="" method="POST" id="signupForm" novalidate>
                    <div class="form-floating col-sm-6 mb-2">
                        <input type="text" class="form-control form-control-sm form-inputs signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="usernamesignup" id="usernamesignup" placeholder="First name" autocomplete="off" maxlength="50" required>
                        <label class="text-muted" class="text-muted" for="usernamesignup">First name</label>
                        <span id="username_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating col-sm-6 mb-2">
                        <input type="text" class="form-control form-control-sm form-inputs signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="lname" id="lname" placeholder="Last name" autocomplete="off" maxlength="50">
                        <label class="text-muted" for="lname">Last name <sup class="text-muted">(Optional)</sup></label>
                        <span id="lname_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control form-control-sm form-inputs signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="emailsignup" id="emailsignup" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
                        <label class="text-muted" for="emailsignup">Email address</label>
                        <span id="emailexists_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating col-sm-6 mb-2">
                        <input type="password" class="form-control form-control-sm form-inputs  pass-input signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="pwdsignup" id="pwdsignup" placeholder="Password" autocomplete="off" minlength="6" maxlength="50" required>
                        <label class="text-muted" for="pwdsignup">Password</label>
                        <span id="signup_pwd_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating col-sm-6 mb-2">
                        <input type="password" class="form-control form-control-sm form-inputs  pass-input signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="confirmpwd" id="confirmpwd" placeholder="Confirm password" autocomplete="off" minlength="6" maxlength="50" required>
                        <label class="text-muted" for="confirmpwd">Confirm password</label>
                        <span id="mismatch_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="justify-content-start my-3">
                        <div class="form-check">
                            <input class="form-check-input pass-toggle" type="checkbox" id="showPass">
                            <label class="form-check-label text-dark text-sm" for="flexCheckDefault">
                                Show password
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="auth" value="email_pass">
                    <button class="w-100 mb-2 btn btn-sm rounded-4 py-2 btn-primary" onclick="signupUser();">
                        <span id="signup-spinner" style="display: none;">
                            <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                        </span>
                        <span id="signup-button-text">Sign up</span>
                    </button>
                    <h2 class="fs-6 fw-bold my-3">Or sign up with your Google account</h2>
                    <div class="d-flex justify-content-center">
                        <div id="g_id_onload" data-client_id="202076057759-s1a7sbv9ss2uoru45b983tlnabn4kleb.apps.googleusercontent.com" data-login_uri="http://localhost/parrot/google_auth/">
                        </div>
                        <div class="g_id_signin" data-type="standard" data-size="large" data-text="signup_with" data-shape="pill" data-theme="filled_blue" data-logo_alignment="left">
                        </div>
                    </div>
                    <small class="text-muted my-2">
                        By signing up, you agree to the
                        <a class="text-primary" style="font-size: 0.875em !important;" href="<?php echo $base_url; ?>/terms" target="_blank">
                            terms
                        </a>
                        of use.
                    </small>
                    <h2 class="fs-6 fw-bold mb-3">I already have an account</h2>
                    <a class="w-100 mb-2 btn btn-sm btn-outline-primary rounded-4" onclick="popSigninModal();"> Sign in </a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End signup modal -->

<!-- Signin modal -->

<div class="modal py-5 fade" tabindex="-1" role="dialog" id="signinModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h2 id="login-title" class="fw-bold mb-0">Sign in</h2>
                <button id="dismiss-signin" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <form class="needs-validation" action="" method="POST" id="signinForm" novalidate>
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control form-control-sm form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="useremail" name="useremail" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
                        <label class="text-muted" for="useremail">Email address</label>
                        <span id="email_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control form-control-sm form-inputs pass-input rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="password" name="password" placeholder="Password" autocomplete="off" maxlength="50" required>
                        <label class="text-muted" for="password">Password</label>
                        <span id="password_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="justify-content-start my-3">
                        <div class="form-check">
                            <input class="form-check-input pass-toggle" type="checkbox" id="showPassSwitch">
                            <label class="form-check-label text-dark text-sm" for="flexCheckDefault">
                                Show password
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="auth" value="email_pass">
                    <input type="hidden" id="signin" name="signin">
                    <div class="text-center">
                        <button class="w-100 mb-3 btn rounded-4 btn-primary" onclick="signinUser();">Sign in</button> <br>
                        <div class="text-center mt-2 mb-4">
                            <span class="btn btn-sm btn-white shadow" type="button" onclick="popResetPwdEmailEntryModal()">I forgot my password</span>
                        </div>
                        <h2 class="fs-6 fw-bold my-3">Or sign in with Google</h2>
                        <div class="d-flex justify-content-center">
                            <div id="g_id_onload" data-client_id="202076057759-s1a7sbv9ss2uoru45b983tlnabn4kleb.apps.googleusercontent.com" data-login_uri="http://localhost/parrot/google_auth/">
                            </div>
                            <div class="g_id_signin" data-type="standard" data-size="large" data-text="sign_in_with" data-shape="pill" data-theme="filled_blue" data-logo_alignment="left">
                            </div>
                        </div>
                        <h2 class="fs-6 mt-4">New here?</h2>
                        <a class="w-50 mt-2 mb-2 btn btn-sm btn-outline-primary rounded-4" onclick="popSignupModal();">
                            Sign up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End signin modal -->

<!-- Reset Password - Email Entry Modal -->

<div class="modal py-5 fade" tabindex="-1" role="dialog" id="resetPwdEmailEntryModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h3 id="reset-email-title" class="fw-bold mb-0">Reset password</h3>
                <button id="dismiss-signin" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <h2 class="fs-6 fw-bold mt-4 mb-3">Enter your email address below</h2>
                <form class="needs-validation" action="" method="POST" id="resetPwdEmailEntryForm" novalidate>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-control-sm form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="reset_email" name="reset_email" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
                        <label class="text-muted" for="useremail">Email</label>
                        <span id="reset_email_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="text-center" id="reset_pwd_footer">
                        <button class="w-50 mt-2 mb-2 btn rounded-4 py-2 btn-primary" onclick="resetPwdEmailEntry(Id('reset_email').value);">
                            <span id="reset-spinner" style="display: none;">
                                <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                            </span>
                            <span id="reset-button-text">Submit</span>
                        </button>
                        <br>
                        <div id="reset_signup_prompt">
                            <h2 class="fs-6 fw-bold mt-4 mb-1">New here?</h2>
                            <a class="w-50 py-2 mb-2 btn btn-outline-primary rounded-4" onclick="popSignupModal();">
                                Sign up
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Password Reset Modal -->

<!-- Signin Notification -->
<div class="modal py-5 fade" tabindex="-1" role="dialog" id="signinNotifModal">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fw-bold fs-5">Whoops!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <p>It looks like <?php echo $site_name; ?> is open in another tab or you've been signed out.</p>
            </div>
            <div class="modal-footer flex-column border-top-0">
                <button type="button" class="btn btn-lg btn-primary w-100 mx-0 mb-2" onclick="handleStartBtn()">Continue here</button>
                <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Signin Notification Modal -->

<!-- Speech Recognition Mondal -->
<div class="modal py-5 p-1 fade" tabindex="-1" role="dialog" id="speechRecognitionModal">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header border-bottom-0">
                <h1 class="modal-title fw-bold fs-5">Select language</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <div class="mt-4" id="div_language">
                    <select class="form-select lang-inputs" id="select_language" onchange="updateDialect()"></select>
                    <select class="form-select lang-inputs mt-2" id="select_dialect"></select>
                </div>

                <div class="d-flex justify-content-start my-1">
                    <div class="form-check mx-2">
                        <input class="form-check-input" type="checkbox" id="rem_lang">
                        <label class="form-check-label text-dark text-sm" for="rem_lang">
                            Remember language settings
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer flex-column border-top-0">
                <button type="button" class="btn btn-primary w-100 mx-0 mb-2" onclick="speechToText()"><i class="bi bi-mic fs-5"></i> Start speech input</button>
                <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Speech Recognition Mondal -->

<!-- Template details modal -->
<div class="modal py-2 fade" tabindex="-1" role="dialog" id="templateDetailsModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header px-5 py-2 border-bottom-0">
                <h6 id="template_summary" class="fw-bold mb-0 ms-2 mt-5"></h6>
                <button id="dismiss-signin" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <div class="d-flex justify-content-between border-bottom p-2">
                    <span id="template_uid" style="display: none;"></span>
                    <div>
                        <span class="badge bg-primary opacity-75" id="template_category"></span><br>
                        <small id="date"></small><br>
                        <small id="time"></small>
                    </div>
                    <span class="mt-1" id="controls">
                        <!-- <img src="../assets/img/copy.png" alt="" onclick="copyItemToClipboard()" class="mx-2 mb-2" type="button" />                 -->
                        <button class="btn btn-sm btn-light border mx-2" id="copy_template">
                            Copy
                        </button>
                        <button class="btn btn-sm btn-light border mx-2" id="use_prompt">
                            Add to Canvas
                        </button>
                        <button class="btn btn-sm btn-outline-teal border mx-2" onclick="popWpModal('saved', <?php echo $active_sub; ?>)">
                            <i class="bi bi-wordpress text-primary fs-5"></i> Post to blog
                        </button>
                        <button class="btn btn-sm btn-outline-danger border mx-2" onclick='deleteSavedTemplates("single")'>
                            <i type="button" class="bi bi-trash mx-2"></i> Delete
                        </button>
                    </span>
                </div>
                <div class="d-flex justify-content-center" style="white-space: pre-line;">
                    <div id="template-details-spinner" style="display: none;" class="loader mx-3"><?php echo $spinner; ?></div>
                </div>
                <div id="template_details" style="height: 350px; white-space:pre-line;" class="mt-1 overflow-auto"></div>
                <div class="border-bottom mt-1"></div>
            </div>
        </div>
    </div>
</div>
<!-- End template details modal -->

<!-- Publish to WordPress modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="publishToWordPressModal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-body p-4 pt-3">
                <div class="d-flex justify-content-between align-items-center border-bottom p-2 mb-2">
                    <div class="fw-bold fs-6"><i class="bi bi-wordpress text-primary fs-5"></i> Post to WordPress</div>
                    <button class="btn btn-sm btn-dark" data-bs-dismiss="modal" aria-label="Close">
                        Back
                    </button>
                </div>
                <div class="d-flex justify-content-center my-2">
                    <span id="wp-template-details-spinner" style="display: none;" class="loader mx-3"><?php echo $spinner; ?></span>
                </div>
                <?php
                if ($active_sub == 2) {

                    $sql_wp = "SELECT wp_url, wp_user, wp_pass FROM users WHERE users.email = '$user_email'";
                    $rs_wp = $mysqli->query($sql_wp);
                    $row_wp = $rs_wp->fetch_assoc();
                ?>
                    <!-- Post details -->
                    <small class="fw-bold">Post details</small>
                    <div class="row row-cols-3 mb-3">
                        <div class="col form-floating">
                            <input type="number" class="form-control border-top-0 border-start-0 border-end-0 border rounded-0" id="wp-cat" name="wp-cat" autocomplete="off" placeholder="" maxlength="50">
                            <label class="text-muted" for="wp-cat">Category <sup><small>Category ID (Number)</small></sup></label>
                        </div>
                        <div class="col form-floating">
                            <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border rounded-0" id="wp-title" name="wp-title" autocomplete="off" placeholder="" maxlength="50">
                            <label class="text-muted" for="wp-title">Post title *</label>
                        </div>
                        <div class="col form-floating">
                            <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border rounded-0" id="wp-tags" name="wp-tags" autocomplete="off" placeholder="" maxlength="50">
                            <label class="text-muted" for="wp-tags">Tags <sup><small>Comma separated</small></sup></label>
                        </div>
                        <div class="col form-floating">
                            <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border rounded-0" id="wp-excerpt" name="wp-excerpt" autocomplete="off" placeholder="" maxlength="100">
                            <label class="text-muted" for="wp-excerpt">Excerpt<small class="m-1 text-muted"></small></label>
                        </div>
                    </div>
                    <small class="fw-bold">Post body</small>
                    <div class="my-2">
                        <div id="wp-content"></div> <!-- content to be appended to form dynamically -->
                    </div>
                    <!-- WP credentials -->
                    <div class="col-md my-2">
                        <span class="fw-bold mt-2">Enter your WordPress credentials below
                            <small tabindex="0" role="button" type="button" data-bs-toggle="popover" data-bs-html="true" title="" data-bs-content="                                                                
                                <p>Your password is used to verify your WordPress identity. We do not store your credentials (unless you want us to by checking the box below) and we only need them to authenticate requests to your
                                    WordPress account.</p>

                                <p>We use the XML-RPC API thus ensure it is enabled on your WordPress site and server. XML-RPC is usually enabled by default. Not sure? Follow
                                    <a href='https://codex.wordpress.org/XML-RPC_Support'
                                target='_blank' class='link-dark fw-bold'>this guide</a> to enable it.</p>" data-bs-original-title="Please note">
                                <span class="text-muted">Please note <i class="bi bi-info-circle-fill"></i></span>
                            </small>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-floating">
                            <input type="url" class="form-control border-top-0 border-start-0 border-end-0 border rounded-0" name="wp-url" id="wp-url" value="<?php echo $row_wp["wp_url"]; ?>" autocomplete="off" maxlength="100" required>
                            <label class="text-muted" for="wp-url"><i class="bi bi-globe"></i> Site URL<sup><small>eg https://example.com</small></sup> *</label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="number" class="form-control border-top-0 border-start-0 border-end-0 border rounded-0" name="wp-author" id="wp-author" placeholder="" autocomplete="off" maxlength="50">
                            <label class="text-muted" for="wp-author">Post Author <sup><small>Author ID (Number)</small></sup></label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border rounded-0" name="wp-username" id="wp-username" value="<?php echo $row_wp["wp_user"]; ?>" autocomplete="off" maxlength="50" required>
                            <label class="text-muted" for="wp-username">Username/Email *</label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="password" class="form-control pass-input border-top-0 border-start-0 border-end-0 border rounded-0" id="wp-pass" name="wp-pass" autocomplete="off" value="<?php echo $row_wp["wp_pass"]; ?>" maxlength="50" required>
                            <label class="text-muted" for="wp-pass">WordPress password *</label>
                        </div>
                        <div class="d-flex justify-content-start my-3">
                            <div class="form-check mx-2">
                                <input class="form-check-input pass-toggle" type="checkbox" id="showPassSwitch">
                                <label class="form-check-label text-dark text-sm" for="flexCheckDefault">
                                    Show password
                                </label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" name="rem_wp" type="checkbox" id="remWPCred">
                                <label class="form-check-label text-dark text-sm" for="flexCheckDefault">
                                    Remember WordPress credentials
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 ps-2">
                        <div class="col form-check">
                            <input class="form-check-input" type="checkbox" value="" id="wp-status">
                            <label class="form-check-label" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Check this box to directly publish the post to WordPress, otherwise it will be saved as a draft in your account" for="flexCheckChecked">
                                Publish to WordPress publicly
                            </label>
                        </div>
                        <div class="col-md-2 mt-2 mb-1">
                            <button id="wp-submit-btn" class="w-100 my-2 btn rounded-3 btn-dark" onclick='publishToWordPress()'>
                                <span id="wp-spinner" style="display: none;">
                                    <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                                </span>
                                <span id="wp-button-text">Post</span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- End publish to WordPress modal -->

<!-- Modal prompting user to sign up for pro account  -->
<div class="modal py-2 fade" id="premiumSignup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-5 bg-custom-primary text-light">
            <div class="modal-header">
                <h6 class="modal-title fs-5" id="modal-title">Become an Express member!</h6>
                <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#templateDetailsModal">
                    Back
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-4 border-0 rounded-3 shadow-sm ">
                    <div class="card-body bg-custom-primary">
                        <div class="list-group border-0 p-1 bg-custom-primary">
                            <div class="list-group-item border-0 d-flex gap-3 py-3 bg-custom-primary">
                                <i class="bi bi-star-fill text-warning"></i>
                                <div class="d-flex gap-2 w-100 justify-content-start">
                                    <p class="mb-0 text-light">Save <strong>unlimited</strong> templates</p>
                                </div>
                            </div>
                            <div class="list-group-item border-0 d-flex gap-3 py-3 bg-custom-primary">
                                <i class="bi bi-star-fill text-warning"></i>
                                <div class="d-flex gap-2 w-100 justify-content-start">
                                    <div class="text- text-light">
                                        <strong>Up to 2000 characters of generated text in a single run</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0 d-flex gap-3 py-3 bg-custom-primary">
                                <i class="bi bi-star-fill text-warning"></i>
                                <div class="d-flex gap-2 w-100 justify-content-start">
                                    <div>
                                        <p class="mb-0 text-light">Publish directly to <strong>WordPress</strong>.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0 d-flex gap-3 py-3 bg-custom-primary">
                                <i class="bi bi-star-fill text-warning"></i>
                                <div class="d-flex gap-2 w-100 justify-content-start">
                                    <div>
                                        <p class="mb-0 text-light">Enjoy audio playback</strong>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $base_url; ?>/pricing" style="background-color: #6610f2;" class="w-100 btn btn-lg btn-primary sub-btn">Get started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->

<!-- Custom JS -->
<script src="<?php echo $base_url; ?>/assets/js/custom.js" type="text/javascript"></script>

<!-- SWAL -->
<script src="<?php echo $base_url; ?>/assets/js/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Shepherd JS -->
<script src="https://cdn.jsdelivr.net/npm/shepherd.js@10.0.1/dist/js/shepherd.min.js"></script>

<script type="text/javascript">
    /**
     * Call IntroJS
     */
    // introJs().start();

    /**
     * Cookie consent
     */
    window.addEventListener('DOMContentLoaded', (event) => {
        let cookie_consent = getCookie("cookie_consent");
        if (cookie_consent !== "true") {
            $('#cookie-consent').fadeIn(400);
        }
    });

    /**
     * Password Reset
     */

    // Hide error message on input fields
    Id("reset_email").oninput = () => {
        Id("reset_email_err").innerHTML = ""
    }

    // User email entry
    function resetPwdEmailEntry(email) {
        $("#resetPwdEmailEntryForm").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form when submit button is clicked.
            e.stopImmediatePropagation(); // prevent multiple submission of the form.

            var form = $(this);
            var url = form.attr('action');

            $("#reset-spinner").show();
            $("#reset-button-text").html('');

            $.ajax({
                type: "POST",
                url: base_url + "/reset_email/",
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    if (data === "SUCCESS") {
                        clearInputs();
                        $('#resetPwdEmailEntryModal').modal('hide');
                        Swal.fire({
                            title: '<strong class="text-dark">Success</strong>',
                            icon: 'success',
                            toast: true,
                            position: 'top-end',
                            html: '<p class="text-dark">Please check the inbox or spam folder of <strong>' + email + '</strong>.</p>',
                            showConfirmButton: false,
                            showCancelButton: true,
                            cancelButtonText: 'Close',
                            cancelButtonColor: '#0d6efd'
                        });
                    } else if (data === "FAILED") {
                        showToastMessage("Dang! Something went wrong. Please try again", "danger");
                    } else if (data === "EMAIL_INEXISTENT") {
                        $("#reset_email_err").show();
                        $("#reset_email_err").html("We couldn't find any account connected to that email");
                    } else if (data === "EMPTY") {
                        $("#reset_email_err").show();
                        $("#reset_email_err").html("Please enter your email address");
                    }

                    $("#reset-spinner").hide();
                    $("#reset-button-text").html('Submit');
                },
                error: function(error) {
                    showToastMessage("Dang! Something went wrong. Please try again", "danger");
                    $("#reset-spinner").hide();
                    $("#reset-button-text").html('Submit');
                }
            });
        });
    }

    function resetPassword(email) {
        $("#resetPasswordForm").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form when submit button is clicked.
            e.stopImmediatePropagation(); // prevent multiple submission of the form.

            var form = $(this);
            var url = form.attr('action');
            var password = Id('reset_pwd_confirm').value;

            $("#reset-pwd-spinner").show();
            $("#reset-pwd-text").html('');
            Id('pwd_reset_btn').disabled = true;

            if (Id("reset_pwd").value !== "" && Id("reset_pwd_confirm").value !== "") {

                $.ajax({
                    type: "POST",
                    url: base_url + "/reset_pwd/",
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {
                        if (data === "SUCCESS") {
                            clearInputs();
                            $('#signupModal').modal('hide');
                            Swal.fire({
                                title: '<strong class="text-dark">Success</strong>',
                                icon: 'success',
                                toast: true,
                                position: 'top-end',
                                html: '<p class="text-dark">Your password has been reset successfully</p>',
                                confirmButtonText: '<span onclick="popSigninModal();">Sign in now <i class="bi bi-arrow-right"></i></span>'
                            });
                            $("#reset-pwd-spinner").hide();
                            $("#reset-pwd-text").html('Submit');
                            $('#useremail').val(email);
                            $('#password').val(password);
                        } else {
                            if (data === "TOO_SHORT") {
                                showToastMessage("Your password is too short", "danger");
                            } else if (data === "CONFIRM_PASS") {
                                $("#reset_pwd_confirm_err").show();
                                $("#reset_pwd_confirm_err").html("Please confirm your password");
                            } else if (data === "MISMATCH") {
                                $("#reset_pwd_confirm_err").show();
                                $("#reset_pwd_confirm_err").html("Password mismatch");
                            } else if (data === "PASS_MISSING") {
                                $("#reset_pwd_err").show();
                                $("#reset_pwd_err").html("Password is required");
                            } else if (data === "FAILED") {
                                showToastMessage("Oops! Something went wrong, please try again", "danger");
                            } else {
                                showToastMessage("Oops! Something went wrong, please try again", "danger");
                            }
                            $("#reset-pwd-spinner").hide();
                            $("#reset-pwd-text").html('Submit');
                            Id('pwd_reset_btn').disabled = false;
                        }
                    },
                    error: function(error) {
                        showToastMessage("Dang! Something went wrong. Please try again", "danger");
                        $("#reset-pwd-spinner").hide();
                        $("#reset-pwd-text").html('Submit');
                        Id('pwd_reset_btn').disabled = false;
                    }
                });
            } else {
                showToastMessage("Please enter and confirm your password in the fields above", "primary");
                $("#reset-pwd-spinner").hide();
                $("#reset-pwd-text").html('Submit');
                Id('pwd_reset_btn').disabled = false;
            }
        });
    }

    // Show/hide password
    var pass_inputs = Class("pass-input")
    var pass_toggles = Class("pass-toggle")
    Array.prototype.slice.call(pass_toggles)
        .forEach(function(toggle) {
            toggle.onclick = () => {
                Array.prototype.slice.call(pass_inputs)
                    .forEach(function(input) {
                        if (input.type == "password") {
                            input.type = "text";
                        } else if (input.type == "text") {
                            input.type = "password";
                        }
                    })
            }
        })

    // Hide error messages/tooltips
    var form_inputs = Class("form-inputs")
    var err_tooltips = Class("invalid-tooltip")
    Array.prototype.slice.call(form_inputs)
        .forEach(function(input) {
            input.oninput = () => {
                Array.prototype.slice.call(err_tooltips)
                    .forEach(function(tooltip) {
                        // tooltip.classList.remove('invalid-tooltip');
                        tooltip.style.display = 'none';
                    })
            }
        })

    /* End Password Reset */

    // Chat support
    function startChat() {
        var script = document.createElement("script");
        script.src = "//code.tidio.co/hammm8pqxntxuppjmkvhaxahtecvf5lk.js";

        // append and execute script
        document.documentElement.firstChild.appendChild(script);

    }
    // End chat

    function getSliderValue(id) {
        // var value = $('#' + id).val();
        // $(id + "_show").html(value);
        var value = document.getElementById(id).value;
        document.getElementById(id + "_show").innerHTML = value;

        // set cookie
        setCookie("dash_" + id, value, 365);
    }
</script>

</body>

</html>