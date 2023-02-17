<?php

$name = $_POST["name"];
$email = $_POST["email"];
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
    $mail->Username = "natyada.pr@mail.wu.ac.th";
    $mail->Password = "1900101332181";
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    

    
    $mail->setFrom($email, $name);
    //$mail->addAddress("dave@example.com", "Dave");
    $mail->addAddress($email); 
    
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    // $mail->addAttachment('../../Desktop/pict/' . $AttachFile . '', "$AttachFile");
    
    $mail->send();
    
    header("Location: sent.html");

}catch(exception $e){
    echo 'error :'.$e->getMessage().'<br/>';
}
