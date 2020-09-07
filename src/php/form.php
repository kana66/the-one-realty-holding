<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../vendor/autoload.php';

if ($_POST && $_POST['name'] && $_POST['email'] && $_POST['tel'] && $_POST['content']) {
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.163.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'masamitoda@163.com';                     // SMTP username
    $mail->Password   = 'OKXZPWAPYUBNSKKL';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->Charset    = 'utf8';
    //Recipients
    $mail->setFrom('masamitoda@163.com', 'Mailer');
    $mail->addAddress('yangtailei66@gmail.com', 'dev');     // Add a recipient
    $mail->addAddress('576698777@qq.com', '静总');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "=?utf-8?B?".base64_encode("TheOneRealty官网咨询邮件")."?=";
    $mail->Body    = '姓名：' . $_POST['name'] . '<br/>邮箱：' . $_POST['email'] . '<br/>电话：' . $_POST['tel'] . '<br/>内容：' . $_POST['content'];
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
  } catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
echo '{"code":"0","data":""}';