<!-- Toast -->
<div class="position-fixed bottom-0 start-50 translate-middle-x p-3 rounded-3" style="z-index: 9999;">
    <div id="liveToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastMessageCmpnt"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- Cookie consent -->
<div class="row" id="cookie-consent" style="display: none;">
    <div class="col-md-4 col-sm-12 button-fixed">
        <div class="p-3 pb-4 bg-custom text-white">
            <div class="row">
                <div class="col-10">
                    <h6>Allow Cookies</h6>
                </div>
            </div>
            <p style="font-size: 14px;">We use cookies to improve your experience.
            </p>
            <button style="font-size: 14px;" type="button" class="btn btn-danger w-100" onclick="setCookie('cookie_consent', 'true', 365)">Accept Cookies</button>
        </div>
    </div>
</div>
</main>

<!-- Footer -->
<div class="bg-light text-dark">
    <div class="container">
        <footer class="py-5">
            <div class="row">
                <div class="col-3">
                    <h5 class="fw-bold footer-heading">Quick actions</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>/dashboard" onclick="handleStartBtn()" class="nav-link p-0 text-dark empty-link">Get started</a></li>
                        <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>/pricing" class="nav-link p-0 text-dark"><strong>Go premium!</strong></a></li>
                        <li class="nav-item mb-2"><a href="#services" class="nav-link p-0 text-dark">Become an affiliate</a></li>
                        <li class="nav-item mb-2"><a href="javascript: void(0)" onclick="startChat()" class="nav-link p-0 text-dark">Help</a></li>
                    </ul>
                </div>

                <div class="col-3">
                    <h5 class="fw-bold footer-heading">Company</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#about-us" class="nav-link p-0 text-dark">About us</a></li>
                        <li class="nav-item mb-2"><a href="#contact-us" class="nav-link p-0 text-dark">Contact us</a></li>
                        <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>/blog" class="nav-link p-0 text-dark">News and insights</a></li>
                        <li class="nav-item mb-2"><a href="#!press" class="nav-link p-0 text-dark">Media & Press</a></li>
                    </ul>
                </div>

                <div class="col-5 offset-1">
                    <form>
                        <h5 class="fw-bold footer-heading">Stay in the know</h5>
                        <p>Monthly digest of whats new and exciting from us.</p>
                        <div class="d-flex w-100 gap-2">
                            <label class="text-muted" class="text-muted" for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-sm border-white btn-primary" type="button">Notify&nbsp;me</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-4 mt-4 border-top border-secondary">
                <p>&copy; 2022 ParrotAI. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="text-dark" href="#"><i class="bi bi-twitter"></i></a></li>
                    <li class="ms-3"><a class="text-dark" href="#"><i class="bi bi-instagram"></i></a></li>
                    <li class="ms-3"><a class="text-dark" href="#"><i class="bi bi-facebook"></i></a></li>
                    <li class="ms-3"><a class="text-dark" href="#"><i class="bi bi-linkedin"></i></a></li>
                </ul>
            </div>
        </footer>
    </div>
</div>
<!-- Footer -->


<!-- Signup modal -->
<div class="modal modal-signin py-5 fade" tabindex="-1" role="dialog" id="signupModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h2 class="fw-bold mb-0">Sign up</h2>
                <button id="dismiss-signup" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="row needs-validation" action="" method="POST" id="signupForm" novalidate>
                    <div class="form-floating col-sm-6 mb-3">
                        <input type="text" class="form-control form-inputs signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="usernamesignup" id="usernamesignup" placeholder="First name" autocomplete="off" maxlength="50" required>
                        <label class="text-muted" class="text-muted" for="usernamesignup">First name</label>
                        <span id="username_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating col-sm-6 mb-3">
                        <input type="text" class="form-control form-inputs signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="lname" id="lname" placeholder="Last name" autocomplete="off" maxlength="50">
                        <label class="text-muted" for="lname">Last name <sup class="text-muted">(Optional)</sup></label>
                        <span id="lname_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-inputs signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="emailsignup" id="emailsignup" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
                        <label class="text-muted" for="emailsignup">Email address</label>
                        <span id="emailexists_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating col-sm-6 mb-3">
                        <input type="password" class="form-control form-inputs  pass-input signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="pwdsignup" id="pwdsignup" placeholder="Password" autocomplete="off" minlength="6" maxlength="50" required>
                        <label class="text-muted" for="pwdsignup">Password</label>
                        <span id="signup_pwd_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating col-sm-6 mb-3">
                        <input type="password" class="form-control form-inputs  pass-input signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="confirmpwd" id="confirmpwd" placeholder="Confirm password" autocomplete="off" minlength="6" maxlength="50" required>
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
                    <button class="w-100 mb-2 btn btn-lg rounded-4 py-2 btn-primary" onclick="signupUser();">
                        <span id="signup-spinner" style="display: none;">
                            <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                        </span>
                        <span id="signup-button-text">Sign up</span>
                    </button>
                    <!-- <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="signupUser();">Sign up</button> -->
                    <small class="text-muted">By clicking Sign up, you agree to the <a href="<?php echo $base_url; ?>/terms/">terms</a> of use.</small>
                    <hr class="my-4">
                    <h2 class="fs-6 fw-bold mb-3">I already have an account</h2>
                    <a class="w-100 py-2 mb-2 btn btn-outline-primary rounded-4" onclick="popSigninModal();"> Sign in </a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End signup modal -->

<!-- Signin modal -->

<div class="modal modal-signin py-5 fade" tabindex="-1" role="dialog" id="signinModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h2 id="login-title" class="fw-bold mb-0">Sign in</h2>
                <button id="dismiss-signin" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <form class="needs-validation" action="" method="POST" id="signinForm" novalidate>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="useremail" name="useremail" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
                        <label class="text-muted" for="useremail">Email address</label>
                        <span id="email_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control pass-input form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="password" name="password" placeholder="Password" autocomplete="off" maxlength="50" required>
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
                    <input type="hidden" id="signin" name="signin">
                    <div class="text-center">
                        <button class="w-50 mb-2 btn btn-lg rounded-4 btn-primary" onclick="signinUser();">Sign in</button> <br>
                        <div class="text-center mt-2 mb-4">
                            <span class="btn btn-sm btn-white shadow" type="button" onclick="popResetPwdEmailEntryModal()">I forgot my password</span>
                        </div>
                        <!-- <small class="text-dark">New here?</small> <br> -->
                        <h2 class="fs-6 fw-bold mb-3">New here?</h2>
                        <a class="w-50 py-2 mt-2 mb-2 btn btn-outline-primary rounded-4" onclick="popSignupModal();">
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

<div class="modal modal-signin py-5 fade" tabindex="-1" role="dialog" id="resetPwdEmailEntryModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h3 id="reset-email-title" class="fw-bold mb-0">Reset password</h3>
                <button id="dismiss-signin" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <h2 class="fs-6 fw-bold mt-4 mb-3">Enter your email address below</h2>
                <form class="needs-validation" action="" method="POST" id="resetPwdEmailEntryForm" novalidate>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="reset_email" name="reset_email" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
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

<!-- End Modal -->


<!-- scripts -->
<script src="<?php
                if ($base_url == "" || empty($base_url)) {
                    $base_url = '/parrot';
                    echo $base_url;
                } else {
                    echo $base_url;
                }
                ?>/assets/js/custom.js"></script>
<script src="<?php if ($base_url == "" || empty($base_url)) {
                    $base_url = '/parrot';
                    echo $base_url;
                } else {
                    echo $base_url;
                } ?>/assets/js/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/intro.js"></script>

<script type="text/javascript">
    /**
     * Cookie consent
     */
    window.addEventListener('DOMContentLoaded', (event) => {
        let cookie_consent = getCookie("cookie_consent");
        if (cookie_consent !== "true") {
            $('#cookie-consent').fadeIn(400);
        }
    });

    function setCookie(cname, cvalue, exdays) {
        if (cname = "cookie_consent") {
            if (cvalue === "true") {
                $('#cookie-consent').fadeOut(500);
            }
        }
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

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
    var pass_inputs = document.getElementsByClassName("pass-input")
    var pass_toggles = document.getElementsByClassName("pass-toggle")
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
    var form_inputs = document.getElementsByClassName("form-inputs")
    var err_tooltips = document.getElementsByClassName("invalid-tooltip")
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
    }


    function completeDemoPrompt() {

        var context = $("#prompt_text").val();

        var outputarea = $("#outputarea");

        if (typeof context !== 'undefined' && context !== null && context != "") {

            // $("#outputarea").html("");
            $("#gen-text-spinner").show();
            $("#gen-text").html("Getting the juice...");

            var SendInfo = {
                "context": context,
                "top_p": 0.9,
                "temp": 0.75,
                "response_length": 256,
                "remove_input": true,
                "demo": true,
            };

            $.ajax({
                type: 'POST',
                url: base_url + '/dashboard/prompt/',
                data: JSON.stringify(SendInfo),
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: function(data) {
                    $("#gen-text-spinner").hide();
                    $("#gen-text").html("Generate text");
                    $("#prompt").html(context);
                    outputarea.html(context + ' ' + data);
                    // outputarea.html(data.signon);
                },
                error: function() {
                    $("#gen-text-spinner").hide();
                    $("#gen-text").html("Generate text");
                    showToastMessage("Dang! Something went wrong.", "danger");
                }

            });
        } else {
            showToastMessage("Please enter some text into the prompt area", "primary");
        }
    }


    /**
     * Undo/Redo
     * Content change event listeners: https://stackoverflow.com/questions/1391278/contenteditable-change-events
     * Answer by Balupton
     */
    // undo redo
    // var textArray = [];
    // var myOutputArea = Id('outputarea');
    // var me_text = myOutputArea.innerHTML;
    // var toastMessageCmpnt = document.getElementById("toastMessageCmpnt");

    // var current_key = textArray.indexOf(me_text);
    // var prev_key = +current_key - 1;
    // var next_key = +current_key + 1;

    // // myOutputArea.addEventListener("input", () => {
    // //     me_text = myOutputArea.innerHTML;
    // //     textArray.push(me_text);

    // //     current_key = textArray.indexOf(me_text);
    // //     prev_key = +current_key - 1;
    // //     next_key = +current_key + 1;

    // // });

    // $('body').on('focus', '#outputarea', function() {
    //     const $this = $(this);
    //     $this.data('before', $this.html());
    // }).on('blur keyup paste input', '#outputarea', function() {
    //     const $this = $(this);
    //     if ($this.data('before') !== $this.html()) {
    //         me_text = myOutputArea.innerHTML;
    //         textArray.push(me_text);

    //         current_key = textArray.indexOf(me_text);
    //         prev_key = +current_key - 1;
    //         next_key = +current_key + 1;
    //     }
    // });

    // function undo() {
    //     if (prev_key) {
    //         myOutputArea.innerHTML = textArray[prev_key];
    //         current_key = prev_key;
    //         prev_key = +current_key - 1;
    //         next_key = +current_key + 1;
    //     } else {
    //         showToastMessage("Nothing to undo", "primary")
    //     }
    // }

    // function redo() {
    //     if (next_key) {
    //         myOutputArea.innerHTML = textArray[next_key];
    //         current_key = next_key;
    //         prev_key = +current_key - 1;
    //         next_key = +current_key + 1;
    //     } else {
    //         showToastMessage("Nothing to redo", "primary")
    //     }
    // }
</script>

</body>

</html>