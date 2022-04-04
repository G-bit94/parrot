<?php

include "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_POST = json_decode(file_get_contents('php://input'), true);

    $user_id = openssl_decrypt($_POST['user'] ?? '', "AES-128-ECB", "ThisIsJustAStringOfGibberishToEncryptTheUserId");

    $sqla = "SELECT * FROM saved_items WHERE saved_items.user = '$user_id' LIMIT 20";
    $rsa = $mysqli->query($sqla);

    if ($rsa->num_rows !== 0) {
        foreach ($rsa as $row) {
            $text = $row["text"];
?>
            <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="itemDetails('<?php echo $row['unique_id']; ?>');">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <strong><?php echo mb_strimwidth($text, 0, 20, "..."); ?></strong><br>
                        <small class="mb-0" id="blog_context"><?php echo mb_strimwidth($text, 0, 90, "..."); ?></small>
                    </div>
                </div>
            </div>
<?php
        }
    }
}
?>