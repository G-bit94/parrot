<?php

include '../session.php';

// Destroy the session.
session_destroy();

// Redirect to login page after rem0ving Google One Tap Cookie (by setting expiry time to 0)
echo '<script type="text/javascript">
        const d = new Date();
        d.setTime(d.getTime() + (0 * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = "one_tap_skip=true;" + expires + ";path=/;SameSite=None;Secure";
        window.location.replace("' . $site_url . '");
    </script>';

exit;
