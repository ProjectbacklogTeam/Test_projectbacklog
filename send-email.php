<?php

$name = $_POST["name"];
$email = $_POST["email"];
$tag1 = $_POST['tag1'];
$subject = $_POST["subject"];
$message = $_POST["message"];
$AttachFile = $_POST["attachment"];

//require "vendor/autoload.php";
// require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor/phpmailer/phpmailer/src/SMTP.php';

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);


//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
try{
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "hatarriza@gmail.com";
    $mail->Password = "ghwnwzlbwbazahvb";
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    

    
    $mail->setFrom($email, $name);
    //$mail->addAddress("dave@example.com", "Dave");
    $mail->addAddress($email);
    $mail->addAddress($tag1, 'Tag1');
    // $mail->addAddress($tag2, 'Tag2');
    // $mail->addAddress($tag3, 'Tag3');

    
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    //$mail->SMTPDebug = 2;
    // $mail->addAttachment('../../Desktop/pict/' . $AttachFile . '', "$AttachFile");

    if (isset($_FILES['attachment']) && !empty($_FILES['attachment']['name'])) {
        // Add the attachment
        $attachment_path = $_FILES['attachment']['tmp_name'];
        $attachment_name = $_FILES['attachment']['name'];
        $mail->addAttachment($attachment_path, $attachment_name);
    }
    
    $mail->send();
    
    header("Location: sent.php");

}catch(exception $e){
    echo 'error :'.$e->getMessage().'<br/>';
}
