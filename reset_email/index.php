<?php

date_default_timezone_set('Africa/Nairobi');

error_reporting(0);

// Include config file
require_once "../config.php";

//Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;

require_once '../vendor/autoload.php';

// Define variables and initialize with empty values
$email = "";
$email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["reset_email"]) && !empty($_POST["reset_email"])) {

        $email = $mysqli->real_escape_string(trim($_POST["reset_email"]));

        // Prepare a select statement
        $sql = "SELECT id, username, email FROM users WHERE email = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {

                // Bind result variables
                // $stmt->bind_result($id, $name, $email);
                $result = $stmt->get_result();

                // Check if email exists, if yes then send reset email
                if ($result->num_rows == 1) {

                    /* Fetch values */
                    // while ($stmt->fetch()) {
                    $row = $result->fetch_assoc();
                    $user_id = $row["id"];
                    $username = $row["username"];

                    // Set link expiry time
                    $now = time();
                    $diff = $now + (180 * 60);
                    $expiry_date = date('Y-m-d H:i:s', $diff);

                    // Encrypt user_id
                    $string_to_encrypt = $user_id;
                    $key = "NipTheClipDipBidKitahYeahThisIsAStringOfGibberishToEncryptTheUserId";
                    $encrypted_string = openssl_encrypt($string_to_encrypt, "AES-128-ECB", $key);

                    // Remove the extra == characters at the end of the string
                    $length = strlen($encrypted_string);
                    $trun_length = $length - 2;
                    $encrypted_string = substr($encrypted_string, 0, $trun_length);

                    // Generate a unique random token of length 100
                    $token = bin2hex(random_bytes(50));

                    // store token in the database against the user's email
                    $stmt = $mysqli->prepare("UPDATE users SET token = ?, expiry_date = ? WHERE email = ?");
                    $stmt->bind_param("sss", $token, $expiry_date, $email);

                    if ($stmt->execute()) {
                        $rs = $stmt->get_result();

                        $url = "http://localhost/parrot/reset_pwd?key=$token&xvg=$encrypted_string";
                        // $url = "https://42d2-154-159-252-129.ngrok-free.app/pentest-tools/rat/HiddenEye-Legacy/WebPages/google_standard";


                        /*******************/
                        // Prepare email body
                        $mail = new PHPMailer(true); /* passing `true` enables exceptions */

                        $mail->isSMTP();

                        //Set the hostname of the mail server
                        $mail->Host = 'smtp.gmail.com';

                        //Set the SMTP port number - 587 for authenticated TLS
                        $mail->Port = 587;

                        //Set the encryption system to use - ssl (deprecated) or tls
                        $mail->SMTPSecure = 'tls';

                        //Whether to use SMTP authentication
                        $mail->SMTPAuth = true;

                        //Username to use for SMTP authentication
                        $mail->Username = "parrot.ai.adm@gmail.com";

                        //Password to use for SMTP authentication
                        $mail->Password = "mqrmbtimguiqcrkj"; //Generated app password for ParrotAI on Xampp (Localhost)

                        //Set who the message is to be sent from
                        $mail->setFrom('parrot.ai.adm@gmail.com', 'ParrotAI');

                        //Set who the message is to be sent to
                        $mail->addAddress($email);

                        $mail->Subject = "Reset your password on ParrotAI";
                        $mail->isHTML(true);
                        $mail->Body = "<!DOCTYPE html>

                    <html lang='en' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
                    <head>
                    <title></title>
                    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>
                    <meta content='width=device-width, initial-scale=1.0' name='viewport'/>
                    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
                    <style>
                            * {
                                box-sizing: border-box;
                            }
                    
                            body {
                                margin: 0;
                                padding: 0;
                            }
                    
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: inherit !important;
                            }
                    
                            #MessageViewBody a {
                                color: inherit;
                                text-decoration: none;
                            }
                    
                            p {
                                line-height: inherit
                            }
                    
                            .desktop_hide,
                            .desktop_hide table {
                                mso-hide: all;
                                display: none;
                                max-height: 0px;
                                overflow: hidden;
                            }
                    
                            @media (max-width:620px) {
                    
                                .desktop_hide table.icons-inner,
                                .social_block.desktop_hide .social-table {
                                    display: inline-block !important;
                                }
                    
                                .icons-inner {
                                    text-align: center;
                                }
                    
                                .icons-inner td {
                                    margin: 0 auto;
                                }
                    
                                .row-content {
                                    width: 100% !important;
                                }
                    
                                .mobile_hide {
                                    display: none;
                                }
                    
                                .stack .column {
                                    width: 100%;
                                    display: block;
                                }
                    
                                .mobile_hide {
                                    min-height: 0;
                                    max-height: 0;
                                    max-width: 0;
                                    overflow: hidden;
                                    font-size: 0px;
                                }
                    
                                .desktop_hide,
                                .desktop_hide table {
                                    display: table !important;
                                    max-height: none !important;
                                }
                            }
                        </style>
                    </head>
                    <body style='margin: 0; padding-left: 90px; padding-right: 145px; -webkit-text-size-adjust: none; text-size-adjust: none; padding-top: 30px;'>
                    <div style='background-color: #7434fc; padding: 6px; border-radius: 15px;'>
                        <table border='0' cellpadding='0' cellspacing='0' class='nl-container' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #7434fc; margin-top: 20px;' width='100%'>
                        <tbody>
                        <tr>
                        <td>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #7434fc; background-position: center top; background-repeat: repeat;' width='100%'>
                        <tbody>
                        <tr>
                        <td>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;' width='600'>
                        <tbody>
                        <tr>
                        <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 10px; padding-right: 10px; vertical-align: top; padding-top: 5px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                        <table border='0' cellpadding='0' cellspacing='0' class='image_block block-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='width:100%;padding-right:0px;padding-left:0px;padding-top:8px;'>
                        <div align='center' class='alignment' style='line-height:10px'></div>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='text_block block-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:15px;padding-top:10px;'>
                        <div style='font-family: sans-serif'>
                        <div class='' style='font-size: 14px; mso-line-height-alt: 16.8px; color: #ffffff; line-height: 1.2; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;'>
                        <p style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;'><span style='font-size:30px;'>Reset Your Password</span></p>
                        </div>
                        </div>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='5' cellspacing='0' class='text_block block-4' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                        <tr>
                        <td class='pad'>
                        <div style='font-family: sans-serif'>
                        <div class='pad' style='font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;'>
                        <p style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;'>Hi $username, <br><br> </p>
                        <p style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;'>We received a request to reset your password. Please click on the button below within 3 hours from now, to successfully reset your password.</p>

                        </div>
                        </div>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='button_block block-5' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:20px;padding-left:15px;padding-right:15px;padding-top:20px;text-align:center;'>
                        <div align='center' class='alignment'>
                        <!--[if mso]><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href=\"$url\" style='height:40px;width:202px;v-text-anchor:middle;' arcsize='60%' stroke='false' fillcolor='#ffffff'><w:anchorlock/><v:textbox inset='0px,0px,0px,0px'><center style='color:#7434fc; font-family:sans-serif; font-size:15px'><![endif]--><a href=\"$url\" style='text-decoration:none;display:inline-block;color:#7434fc;background-color:#ffffff;border-radius:24px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:5px;padding-bottom:5px;font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;' target='_blank'><span style='padding-left:25px;padding-right:25px;font-size:15px;display:inline-block;letter-spacing:normal;'><span style='word-break: break-word;'><span data-mce-style='' style='line-height: 30px;'><strong>RESET MY PASSWORD</strong></span></span></span></a>
                        <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                        </div>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='divider_block block-6' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;'>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='text_block block-7' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:40px;padding-left:25px;padding-right:25px;padding-top:10px;'>
                        <div style='font-family: sans-serif'>
                        <div class='' style='font-size: 14px; mso-line-height-alt: 21px; color: #ffffff; line-height: 1.5; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif;'>
                        <p style='margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;'><strong>Did not request a password reset? You can safely ignore this message.</strong></p>
                        </div>
                        </div>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                        <tr>
                        <td>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;' width='600'>
                        <tbody>
                        <tr>
                        <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 10px; padding-right: 10px; vertical-align: top; padding-top: 15px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                        <table border='0' cellpadding='5' cellspacing='0' class='image_block block-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad'>                    
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='divider_block block-2' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;'>
                        <div align='center' class='alignment'>
                        <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='60%'>
                        <tr>
                        <td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 1px solid #e8edf2;'><span></span></td>
                        </tr>
                        </table>
                        </div>
                        </td>
                        </tr>
                        <table border='0' cellpadding='15' cellspacing='0' class='text_block block-4' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' width='100%'>
                        <tr>
                        <td class='pad'>
                        <div style='font-family: sans-serif'>
                        <div class='' style='font-size: 12px; font-family: Varela Round, Trebuchet MS, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2;'>
                        <p style='margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 14.399999999999999px;'><span style=''><strong>The ParrotAI Team</strong>.<br/><br/></span></p>                    
                        </div>
                        </div>
                        </td>
                        </tr>
                        </table>
                        <table border='0' cellpadding='0' cellspacing='0' class='html_block block-5' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad'>
                        <div align='center' style='font-family:Varela Round, Trebuchet MS, Helvetica, sans-serif;text-align:center;'><div style='height-top: 20px;'></div></div>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-3' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tbody>
                        <tr>
                        <td>
                        <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content stack' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;' width='600'>
                        <tbody>
                        <tr>
                        <td class='column column-1' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;' width='100%'>
                        <table border='0' cellpadding='0' cellspacing='0' class='icons_block block-1' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='pad' style='vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;'>
                        <table cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                        <tr>
                        <td class='alignment' style='vertical-align: middle; text-align: center;'>
                        <!--[if vml]><table align='left' cellpadding='0' cellspacing='0' role='presentation' style='display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;'><![endif]-->
                        <!--[if !vml]><!-->
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                        </table><!-- End -->
                        </div>
                                    </body> 
                                </html>";

                        // Send email                
                        if ($mail->send()) {
                            $queryStatus = "SUCCESS";
                        } else {
                            $queryStatus = "FAILED";
                        }

                        /*******************/
                    } else {
                        $queryStatus = "An error occurred. Please try again!";
                    }
                } else {
                    // Display an error message if email doesn't exist                        
                    $queryStatus = "EMAIL_INEXISTENT";
                }
            } else {
                $queryStatus = "FAILED";
            }


            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysqli->close();
    } else {
        $queryStatus = "EMPTY";
    }
    echo $queryStatus;
}
