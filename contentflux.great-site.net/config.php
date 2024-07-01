<?php

date_default_timezone_set('Africa/Nairobi');

define('DB_SERVER', 'sql306.epizy.com');
define('DB_USERNAME', 'epiz_33536516');
define('DB_PASSWORD', 'jpjqxkdWTyOC');
define('DB_NAME', 'epiz_33536516_contentflux');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
