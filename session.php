<?php

session_start();

$_SESSION['token'] = bin2hex(random_bytes(24));

$sign_in_btn = '<div class="p-3 m-1 shadow-sm rounded-3">
                    <div class="col-sm p-1 fs-6">
                        <p>Looks like <script>Id("site-name-signedout").innerText=site_name;</script> <span id="site-name-signedout"></span> is open in another tab or you\'ve been signed out.</p>
                        <button class="btn btn-primary mt-1" onclick="handleStartBtn()">Continue working here</button>
                    </div>
                </div>';
