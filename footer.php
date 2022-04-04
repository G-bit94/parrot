<!-- Toast -->
<div class="position-fixed top-0 end-0 p-3 rounded-3" style="z-index: 9999;">
    <div id="liveToast" class="toast align-items-center text-white border-0" style="background-color: #0b5ed7;" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastMessageCmpnt"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- Cookie consent -->
<!-- <div class="row">
    <div class="col-md-4 col-sm-12 button-fixed">
        <div class="p-3 pb-4 bg-custom text-white">
            <div class="row">
                <div class="col-10">
                    <h6>Allow Cookies</h6>
                </div>
            </div>
            <p style="font-size: 14px;">We use cookies to improve your experience.
            </p>
            <button style="font-size: 14px;" type="button" class="btn btn-danger w-100">Accept Cookies</button>
        </div>
    </div>
</div> -->
</main>

<!-- Footer -->
<div class="bg-primary text-light">
    <div class="container">
        <footer class="py-5">
            <div class="row">
                <div class="col-3">
                    <h5 class="fw-bold">Quick actions</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#!" onclick="handleStartBtn()" class="nav-link p-0 text-light">Get started</a></li>
                        <li class="nav-item mb-2"><a href="<?php echo $base_url ?>/pricing" class="nav-link p-0 text-light"><strong>Go premium!</strong></a></li>
                        <li class="nav-item mb-2"><a href="#services" class="nav-link p-0 text-light">Become an affiliate</a></li>
                    </ul>
                </div>

                <div class="col-3">
                    <h5 class="fw-bold">Company</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#about-us" class="nav-link p-0 text-light">About us</a></li>
                        <li class="nav-item mb-2"><a href="#contact-us" class="nav-link p-0 text-light">Contact us</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">News and insights blog</a></li>
                    </ul>
                </div>

                <div class="col-5 offset-1">
                    <form>
                        <h5 class="fw-bold">Stay in the know</h5>
                        <p>Monthly digest of whats new and exciting from us.</p>
                        <div class="d-flex w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-sm border-white btn-primary" type="button">Notify&nbsp;me</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-4 mt-4 border-top border-secondary">
                <p>&copy; 2022 ParrotAI. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-twitter"></i></a></li>
                    <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-instagram"></i></a></li>
                    <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-facebook"></i></a></li>
                    <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-linkedin"></i></a></li>
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
                        <input type="text" class="form-control signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-dark rounded-0" name="usernamesignup" id="usernamesignup" placeholder="First name" autocomplete="off" maxlength="50" required>
                        <label for="usernamesignup">First name</label>
                        <span id="username_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating col-sm-6 mb-3">
                        <input type="text" class="form-control signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-dark rounded-0" name="lname" id="lname" placeholder="Last name" autocomplete="off" maxlength="50">
                        <label for="lname">Last name <sup class="text-muted">(Optional)</sup></label>
                        <span id="lname_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-dark rounded-0" name="emailsignup" id="emailsignup" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
                        <label for="emailsignup">Email address</label>
                        <span id="emailexists_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating col-sm-6 mb-3">
                        <input type="password" class="form-control signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-dark rounded-0" name="pwdsignup" id="pwdsignup" placeholder="Password" autocomplete="off" minlength="6" maxlength="50" required>
                        <label for="pwdsignup">Password</label>
                        <span id="signup_pwd_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating col-sm-6 mb-3">
                        <input type="password" class="form-control signup-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-dark rounded-0" name="confirmpwd" id="confirmpwd" placeholder="Confirm password" autocomplete="off" minlength="6" maxlength="50" required>
                        <label for="confirmpwd">Confirm password</label>
                        <span id="mismatch_err" class="invalid-tooltip"></span>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-4 py-2 btn-primary" onclick="signupUser();">
                        <span id="signup-spinner" style="display: none;">
                            <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                        </span>
                        <span id="signup-button-text">Sign up</span>
                    </button>
                    <!-- <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="signupUser();">Sign up</button> -->
                    <small class="text-muted">By clicking Sign up, you agree to the <a href="<?php echo $base_url; ?>/terms.php">terms</a> of use.</small>
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
                        <input type="email" class="form-control form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-dark rounded-0" id="useremail" name="useremail" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
                        <label for="useremail">Email address</label>
                        <span id="email_err" class="invalid-tooltip"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border-dark rounded-0" id="password" name="password" placeholder="Password" autocomplete="off" maxlength="50" required>
                        <label for="password">Password</label>
                        <span id="password_err" class="invalid-tooltip"></span>
                    </div>
                    <input type="hidden" id="signin" name="signin">
                    <div class="text-center">
                        <button class="w-50 mb-2 btn btn-lg rounded-4 btn-primary" onclick="signinUser();">Sign in</button> <br>
                        <div class="text-center mt-2 mb-4">
                            <span class="btn btn-sm btn-white shadow" type="button" onclick="location.href='reset.php'">I forgot my password</span>
                        </div>
                        <!-- <small class="text-light">New here?</small> <br> -->
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

<!-- scripts -->
<script src="<?php echo $base_url; ?>/assets/js/custom.js"></script>
<script src="<?php echo $base_url; ?>/assets/js/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
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
                "response_length": 64,
                "remove_input": true
            };

            $.ajax({
                type: 'POST',
                url: 'https://api.eleuther.ai/completion',
                data: JSON.stringify(SendInfo),
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: function(data) {
                    $("#gen-text-spinner").hide();
                    $("#gen-text").html("Generate text");
                    $("#prompt").html(context);
                    outputarea.html(data[0].generated_text);
                },
                error: function() {
                    $("#gen-text-spinner").hide();
                    $("#gen-text").html("Generate text");
                    Swal.fire({
                        title: "Dang! Something went wrong",
                        icon: 'warning',
                        toast: true,
                        position: 'top-end',
                        timer: 7000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        width: '25rem',
                        padding: '0.75rem',
                        html: '<p class="text-dark">Could you try that again?</p>',
                    });
                }

            });
        } else {
            Swal.fire({
                icon: 'warning',
                toast: true,
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                width: '28rem',
                padding: '0.75rem',
                title: '<p class="text-dark">Enter something into the prompt area</p>',
            });
        }
    }

    // // undo redo
    // var textArray = [];
    // var myOutputArea = document.getElementById('outputarea');
    // var text = myOutputArea.value;
    // var toastMessageCmpnt = document.getElementById("toastMessageCmpnt");

    // let current_key = textArray.indexOf(text);
    // let prev_key = +current_key - 1;
    // let next_key = +current_key + 1;

    // document.getElementById('gen-text').addEventListener("click", () => {
    //     textArray.push(text);

    //     current_key = textArray.indexOf(text);
    //     prev_key = +current_key - 1;
    //     next_key = +current_key + 1;

    // });

    // function undo() {
    //     if (typeof prev_key !== 'undefined' && prev_key !== null && prev_key != "") {
    //         myOutputArea.value = textArray[prev_key];
    //         current_key = prev_key;
    //         prev_key = +current_key - 1;
    //         next_key = +current_key + 1;
    //     } else {
    //         var liveToast = document.getElementById('liveToast')
    //         var toast = new bootstrap.Toast(liveToast)
    //         toastMessageCmpnt.innerText = "Nothing to undo";
    //         toast.show()
    //     }
    // }

    // function redo() {
    //     if (typeof next_key !== 'undefined' && next_key !== null && next_key != "") {
    //         myOutputArea.value = textArray[next_key];
    //         current_key = next_key;
    //         prev_key = +current_key - 1;
    //         next_key = +current_key + 1;
    //     } else {
    //         var liveToast = document.getElementById('liveToast')
    //         var toast = new bootstrap.Toast(liveToast)
    //         toastMessageCmpnt.innerText = "Nothing to redo";
    //         toast.show()
    //     }
    // }
</script>

</body>

</html>