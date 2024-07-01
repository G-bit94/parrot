<?php

set_time_limit(60); // TIME LIMIT IN SECONDS
ignore_user_abort(false); // STOP WHEN LONG POLLING BREAKS

include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["last"]) && $_POST["last"] !== "") {
        $last = $_POST["last"];

        // decrypt user id
        $encrypted_string = (string) $_POST["user"];
        $key = "ThisIsJustAStringOfGibberishToEncryptThUserId";
        $decrypted_string = openssl_decrypt($encrypted_string, "AES-128-ECB", $key);
        $user_id = $decrypted_string;

        // decrypt adm access
        $encrypted_string = (string) $_POST["adm"];
        $key = "ThisIsJustAStringOfGibberishToEncryptAdmmAccess";
        $decrypted_string = openssl_decrypt($encrypted_string, "AES-128-ECB", $key);
        $adm = $decrypted_string;

        // decrypt superadm access
        $encrypted_string = (string) $_POST["superadm"];
        $key = "ThisIsJustAStringOfGibberishToEncryptSuuperAdmAcess";
        $decrypted_string = openssl_decrypt($encrypted_string, "AES-128-ECB", $key);
        $superadm = $decrypted_string;
    }
}

// WILL KEEP LOOPING UNTIL A SCORE UPDATE OR TIMEOUT
if (!empty($last)) {
    while (true) {
        $sql = "SELECT regions.region AS sales_region, users.username, registrations.reg_by AS registrar, identifier, dealers.name AS dealer_name, line, serial_no, mobigo, registrations.region, date, time, registrations.created_at FROM registrations
        LEFT OUTER JOIN dealers ON registrations.dealer = dealers.id 
        LEFT OUTER JOIN regions ON registrations.region = regions.id
        LEFT OUTER JOIN users ON registrations.reg_by = users.id ORDER BY registrations.id DESC LIMIT 1";
        $rs = $mysqli->query($sql);
        $row = $rs->fetch_assoc();
        $identifier = $row['identifier'];

        $reg_by = $row["registrar"];

        if (isset($identifier) && $identifier != $last) {
            if ($user_id == $reg_by || $adm == "1" || $superadm == "1") {
                $row["date"] = date("d M", strtotime($row['date']));
                $row["time"] = date("H:i", strtotime($row['time']));
                $row["user"] = $user_id;
                $row["adm"] = $adm;
                $row["superadm"] = $superadm;
                $row["registrar"] = $reg_by;
                echo json_encode($row);
                break;
            }
        }
        // else {
        //     $row['identifier'] = $last;
        // }
        sleep(3); // NOT TO BREAK THE SERVER. SHORT PAUSE BEFORE NEXT CHECK.
    }
}
