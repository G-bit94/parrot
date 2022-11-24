<?php

include "../header.php";

$plan_1 = ($mysqli->query("SELECT * FROM subscription_plans WHERE id = 1")->fetch_assoc());
$plan_2 = ($mysqli->query("SELECT * FROM subscription_plans WHERE id = 2")->fetch_assoc());

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
        height: 9px;
        width: 9px;
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
        <h1 class="display-5 fw-bold" id="title"><strong>Choose a plan</strong></h3>
            <p class="lead fs-4 text-secondary">And stop overpaying for your AI content.</p>
    </div>
</div>

<!-- Pricing table -->
<div class="row row-cols-1 row-cols-md-3 text-center container-fluid mt-3 mb-5 py-2">
    <div class="col">
        <div class="col-md-11 mb-4 rounded-3 shadow-sm">
            <p class="bd-callout text-start">
                <span class="fw-bold">We know using other AI tools costs you shedloads of money. <br><br>We're here to change that. Just select a plan and start using AI for your content needs affordably.</span>
            </p>
        </div>
    </div>

    <!-- Deluxe -->
    <div class="col">
        <div class="card col-md-11 mb-4 rounded-3 shadow-lg border-primary border-5 box">
            <div class="ribbon ribbon-top-right">
                <span>
                    <i class="bi bi-star-fill text-warning"></i>
                    Popular
                    <i class="bi bi-star-fill text-warning"></i>
                </span>
            </div>
            <div class="card-header bg-primary text-white py-3 border-primary">
                <h4 class="my-0 fw-bold" id="s_plan_1"><?php echo $plan_1['name']; ?></h4>
            </div>
            <div class="card-body">
                <strong class="card-title pricing-card-title d-flex justify-content-center">
                    <span>
                        <span class="d-flex justify-content-between">
                            <p class="text-decoration-line-through mx-1">$<?php echo $plan_1['monthly_marked_up']; ?>/mo or $<?php echo $plan_1['yearly_marked_up']; ?>/yr</p>
                            <p class="badge bg-warning text-dark rounded-pill fs-6">
                                Save
                                <?php
                                echo ceil(100 - $plan_1['monthly_price'] / $plan_1['monthly_marked_up'] * 100);
                                ?>%
                            </p>
                        </span>
                        <span class="fw-bolder fs-3">
                            <span class="dollar-curr">$<?php echo $plan_1['monthly_price']; ?></span><small class="text-muted fw-light">/mo</small> or
                            <span class="dollar-curr">$<?php echo $plan_1['yearly_price']; ?></span><small class="text-muted fw-light">/yr</small>
                        </span>
                        <small class="text-muted local-curr-cmpnt" style="display: none;">
                            <span class="local-curr" id="local-curr-<?php echo $plan_1['monthly_price']; ?>"></span><span class="text-muted fw-light">/mo</span> or
                            <span class="local-curr" id="local-curr-<?php echo $plan_1['yearly_price']; ?>"></span><span class="text-muted fw-light">/yr</span>
                        </small>
                    </span>
                </strong>

                <div class="list-group border-0 p-1">
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <p class="mb-0">Save <strong>unlimited</strong> templates</p>
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
                <button id="sub_s_plan_1" onclick="subscribeToPlan(Id('s_plan_1').innerText, 
                <?php
                echo $plan_1['monthly_marked_up'] .
                    ',' . $plan_1['yearly_marked_up'] . ','
                    . (100 - $plan_1['monthly_price'] / $plan_1['monthly_marked_up'] * 100);
                ?>)" class="w-100 btn btn-lg btn-primary sub-btn fw-bold">
                    <span>Get started</span>
                </button>
            </div>
        </div>
    </div>
    <!-- End Deluxe -->

    <!-- Parakeet -->
    <div class="col">
        <div class="card col-md-11 mb-4 border-dark rounded-3 shadow">
            <div class="card-header border-dark border-5 bg-white py-3">
                <h4 class="my-0 fw-bold" id="s_plan_2"><?php echo $plan_2['name']; ?></h4>
            </div>
            <div class="card-body">
                <strong class="card-title pricing-card-title d-flex justify-content-center">
                    <span>
                        <span class="d-flex justify-content-between">
                            <p class="text-decoration-line-through mx-1">$<?php echo $plan_2['monthly_marked_up']; ?>/mo or $<?php echo $plan_2['yearly_marked_up']; ?>/yr</p>
                            <p class="badge bg-warning text-dark rounded-pill fs-6">
                                Save
                                <?php
                                echo ceil(100 - $plan_2['monthly_price'] / $plan_2['monthly_marked_up'] * 100);
                                ?>%
                            </p>
                        </span>
                        <span class="fw-bolder fs-3">
                            <span class="dollar-curr">$<?php echo $plan_2['monthly_price']; ?></span><small class="text-muted fw-light">/mo</small> or
                            <span class="dollar-curr">$<?php echo $plan_2['yearly_price']; ?></span><small class="text-muted fw-light">/yr</small>
                        </span>
                        <small class="text-muted local-curr-cmpnt" style="display: none;">
                            <span class="local-curr" id="local-curr-<?php echo $plan_2['monthly_price']; ?>"></span><span class="text-muted fw-light">/mo</span> or
                            <span class="local-curr" id="local-curr-<?php echo $plan_2['yearly_price']; ?>"></span><span class="text-muted fw-light">/yr</span>
                        </small>
                    </span>
                </strong>

                <div class="list-group border-0 p-1">
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <p class="mb-0">Save <strong>unlimited</strong> templates</p>
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
                                <p class="mb-0">Publish directly to <strong>WordPress</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <div>
                                <p class="mb-0"><strong>Audio playback</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item border-0 d-flex gap-3 py-3">
                        <i class="bi bi-star-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-start">
                            <div>
                                <p class="mb-0"><strong>No filters</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="sub_s_plan_2" onclick="subscribeToPlan(Id('s_plan_2').innerText, 
                <?php
                echo $plan_2['monthly_marked_up'] .
                    ',' . $plan_2['yearly_marked_up'] . ','
                    . (100 - $plan_2['monthly_price'] / $plan_2['monthly_marked_up'] * 100);
                ?>)" class="w-100 btn btn-lg btn-primary sub-btn fw-bold">
                    <span>Get started</span>
                </button>
            </div>
        </div>
    </div>
    <!-- End express -->
</div>
<!-- End pricing table -->

<!-- Contactus -->
<?php include '../contact/index.php'; ?>
<!-- End contactus -->

<!-- Subscribe modal -->
<div class="modal modal-signin fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" id="subsciptionModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5">
            <div class="row">
                <div class="col-md-4 bg-primary bg-gradient p-2" style="border-radius: 0.8rem 0rem 0rem 0.8rem;">
                    <h4 class="modal-title fw-bold mx-2 mt-2 text-light"><strong>Checkout</strong></h4>
                    <div class="mt-5 pt-3 mx-2 pb-2" id="paymentDetails">
                        <ul class="mt-4 list-group mb-3 border-0">
                            <li class="list-group-item d-flex justify-content-between lh-sm py-4">
                                <div class="mt-1">
                                    <h5 class="my-0">
                                        <p>
                                            <i class="bi bi-cart3 fw-bold"></i>
                                            <span class="plan-name fw-bold"></span> plan added to cart
                                        </p>
                                    </h5>
                                    <small class="plan-period text-capitalize text-muted"></small>
                                </div>
                                <span class="plan-price mt-2 fw-bold"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between py-3">
                                <div class="text-dark">
                                    <h6 class="my-0">Offer</h6>
                                    <small>You've saved <span class="badge fs-6 bg-warning text-dark rounded-pill">$<span id="offer"></span></span></small>
                                </div>
                                <span class="text-dark fw-bold" id="offerAmount"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between py-4">
                                <span class="fw-bold">Total (USD)</span>
                                <strong id="total" class="fw-bold fs-5"></strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 pt-4 my-5 rounded-end">
                    <!-- Multistep checkout -->
                    <div class="row pt-5 my-2 ms-1 me-3">
                        <!-- Payment period -->
                        <div class="tab">
                            <div class="mb-0 fs-6 fw-bold mt-2">Select your preferred payment period below</div>
                            <div class="my-4 border rounded-3 p-2">
                                <div class="form-check my-2">
                                    <input id="yearly" name="period" type="radio" class="form-check-input period" value="yearly">
                                    <label class="form-check-label" for="yearly">Select yearly plan</label>
                                </div>
                                <div class="form-check my-2">
                                    <input id="monthly" name="period" type="radio" class="form-check-input period" value="monthly">
                                    <label class="form-check-label" for="monthly">Select monthly plan</label>
                                </div>
                            </div>
                        </div>
                        <!-- Payment methods -->
                        <div class="tab">
                            <div class="mb-0 fs-6 fw-bold mt-2">Select the most convenient payment method for you below</div>
                            <div class="my-4 border rounded-3 p-2">
                                <div class="form-check my-2">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input method" value="PayPal">
                                    <label class="form-check-label" for="paypal" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="Click here and then click on the <strong>Pay with PayPal</strong> button in the next step to pay with PayPal">PayPal</label>
                                </div>
                                <div class="form-check my-2">
                                    <input id="card" name="paymentMethod" type="radio" class="form-check-input method" value="Card">
                                    <label class="form-check-label" for="card" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="bottom" data-bs-html="true" data-bs-content="Click here and then click on the <strong>Debit or Credit Card</strong> button in the next step to pay using your card">Card</label>
                                </div>
                            </div>
                        </div>
                        <!-- Payment methods -->
                        <div class="tab">
                            <!-- Paypal checkout -->
                            <div class="col-md-8" id="paypal_cmpnt">
                                <div class="border-top py-2">
                                    <small class="text-muted">For faster checkout, please sign-in into your <a href="https://www.paypal.com/signin" target="_blank">PayPal account</a> first and then come back here.</small>
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
                        <div class="mt-4 pt-2" style="overflow:auto;">
                            <div class="mt-4 pt-3 border-top">
                                <div class="m-2" style="float:left;">
                                    <button type="button" data-bs-dismiss="modal" id="pay-later" class="btn btn-sm btn-warning text-dark">Pay later</button>
                                </div>
                                <div class="m-2" id="nav-buttons" style="float:right;">
                                    <button type="button" class="btn btn-outline-primary" id="prevBtn" onclick="nextPrev(-1)"><i class="bi bi-chevron-left fw-bold"></i> Back</button>
                                    <button type="button" class="btn btn-primary text-white" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>
                        </div>
                        <!-- Circles which indicate the steps -->
                        <div style="text-align:center; margin-top:50px;">
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
</div>
<!-- End subscribe modal -->

<script type="text/javascript">
    /**
     *********************************
     */

    //  Disable active plan's button
    var btns = document.querySelectorAll(".sub-btn");
    var geoData = {};
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

    // Show price in local currency
    // first get local currency information
    // convert $$ to local currency   

    fetch(geoLocAPI)
        .then(function(response) {
            return response.json();
        })
        .then(function(geodata) {
            currencyCode = geodata.currency.code;
            geoData.currencySymbol = geodata.currency.symbol
            return currencyCode;
        }).then(function(currencyCode) {
            const resultTo = currencyCode;
            var dollarCurrs = document.querySelectorAll(".dollar-curr");

            Array.prototype.slice.call(dollarCurrs)
                .forEach(function(dollarCurr) {
                    var str = dollarCurr.innerText;
                    var amt = str.substr(1, str.lenth);
                    var amount = +amt;

                    var searchValue = amount;
                    var finalLocalValue = Id("local-curr-" + amt);
                    // var convertedCurrCompnt = Id("convertedCurrCompnt");

                    fetch(`${currXChangeAPI}`)
                        .then(currency => {
                            return currency.json();
                        }).then((displayResults));

                    // display results after convertion
                    function displayResults(currency) {
                        let fromRate = currency.rates[currResultFrom];
                        let toRate = currency.rates[resultTo];
                        finalLocalValue.innerHTML = geoData.currencySymbol + Math.round(((toRate / fromRate) * searchValue)).toLocaleString();
                        // convertedCurrCompnt.style.display = "block";

                        var cmpnts = document.querySelectorAll(".local-curr-cmpnt");
                        Array.prototype.slice.call(cmpnts)
                            .forEach(function(cmpnt) {
                                cmpnt.style.display = "block";
                            });
                    }
                });
        });

    /**
     * Common variables
     */
    const btn = Id("nextBtn");

    var selectedPlan, monthlyPrice, yearlyPrice, offer;

    var planIds = {
        deluxe_monthly: "P-0UM585238E324170VMJDPEYQ",
        deluxe_yearly: "P-95T66635HR378740DMJDPKDA",
        express_monthly: "P-56386469G8147363UMJDPIOQ",
        express_yearly: "P-4W1495421M579311DMJDPMUQ"
    };

    var userSelection = {
        user: user
    };

    var paypal_cmpnt = Id("paypal_cmpnt");

    /**
     * Multistep form
     */
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Back/Next buttons:
        if (n == 0) {
            Id("prevBtn").style.display = "none";
        } else {
            Id("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            Id("nextBtn").innerHTML = "Lets go!";
            Id("nextBtn").onclick = "location.href=base_url + '/dashboard'";
        } else if (n == (x.length - 2)) {
            Id("nextBtn").innerHTML = "Complete payment";
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

            // select yearly plan initially by simulating click

            var p = document.querySelector('input[name="period"]:checked');
            if (p == null) { //none selected
                document.getElementsByClassName("period")[0].click();
            }
        }
        selectedPlan = plan;
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

                Id("offer").innerText = Math.round(offer) + "%";

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
                userSelection.total = Math.floor(total);
                userSelection.period = duration;
                userSelection.plan = selectedPlan;
                userSelection.description = selectedPlan + " " + userSelection.period + " subscription";
                // get plan id
                userSelection.plan_id = planIds[selectedPlan.toLowerCase() + '_' + duration];
                userSelection.new_sub = true;
                userSelection.csrf_token = csrf_token;
            }
        });

    // method
    var minputs = document.querySelectorAll(".method");

    Array.prototype.slice.call(minputs)
        .forEach(function(input) {
            input.onclick = () => {


                if (Id("paypal").checked == true || Id("card").checked == true) {
                    // if (Id("paypal").checked == true || Id("card").checked == true) {
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
                                        url: base_url + '/subscriptions/post.php',
                                        data: JSON.stringify(userSelection),
                                        contentType: "application/json; charset=utf-8",
                                        success: (json) => {
                                            Id("nextBtn").disabled = false;
                                            var data = JSON.parse(json);
                                            if (data.status === "SUCCESS") {
                                                showToastMessage("Success! Enjoy ParrotAI", "success");
                                                nextPrev(1);
                                                // setTimeout(function() {
                                                //     location.href = "<?php echo $base_url; ?>/dashboard"
                                                // }), 3600;
                                            } else {
                                                showToastMessage("Thanks! Verifying transaction...", "primary");
                                                setTimeout(function() {
                                                    $("#gen-spinner").hide();
                                                    Id("nextBtn").disabled = false;
                                                    Id("prevBtn").disabled = true;
                                                    // Id("nav-buttons").style.display = "none";
                                                    Id("pay-later").innerHTML = "The Parrot's all yours <i class='bi bi-emoji-smile'></i>";
                                                    Id("paymentDetails").innerHTML = "<i class='bi bi-check-circle fw-bold fs-1 text-success'></i>                        <span class='fw-bold fs-2 fs-3 my-3 py-3 text-success'>Congratulations!</span>";
                                                }), 10000;
                                            }
                                        },
                                        error: () => {
                                            showToastMessage("Almost there! Finalizing...", "primary");
                                            setTimeout(function() {
                                                $("#gen-spinner").hide();
                                                Id("nextBtn").disabled = false;
                                                Id("prevBtn").disabled = true;
                                                // Id("nav-buttons").style.display = "none";
                                                Id("pay-later").innerHTML = "The Parrot's all yours <i class='bi bi-emoji-smile'></i>";
                                                Id("paymentDetails").innerHTML = "<i class='bi bi-check-circle fw-bold fs-1 text-success'></i>                        <span class='fw-bold fs-2 fs-3 my-3 py-3 text-success'>Congratulations!</span>";
                                            }), 10000;
                                        }
                                    });
                                },

                                onError: function(err) {
                                    showToastMessage("Oops! That didn't work. Please try again", "primary")
                                }
                            }).render('#paypal-button-container-' + userSelection.plan_id); // Renders the PayPal button
                        });

                    }
                }
            }
        });
    /**
     ************************
     */
</script>


<?php

include "../footer.php";

?>