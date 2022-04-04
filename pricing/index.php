<?php

include "../header.php";

?>

<style>
    * {
        box-sizing: border-box;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #0d6efd;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #0d6efd;
    }
</style>

<div class="container my-3">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal" id="title">Choose a plan</h3>
            <p class="lead fs-4 text-secondary">And stop overpaying for your AI content.</p>
    </div>
</div>

<!-- Pricing table -->
<div class="row row-cols-1 row-cols-md-3 text-center container-fluid mt-5 mb-5 py-3">
    <div class="col">
        <div class="mb-4 rounded-3">
            <p class="bd-callout text-start">
                <strong>We know using other AI tools costs you shedloads of money. <br><br>We're here to change that. Just select a plan and start using AI for your content needs affordably.</strong>
            </p>
        </div>
    </div>

    <!-- Deluxe -->
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary box">
            <div class="ribbon ribbon-top-right">
                <span>
                    <i class="bi bi-star-fill text-warning"></i>
                    Popular
                    <i class="bi bi-star-fill text-warning"></i>
                </span>
            </div>
            <div class="card-header bg-primary text-white rounded-top py-3 border-primary">
                <h4 class="my-0 fw-normal" id="s_plan_1">Deluxe</h4>
            </div>
            <div class="card-body">
                <strong class="card-title pricing-card-title d-flex justify-content-center">
                    <span>
                        <span class="d-flex justify-content-between">
                            <p class="text-decoration-line-through mx-1">$15/mo or $84/yr</p>
                            <p class="badge bg-warning text-dark rounded-pill fs-6">Save 38%</p>
                        </span>
                        <span class="fw-bolder fs-3">
                            $9<small class="text-muted fw-light">/mo</small> or
                            $52<small class="text-muted fw-light">/yr</small>
                        </span>
                    </span>
                </strong>

                <div class="list-group border-0 p-1">
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <p class="mb-0">Save <strong>unlimited</strong> items</p>
                        </div>
                    </div>
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <div>
                                <p class="mb-0">Control over the AI's <strong>creativity</strong>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <div class="text-start">
                                <strong>Up to 1000 characters of generated text in a single run</strong>
                                <p class="mb-0 text-muted fs-6">Generate an entire <strong>article</strong> in a few clicks</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <div>
                                <p class="mb-0"><strong>No filters</strong>.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="sub_s_plan_1" onclick="subscribeToPlan(Id('s_plan_1').innerText, 15, 84, 38)" class="w-100 btn btn-lg btn-primary sub-btn">Get started</button>
            </div>
        </div>
    </div>
    <!-- End Deluxe -->

    <!-- Parakeet -->
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal" id="s_plan_2">Parakeet</h4>
            </div>
            <div class="card-body">
                <strong class="card-title pricing-card-title d-flex justify-content-center">
                    <span>
                        <span class="d-flex justify-content-between">
                            <p class="text-decoration-line-through mx-1">$20/mo or $130/yr</p>
                            <p class="badge bg-warning text-dark rounded-pill fs-6">Save 33%</p>
                        </span>
                        <span class="fw-bolder fs-3">
                            $13<small class="text-muted fw-light">/mo</small> or
                            $87<small class="text-muted fw-light">/yr</small>
                        </span>
                    </span>
                </strong>

                <div class="list-group border-0 p-1">
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <p class="mb-0">Save <strong>unlimited</strong> items</p>
                        </div>
                    </div>
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <div>
                                <p class="mb-0">Control over the AI's <strong>creativity</strong>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <div class="text-start">
                                <strong>Up to 2000 characters of generated text in a single run</strong>
                                <p class="mb-0 text-muted fs-6">Generate an entire <strong>article</strong> in just a couple of clicks</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <div>
                                <p class="mb-0">Publish directly to <strong>WordPress</strong>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <div>
                                <p class="mb-0"><strong>No filters</strong>.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="sub_s_plan_2" onclick="subscribeToPlan(Id('s_plan_2').innerText, 20, 130, 33)" class="w-100 btn btn-lg btn-primary sub-btn">Get started</button>
            </div>
        </div>
    </div>
    <!-- End parakeet -->
</div>
<!-- End pricing table -->

<!-- Contactus -->
<div class="px-4 text-center py-2" id="contactus">
    <p class="fs-3 mb-5 fw-bold"><strong>Facing a problem? We'd love to help. Seriously</strong></p>
    <div class="row row-cols-1 row-cols-md-3 my-5">
        <div class="col my-5">
            <div class="col mr-auto text-center">
                <p class="fs-5">Talk to one of our customer support representatives right away.</p>
                <button class="btn btn-lg btn-dark my-5" onclick="startChat()"><i class="bi bi-chat-left"></i> &nbsp;Start chat</button>
            </div>
        </div>
        <div class="col my-5">
            <p class="fs-2">OR</p>
        </div>
        <div class="col my-5">
            <p class="fs-5">Drop us a line and we'll talk — or get back to you as soon as we can.</p>
            <div class="col mr-auto text-center">
                <a class="btn btn-outline-dark my-5" href="mailto:info.parrot-ai@gmail.com">
                    <i class="bi bi-envelope-open"></i>&nbsp;info.parrot-ai@gmail.com
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End contactus -->

<!-- Subscribe modal -->
<div class="modal modal-signin fade py-2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" id="subsciptionModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="card-header m-4">
                <div class="mb-0 fs-3">
                    <p class="badge bg-primary rounded-pill">
                        <i class="bi bi-cart"></i><span class="fw-bold plan-name"></span>
                    </p> plan selected
                </div>
            </div>

            <div id="paymentDetails" class="mx-3 pb-2 col-md-6">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0"><span class="plan-name"></span> plan</h6>
                            <small class="plan-period text-capitalize"></small>
                        </div>
                        <span class="text-muted plan-price"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div class="text-dark">
                            <h6 class="my-0">Offer</h6>
                            <small>You've saved <span class="badge fs-6 bg-warning text-dark rounded-pill">$<span id="offer"></span></span></small>
                        </div>
                        <span class="text-dark" id="offerAmount"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong id="total"></strong>
                    </li>
                </ul>
            </div>

            <div class="pb-4 mx-3">
                <!-- Multistep checkout -->
                <div class="row">
                    <div class="tab">
                        <div class="mb-0 fs-6 fw-bold">Choose the most convenient payment period below</div>
                        <div class="my-4 border rounded-3 p-3">
                            <div class="form-check">
                                <input id="yearly" name="period" type="radio" class="form-check-input period" value="yearly">
                                <label class="form-check-label" for="yearly">Select yearly plan</label>
                            </div>
                            <div class="form-check">
                                <input id="monthly" name="period" type="radio" class="form-check-input period" value="monthly">
                                <label class="form-check-label" for="monthly">Select monthly plan</label>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="mb-0 fs-6 fw-bold">Select the most convenient payment method for you below</div>
                        <div class="my-4 border rounded-3 p-3">
                            <div class="form-check">
                                <input id="m-pesa" name="paymentMethod" type="radio" class="form-check-input method" value="M-PESA">
                                <label class="form-check-label" for="m-pesa">M-PESA</label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input method" value="PayPal">
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                            <div class="form-check">
                                <input id="card" name="paymentMethod" type="radio" class="form-check-input method" value="Card">
                                <label class="form-check-label" for="card">Card</label>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <!-- Paypal checkout -->
                        <div class="col-md-8" id="paypal_cmpnt">
                            <div class="border-top py-2">
                                <small class="text-muted">For faster checkout, please sign-in into your <a href="https://www.paypal.com" target="_blank">PayPal account</a> first and then come back here.</small>
                            </div>
                        </div>
                        <!-- Mpesa checkout -->
                        <div class="col-md mb-2" id="m-pesa_cmpnt">
                            <div class="lead fs-6 row align-items-center">
                                <div class="col-md-7">
                                    <small>Enter your M-PESA number in the field below</small>
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border-dark rounded-0" id="m-pesa_number" placeholder="Mpesa number" autocomplete="off" maxlength="50">
                                        <label for="m-pesa_number"><small class="m-1 text-muted"><sup>Use the format: 254712345678 / 0712345678 / 0111123456</sup></small></label>
                                        <small id="mpesa_number_err" class="text-danger fw-bold m-1"></small><br>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-1">
                                    <button type="submit" class="btn btn-dark m-1" id="init_mpesa_btn">Pay</button>
                                </div>
                                <div class="col-md-2">
                                    <div id="finalAmount" class="text-center">
                                        <!-- Display the converted amount -->
                                        <div id="finalAmount" class="d-flex btn btn-light">
                                            <span>Amount: KSH&nbsp;<span class="finalMpesaValue fw-bold"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <span><?php echo $spinner; ?></span>
                            </div>
                            <div class="accordion my-2" id="m-pesaGuideAccordion">
                                <div class="accordion-item border-0">
                                    <h4 class="accordion-header mb-2 col-md-6" id="m-pesaGuide">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            M-PESA payment guide
                                        </button>
                                    </h4>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="m-pesaGuide" data-bs-parent="#m-pesaGuideAccordion">
                                        <div class="accordion-body">
                                            <ol class="my-2">
                                                <li class="py-2">
                                                    <p class="mb-0">Enter your <b>Mpesa registered</b> phone number above.</p>
                                                </li>
                                                <li class="py-2">
                                                    <p class="mb-0">Click on the <b>Pay</b> button in order to initiate the M-PESA payment.</p>
                                                </li>
                                                <li class="py-2">
                                                    <p class="mb-0">Check your mobile phone for a prompt asking to enter M-PESA pin.</p>
                                                </li>
                                                <li class="py-2">
                                                    <p class="mb-0">Enter your <b>M-PESA PIN</b> The amount specified on the
                                                        notification will be deducted from your M-PESA account when you press send.</p>
                                                </li>
                                                <li class="py-2">
                                                    <p class="mb-0">After receiving the M-PESA payment confirmation message please click on the <b>Complete Payment</b> button below to complete the order and confirm the payment made.</p>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="col-md">
                            <p class="lead shadow-sm p-5">You're now all set to make the most of ParrotAI. Create, inspire, share with friends and most importantly, have fun!
                            </p>
                        </div>
                        <a class="btn btn-primary" href="<?php echo $base_url; ?>/dashboard">Lets go!</a>
                    </div>
                    <div class="border-top my-4 pt-2" style="overflow:auto;">
                        <div class="m-2" style="float:left;">
                            <button type="button" data-bs-dismiss="modal" id="pay-later" class="btn btn-sm btn-warning text-dark">Pay later</button>
                        </div>
                        <div class="m-2" id="nav-buttons" style="float:right;">
                            <button type="button" class="btn btn-outline-primary" id="prevBtn" onclick="nextPrev(-1)"><i class="bi bi-chevron-left fw-bold"></i> Previous</button>
                            <button type="button" class="btn btn-primary text-white" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                    <!-- Circles which indicate the steps -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End subscribe modal -->

<script type="text/javascript">
    /**
     * Control what/how to display
     */

    var btns = document.querySelectorAll(".sub-btn");
    Array.prototype.slice.call(btns)
        .forEach(function(button) {
            var btn_id = button.id;
            var btn_code = btn_id.substr(btn_id.length - 1, btn_id.length);
            var code = +btn_code;
            if (active_sub == code) {
                button.disabled = true;
                button.innerHTML = "Active plan";
            }
        });

    /**
     * Common variables
     */
    const btn = Id("nextBtn");

    var selectedPlan, monthlyPrice, yearlyPrice, offer;

    var planIds = {
        deluxe_monthly: "P-0UM585238E324170VMJDPEYQ",
        deluxe_yearly: "P-95T66635HR378740DMJDPKDA",
        parakeet_monthly: "P-56386469G8147363UMJDPIOQ",
        parakeet_yearly: "P-4W1495421M579311DMJDPMUQ"
    };

    var userSelection = {
        user: user
    };

    var paypal_cmpnt = Id("paypal_cmpnt");
    var mpesa_cmpnt = Id("m-pesa_cmpnt");

    /**
     * Multistep form
     */
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            Id("prevBtn").style.display = "none";
        } else {
            Id("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            Id("nextBtn").innerHTML = "Lets go!";
            Id("nextBtn").onclick = "location.href=base_url + '/dashboard'";
        } else if (n == (x.length - 2)) {
            if (Id("m-pesa").checked == true) {
                Id("m-pesa_number").focus();
            }
            Id("nextBtn").innerHTML = "Complete Payment";
        } else {
            Id("nextBtn").innerHTML = "Next" + ' <i class="bi bi-chevron-right fw-bold"></i>';
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
        // if (btn.disabled == false) {
        //     btn.disabled = true;
        // }
        btn.disabled = true;
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            Id("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }

    function subscribeToPlan(plan, monthly, yearly, discount) {
        if (signinStatus !== 1) {
            handleStartBtn();
        } else {
            $('#subsciptionModal').modal('show');
            // showTab(currentTab);
            var planNames = document.querySelectorAll(".plan-name");
            Array.prototype.slice.call(planNames)
                .forEach(function(element) {
                    element.innerText = " " + plan + " ";
                });

            monthlyPrice = monthly;
            yearlyPrice = yearly;
            offer = discount;
        }
        selectedPlan = plan;


        var pinputs = document.querySelectorAll(".period");
        Array.prototype.slice.call(pinputs)
            .forEach(function(input) {
                if (input.checked) {
                    btn.disabled = false;

                    Id("offer").innerText = offer + "%";

                    var duration = input.value;

                    // if (Id("yearly").checked == true) {
                    var planPeriods = document.querySelectorAll(".plan-period");
                    Array.prototype.slice.call(planPeriods)
                        .forEach(function(element) {
                            element.innerText = duration;
                        });

                    // create variable names dynamically
                    var planPrice = window[duration + 'Price'];

                    var planprice = window[duration + 'price'];

                    var planPrices = document.querySelectorAll(".plan-price");
                    Array.prototype.slice.call(planPrices)
                        .forEach(function(element) {
                            element.innerText = " $" + planPrice;
                        });

                    var planprice = +planPrice;

                    var offerAmount = 0.01 * offer * planprice;
                    Id("offerAmount").innerText = " -$" + Math.round(offerAmount);
                    var total = planprice - offerAmount;
                    Id("total").innerText = " $" + Math.floor(total);


                    userSelection.price = Math.floor(total);
                    userSelection.period = duration;
                    userSelection.plan = selectedPlan;
                    userSelection.description = selectedPlan + " " + userSelection.period + " subscription";
                    // get plan id
                    userSelection.plan_id = planIds[selectedPlan.toLowerCase() + '_' + duration];
                }
            });
    }

    /**
     * validate subscription form
     */

    // period
    var pinputs = document.querySelectorAll(".period");
    Array.prototype.slice.call(pinputs)
        .forEach(function(input) {
            // if (input.checked) {
            input.onclick = () => {
                btn.disabled = false;

                Id("offer").innerText = offer + "%";

                var duration = input.value;

                var planPeriods = document.querySelectorAll(".plan-period");
                Array.prototype.slice.call(planPeriods)
                    .forEach(function(element) {
                        element.innerText = duration;
                    });

                // create variable names dynamically
                var planPrice = window[duration + 'Price'];

                var planprice = window[duration + 'price'];

                var planPrices = document.querySelectorAll(".plan-price");
                Array.prototype.slice.call(planPrices)
                    .forEach(function(element) {
                        element.innerText = " $" + planPrice;
                    });

                var planprice = +planPrice;

                var offerAmount = 0.01 * offer * planprice;
                Id("offerAmount").innerText = " -$" + Math.round(offerAmount);
                var total = planprice - offerAmount;
                Id("total").innerText = " $" + Math.floor(total);


                userSelection.price = Math.floor(total);
                userSelection.period = duration;
                userSelection.plan = selectedPlan;
                userSelection.description = selectedPlan + " " + userSelection.period + " subscription";
                // get plan id
                userSelection.plan_id = planIds[selectedPlan.toLowerCase() + '_' + duration];
            }
        });

    // method
    var minputs = document.querySelectorAll(".method");

    Array.prototype.slice.call(minputs)
        .forEach(function(input) {
            input.onclick = () => {
                if (Id("m-pesa").checked == true || Id("paypal").checked == true || Id("card").checked == true) {
                    btn.disabled = false;
                    /**
                     * If user selects PayPal or Card
                     */
                    if (Id("paypal").checked == true || Id("card").checked == true) {

                        userSelection.mode = input.value;

                        var div = document.createElement("div");
                        div.id = 'paypal-button-container-' + userSelection.plan_id;
                        paypal_cmpnt.appendChild(div);

                        if (paypal_cmpnt.style.display == "none") {
                            paypal_cmpnt.style.display = "block";
                        }

                        mpesa_cmpnt.style.display = "none";

                        //Helper function
                        function loadAsync(url, callback) {
                            var s = document.createElement('script');
                            s.setAttribute('src', url);
                            s.setAttribute('data-namespace', 'paypal_sdk')
                            s.setAttribute('data-sdk-integration-source', 'button-factory');
                            s.onload = callback;
                            document.head.insertBefore(s, document.head.firstElementChild);
                        }

                        // Usage -- callback is inlined here, but could be a named function

                        loadAsync('https://www.paypal.com/sdk/js?client-id=ATuV90R7q8x324-DDeuvdt9BCXBDxMCUR7V2zS5U_sK1NvhPEZ1Ik1oicO2LlrcDzlyAC8cXb0JS7x_i&vault=true&intent=subscription', function() {
                            paypal_sdk.Buttons({

                                // style buttons
                                style: {
                                    shape: 'rect',
                                    color: 'gold',
                                    layout: 'vertical',
                                    label: 'pay'
                                },

                                // Set up the transaction
                                createSubscription: function(data, actions) {
                                    return actions.subscription.create({
                                        /* Creates the subscription */
                                        plan_id: userSelection.plan_id
                                    });
                                },

                                // Finalize the transaction
                                onApprove: function(data, actions) {

                                    userSelection.payment_ref = data.subscriptionID;

                                    $.ajax({
                                        type: 'POST',
                                        url: '../subscriptions.php',
                                        data: JSON.stringify(userSelection),
                                        contentType: "application/json; charset=utf-8",
                                        success: (json) => {
                                            Id("nextBtn").disabled = false;
                                            var data = JSON.parse(json);
                                            if (data.status === "SUCCESS") {
                                                showToastMessage("Success! Enjoy ParrotAI", "success");
                                                nextPrev(1);
                                                setTimeout(function() {
                                                    location.href = "<?php echo $base_url; ?>/dashboard"
                                                }), 3600;
                                            } else if (data.status === "ITEM_EXISTS") {
                                                showToastMessage("Item is already saved", "primary");
                                            } else if (data.status === "") {
                                                showToastMessage("Dang! Something went wrong", "primary");
                                            } else if (data.status === "ERROR") {
                                                showToastMessage("Dang! Something went wrong", "primary");
                                            }
                                        },
                                        error: () => {
                                            showToastMessage("Oops! Connection lost");
                                        }
                                    });
                                },

                                onError: function(err) {
                                    showToastMessage("Oops! That didn't work. Please try again", "primary")
                                }
                            }).render('#paypal-button-container-' + userSelection.plan_id); // Renders the PayPal button
                        });
                    }
                    /**
                     * If user selects Mpesa
                     */
                    else if (Id("m-pesa").checked == true) {
                        if (mpesa_cmpnt.style.display == "none") {
                            mpesa_cmpnt.style.display = "block";
                        }

                        userSelection.mode = input.value;
                        userSelection.csrf_token = csrf_token;
                        userSelection.new_sub = true;

                        paypal_cmpnt.style.display = "none";

                        // convert amount to KES
                        const api = "https://api.exchangerate-api.com/v4/latest/USD";
                        const resultFrom = "USD";
                        const resultTo = "KES";

                        var searchValue = userSelection.price;
                        var fromCurrency = document.querySelector(".from");
                        var toCurrency = document.querySelector(".to");
                        var finalMpesaValue = document.querySelector(".finalMpesaValue");
                        // var convertedCurrCompnt = Id("convertedCurrCompnt");

                        fetch(`${api}`)
                            .then(currency => {
                                return currency.json();
                            }).then((displayResults));

                        // display results after convertion
                        function displayResults(currency) {
                            let fromRate = currency.rates[resultFrom];
                            let toRate = currency.rates[resultTo];
                            finalMpesaValue.innerHTML = Math.round(((toRate / fromRate) * searchValue));
                            // convertedCurrCompnt.style.display = "block";
                        }

                        /**
                         * Initiate M-PESA payment
                         */

                        Id("m-pesa_number").oninput = () => {
                            Id("mpesa_number_err").innerHTML = "";
                        }

                        Id("init_mpesa_btn").onclick = () => {
                            // validate phone number
                            var num_input = Id('m-pesa_number').value;
                            var number = num_input.trim();
                            var regexp = new RegExp(/^(?:254|\+254|0)?((?:(?:7(?:(?:[01249][0-9])|(?:5[789])|(?:6[89])))|(?:1(?:[1][0-5])))[0-9]{6})$/);
                            if (regexp.test(number)) {
                                $("#gen-spinner").show();
                                Id('init_mpesa_btn').disabled = true;

                                userSelection.msisdn = number;

                                // send request
                                $.ajax({
                                    type: 'POST',
                                    url: base_url + '/subscriptions/post.php',
                                    data: JSON.stringify(userSelection),
                                    contentType: "application/json; charset=utf-8",
                                    success: (data) => {
                                        $("#gen-spinner").hide();
                                        Id("nextBtn").disabled = false;
                                        Id("prevBtn").disabled = true;
                                        // Id("nav-buttons").style.display = "none";
                                        Id("pay-later").innerHTML = "The Parrot's all yours <i class='bi bi-emoji-smile'></i>";
                                        Id("paymentDetails").innerHTML = "<i class='bi bi-check-circle fw-bold fs-1 text-success'></i>                        <span class='fw-bold fs-2 fs-3 my-3 py-3 text-success'>Congratulations!</span>";
                                    },
                                    error: () => {
                                        $("#gen-spinner").hide();
                                        showToastMessage("Oops! Couldn't fetch items", "primary");
                                    }

                                });
                            } else {
                                Id("mpesa_number_err").innerHTML = 'Phone number is invalid';
                            }
                        }

                    }
                }
            }
        });
</script>


<?php

include "../footer.php";

?>