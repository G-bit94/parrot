<?php

include "config.php";

error_reporting(0);

include "session.php";

//Get current URL and parameters for correct pagination
$protocol = $_SERVER['SERVER_PROTOCOL'];
$domain     = $_SERVER['HTTP_HOST'];
$script   = $_SERVER['SCRIPT_NAME'];
$parameters   = $_SERVER['QUERY_STRING'];
$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https')
    === FALSE ? 'http' : 'https';
$currenturl = $protocol . '://' . $domain . $script . '?' . $parameters;
$new_url = preg_replace('/&?pageno=[^&]*/', '', $currenturl);

$base_url = '/parrot';

$today = date("Y-m-d");

$sql_offset = $result = "";

$signinStatus = 0;

include 'roles.php';

$access = new AccessLevel();

if ($user_id !== "" && $user_id !== null) {
    $signinStatus = 1;
}

$spinner = '<div class="spinner">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
            <div class="bar5"></div>
            <div class="bar6"></div>
            <div class="bar7"></div>
            <div class="bar8"></div>
            <div class="bar9"></div>
            <div class="bar10"></div>
            <div class="bar11"></div>
            <div class="bar12"></div>
            </div>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- WordPress -->
    <?php
    if (function_exists('wp_head')) {
        wp_head();
    }
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ParrotAI</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">

    <!-- Custom styles -->
    <link href="<?php echo $base_url; ?>/assets/css/custom-styles.css" rel="stylesheet" type="text/css">

    <!-- Icons -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" href="/parrot/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/parrot/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/parrot/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/parrot/assets/img/favicons/manifest.json">
    <link rel="icon" href="/parrot/assets/img/favicons/favicon.ico"> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">

    <!-- Intro.js -->
    <link rel="stytlesheet" src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/introjs.css">

    <style type="text/css">
        @font-face {
            font-family: "Futura";
            src: url(/parrot/assets/fonts/futura/futura_book_font.ttf);
        }

        body {
            font-family: 'Mulish', sans-serif;
            color: #000;
        }

        .bg-primary {
            background-color: #7434fc !important;
        }

        .bg-custom-primary {
            background-color: #183454;
        }

        .bg-custom-dark {
            background-color: #180c3c;
        }

        textarea {
            resize: none;
        }

        .rounded-5 {
            border-radius: 0.8rem;
        }

        /* contact us section */
        #contactus {
            position: relative;
            padding: 15rem 0;
            background-image: url("<?php echo $base_url; ?>/assets/img/support.webp");
            background-position: center;
            background-size: cover;
        }

        /* mobile */
        @media (max-width: 768px) {

            /* Contact us page */
            #contactus {
                background-position: left top;
                background-size: 230%;
                background-repeat: no-repeat;
            }

            /* Reset password page */
            #secure-header-text {
                display: none;
            }

            .centred-bg-image {
                padding: 60px;
            }
        }

        /* Reset password page */
        .centred-bg-image {
            background-image: url('../assets/img/Privacy policy-rafiki.svg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 80%;
            border-radius: 20px;
            padding: 10px;
        }

        .bg-custom {
            background-color: #130f40;
            border-radius: 4px;
        }

        .button-fixed {
            bottom: 0;
            position: absolute;
            left: 0;
            border-radius: 4px;
        }

        div.spinner {
            position: relative;
            width: 45px;
            height: 45px;
            display: inline-block;
            /* margin-left: 50%;
            margin-right: 50%; */
            background: #fff;
        }

        div.spinner div {
            width: 5%;
            height: 15%;
            background: #000;
            position: absolute;
            left: 50%;
            top: 50%;
            opacity: 0;
            -webkit-border-radius: 15px;
            -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            -webkit-animation: fade 1s linear infinite;
        }

        @-webkit-keyframes fade {
            from {
                opacity: 1;
            }

            to {
                opacity: 0.05;
            }
        }

        div.spinner div.bar1 {
            -webkit-transform: rotate(0deg) translate(0, -130%);
            -webkit-animation-delay: 0s;
        }

        div.spinner div.bar2 {
            -webkit-transform: rotate(30deg) translate(0, -130%);
            -webkit-animation-delay: -0.9167s;
        }

        div.spinner div.bar3 {
            -webkit-transform: rotate(60deg) translate(0, -130%);
            -webkit-animation-delay: -0.833s;
        }

        div.spinner div.bar4 {
            -webkit-transform: rotate(90deg) translate(0, -130%);
            -webkit-animation-delay: -0.7497s;
        }

        div.spinner div.bar5 {
            -webkit-transform: rotate(120deg) translate(0, -130%);
            -webkit-animation-delay: -0.667s;
        }

        div.spinner div.bar6 {
            -webkit-transform: rotate(150deg) translate(0, -130%);
            -webkit-animation-delay: -0.5837s;
        }

        div.spinner div.bar7 {
            -webkit-transform: rotate(180deg) translate(0, -130%);
            -webkit-animation-delay: -0.5s;
        }

        div.spinner div.bar8 {
            -webkit-transform: rotate(210deg) translate(0, -130%);
            -webkit-animation-delay: -0.4167s;
        }

        div.spinner div.bar9 {
            -webkit-transform: rotate(240deg) translate(0, -130%);
            -webkit-animation-delay: -0.333s;
        }

        div.spinner div.bar10 {
            -webkit-transform: rotate(270deg) translate(0, -130%);
            -webkit-animation-delay: -0.2497s;
        }

        div.spinner div.bar11 {
            -webkit-transform: rotate(300deg) translate(0, -130%);
            -webkit-animation-delay: -0.167s;
        }

        div.spinner div.bar12 {
            -webkit-transform: rotate(330deg) translate(0, -130%);
            -webkit-animation-delay: -0.0833s;
        }
    </style>

    <!-- Main JS Files -->
    <script src="<?php echo $base_url; ?>/assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <!-- Global Scripts -->
    <script type="text/javascript">
        // Common functions and variables
        Id = (id) => {
            return document.getElementById(id);
        }

        // Base URL
        const base_url = <?php echo json_encode($base_url); ?>;

        // CSRF token
        const csrf_token = <?php echo json_encode($_SESSION['csrf_token']); ?>;

        // user
        const user = <?php
                        if ($user_id !== "" && $user_id !== null) {
                            echo json_encode(openssl_encrypt($user_id, "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId"));
                        } else {
                            echo "null";
                        }
                        ?>
        // sign in status
        var sts = <?php echo json_encode($signinStatus); ?>;
        var signinStatus = +sts;

        // verification status
        const vfyd = <?php echo json_encode($v_status); ?>;
        const v_status = +vfyd;

        //active subscription
        const active_sub = <?php echo json_encode($active_sub); ?>;

        // geolocation
        const geoLocAPI = "https://api.ipregistry.co/?key=glm9znqelitu1301";
        // Serialize navigator object
        const navigator_obj = window.navigator;

        const _navigator = {};
        for (var i in navigator_obj) {
            _navigator[i] = navigator_obj[i];
        }

        // const geoLocAPI = base_url + "/apis/geolocation/?nav_obj=" + encodeURIComponent(JSON.stringify(_navigator));

        // show prices in local currency
        const currXChangeAPI = "https://api.exchangerate-api.com/v4/latest/USD";
        const currResultFrom = "USD";

        // cookie functions
        function setCookie(cname, cvalue, exdays) {
            if (cname == "cookie_consent") {
                if (cvalue === "true") {
                    $('#cookie-consent').fadeOut(500);
                }
            }
            const d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/;SameSite=None;Secure";
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

        // current page/dir        
        var lokshen = window.location.pathname;
        var pathera = lokshen.substring(0, lokshen.lastIndexOf('/'));
        var director = pathera.substring(pathera.lastIndexOf('/'), pathera.length);
        var current_page = director.replace('/', '');

        // url params

        function getAllUrlParamsFun(url) {
            // get query string from url (optional) or window
            var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
            // we'll store the parameters here
            var obj = {};
            // if query string exists
            if (queryString) {
                // stuff after # is not part of query string, so get rid of it
                queryString = queryString.split('#')[0];
                // split our query string into its component parts
                var arr = queryString.split('&');
                for (var i = 0; i < arr.length; i++) {
                    // separate the keys and the values
                    var a = arr[i].split('=');
                    // set parameter name and value (use 'true' if empty)
                    var paramName = a[0];
                    var paramValue = typeof(a[1]) === 'undefined' ? true : a[1];
                    // (optional) keep case consistent
                    paramName = paramName.toLowerCase();
                    if (typeof paramValue === 'string') paramValue = paramValue.toLowerCase();
                    // if the paramName ends with square brackets, e.g. colors[] or colors[2]
                    if (paramName.match(/\[(\d+)?\]$/)) {
                        // create key if it doesn't exist
                        var key = paramName.replace(/\[(\d+)?\]/, '');
                        if (!obj[key]) obj[key] = [];
                        // if it's an indexed array e.g. colors[2]
                        if (paramName.match(/\[\d+\]$/)) {
                            // get the index value and add the entry at the appropriate position
                            var index = /\[(\d+)\]/.exec(paramName)[1];
                            obj[key][index] = paramValue;
                        } else {
                            // otherwise add the value to the end of the array
                            obj[key].push(paramValue);
                        }
                    } else {
                        // we're dealing with a string
                        if (!obj[paramName]) {
                            // if it doesn't exist, create property
                            obj[paramName] = paramValue;
                        } else if (obj[paramName] && typeof obj[paramName] === 'string') {
                            // if property does exist and it's a string, convert it to an array
                            obj[paramName] = [obj[paramName]];
                            obj[paramName].push(paramValue);
                        } else {
                            // otherwise add the property
                            obj[paramName].push(paramValue);
                        }
                    }
                }
            }
            return obj;
        }

        /* get data object */
        var getAllUrlParams = getAllUrlParamsFun();
        /* Check if the url with utm_parameters */
        let isEmpty = (Object.keys(getAllUrlParams).length === 0)
        if (!isEmpty) {
            /* utm data */
            let utm_source_value = getAllUrlParams.utm_source;
            let utm_medium_value = getAllUrlParams.utm_medium;
            let utm_campaign_value = getAllUrlParams.utm_campaign;
            /* webflow form object (You should add embed code under webflow designer */
            var utm_source_form_elem = document.getElementById("utm_source");
            var utm_medium_form_elem = document.getElementById("utm_medium")
            var utm_campaign_form_elem = document.getElementById("utm_campaign");
            /* Check if elem exsist to avoid console errors  */
            if (utm_source_form_elem) {
                utm_source_form_elem.value = utm_source_value;
            }
            if (utm_medium_form_elem) {
                utm_medium_form_elem.value = utm_medium_value;
            }
            if (utm_campaign_form_elem) {
                utm_campaign_form_elem.value = utm_campaign_value;
            }
        }
    </script>
</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav id="navbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-primary shadow">
            <div class="container-fluid">
                <a class="navbar-brand plain-link fw-bold mx-4 rounded-3 fs-6 d-flex justify-content-between" href="<?php echo $base_url; ?>">
                    <span class="bg-white rounded-start p-1 d-flex justify-content-end">
                        <img src="<?php echo $base_url; ?>/assets/img/logo-transparent.png" alt="" width="26" height="27" class="rounded-circle" />
                    </span>
                    <span class="bg-custom-primary rounded-end text-white px-2 pt-1">ParrotAI</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <?php if ($signinStatus == 1) { ?>
                        <a href="<?php echo $base_url; ?>/dashboard" onclick="handleStartBtn()" class="nav-link fw-bold m-1 text-white empty-link">
                            Dashboard
                        </a>
                    <?php } ?>

                    <a href="<?php echo $base_url; ?>/dashboard" class="btn bg-custom-primary text-light px-3 mx-2 mb-1 mb-lg-0 empty-link" onclick="handleStartBtn()" id="start_btn" style="display: none;">
                        <span class="d-flex align-items-center">
                            <strong class="fw-bold"><i class="bi bi-stars text-warning"></i>Get started</strong>
                        </span>
                    </a>

                    <a class="nav-link fw-bold text-white" href="<?php echo $base_url; ?>/pricing" id="pricing_btn" style="display: none;">Pricing</a>
                    <?php if ($v_status == 1 && $active_sub != 2) { ?>
                        <a class="nav-link fw-bold text-white" href="<?php echo $base_url; ?>/pricing" id="upgrade_btn" style="display: none;">Upgrade</a>
                    <?php } ?>

                    <!-- <a class="btn btn-primary rounded-pill px-3 mx-2 mb-1 mb-lg-0" href="<?php echo $base_url; ?>/#demo" id="demo_btn" style="display: none;">
                        <span class="d-flex align-items-center">
                            <span class="small">Demo</span>
                        </span>
                    </a> -->

                    <a class="nav-link fw-bold text-white" href="<?php echo $base_url; ?>/blog">Blog</a>

                    <div class="dropdown" id="profile_cmpnt" style="display: none;">
                        <button class="btn btn-primary btn-sm rounded-pill mx-3 mt-1 dropdown-toggle fw-bold" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            <?php echo $row_user["username"]; ?>
                        </button>
                        <ul class="dropdown-menu pt-0 mx-0 rounded-3 shadow overflow-hidden" aria-labelledby="dropdownMenuButton2">
                            <li>
                                <a href="<?php echo $base_url; ?>/account" class="btn btn-sm m-1 fw-bold">
                                    <i class="bi bi-person-circle"></i> Account
                                </a>
                                <a href="<?php echo $base_url; ?>/signout/" class="btn btn-sm m-1 fw-bold">
                                    <i class="bi bi-box-arrow-right"></i> Signout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main class="flex-shrink-0">