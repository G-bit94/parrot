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

$spinner = '<div class="spinner gap-2" id="gen-spinner" style="display: none;">
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ParrotAI</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="<?php echo $base_url; ?>/assets/css/custom-styles.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" href="/parrot/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/parrot/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/parrot/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/parrot/assets/img/favicons/manifest.json">
    <link rel="icon" href="/parrot/assets/img/favicons/favicon.ico"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">

    <style type="text/css">
        @font-face {
            font-family: "Futura";
            src: url(/parrot/assets/fonts/futura/futura_book_font.ttf);
        }

        body {
            font-family: 'Mulish', sans-serif;
        }

        .bg-primary {
            background-color: #180c3c !important;
        }

        textarea {
            resize: none;
        }

        /* writers block section */
        #block {
            position: relative;
            padding: 15rem 0;
            background-image: linear-gradient(rgba(9.4, 20.4, 32.9, 0.6) 20%, rgba(0, 0, 0, 0.6) 86%), url("<?php echo $base_url; ?>/assets/img/woman-stressed.jpg");
            background-position: center;
            background-size: cover;
            color: white;
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
            #contactus {
                background-position: left top;
                background-size: 230%;
                background-repeat: no-repeat;
            }
        }

        /* cookie consent */
        .bg-custom {
            background-color: #130f40;
            border-radius: 4px;
        }

        .button-fixed {
            bottom: 0;
            position: fixed;
            left: 0;
            border-radius: 4px;
        }

        div.spinner {
            position: relative;
            width: 54px;
            height: 54px;
            display: inline-block;
            /* margin-left: 50%;
        margin-right: 50%; */
            background: #fff;
            padding: 10px;
            border-radius: 10px;
        }

        div.spinner div {
            width: 6%;
            height: 16%;
            background: #000;
            position: absolute;
            left: 45%;
            top: 38%;
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
    <script src="<?php echo $base_url; ?>/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        // Common functions and variables
        Id = (id) => {
            return document.getElementById(id);
        }

        // Base URL
        const base_url = <?php echo json_encode($base_url); ?>;

        // CSRF token
        var csrf_token = <?php echo json_encode($_SESSION['csrf_token']); ?>;

        // user
        var user = <?php
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
        var vfyd = <?php echo json_encode($v_status); ?>;
        var v_status = +vfyd;

        //active subscription
        var active_sub = <?php echo json_encode($active_sub); ?>;

        // user agent
        navigator.sayswho = (function() {
            var ua = navigator.userAgent,
                tem,
                M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
            if (/trident/i.test(M[1])) {
                tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
                return 'IE ' + (tem[1] || '');
            }
            if (M[1] === 'Chrome') {
                tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
                if (tem != null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
            }
            M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
            if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1, tem[1]);
            return M.join(' ');
        })();

        const user_agent = navigator.sayswho;

        // device type
        let device = "";
        if (window.innerWidth < 768) {
            device = "mobile";
        } else {
            device = "desktop";
        }
    </script>
</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white border-bottom shadow-sm">
            <div class="container-fluid py-">
                <a class="navbar-brand plain-link text-dark fw-bold" href="<?php echo $base_url; ?>">
                    <img src="<?php echo $base_url; ?>/assets/img/logo.png" alt="" width="35" height="35" class="rounded-circle" />
                    ParrotAI
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                        </li>
                    </ul>
                    <a class="nav-link fw-bold" href="<?php echo $base_url; ?>/pricing" id="pricing_btn" style="display: none;">Pricing</a>
                    <?php if ($v_status == 1 && $active_sub != 2) { ?>
                        <a class="nav-link fw-bold" href="<?php echo $base_url; ?>/pricing" id="upgrade_btn" style="display: none;">Upgrade</a>
                    <?php } ?>
                    <button class="btn btn-primary rounded-pill px-3 mx-2 mb-1 mb-lg-0" onclick="handleStartBtn()" id="start_btn" style="display: none;">
                        <span class="d-flex align-items-center">
                            <img src="<?php echo $base_url; ?>/assets/img/logo.png" alt="" width="15" height="15" class="rounded-circle " />
                            <span class="small"> Get started</span>
                        </span>
                    </button>
                    <button class="btn btn-primary rounded-pill px-3 mx-2 mb-1 mb-lg-0" onclick="window.location.href='<?php echo $base_url; ?>/#demo'" id="demo_btn" style="display: none;">
                        <span class="d-flex align-items-center">
                            <span class="small">Demo</span>
                        </span>
                    </button>
                    <div class="dropdown" id="profile_cmpnt" style="display: none;">
                        <button class="btn btn-primary btn-sm rounded-pill mx-3 mt-1 dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            <?php echo $row_user["username"]; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <button onclick="handleStartBtn()" class="btn btn-sm btn-white shadow-sm m-1">
                                <span><img src="<?php echo $base_url; ?>/assets/img/logo.png" alt="" width="15" height="15" class="rounded-circle " /> Playground</span>
                            </button>

                            <button onclick="location.href='<?php echo $base_url; ?>/signout.php'" class="btn btn-sm btn-white shadow-sm m-1">
                                <span><i class="bi bi-box-arrow-right"></i> Signout</span>
                            </button>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main class="flex-shrink-0">