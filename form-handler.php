<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["comment"];
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'barakaminingltd.co.ke;rbx108.truehost.cloud'; //use your website host
    $mail->SMTPAuth = true;
    $mail->Username = 'barakamines@barakaminingltd.co.ke'; //your website's url
    $mail->Password = ''; //use your hosting password and paste inside ''
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; //don't forget to check your email's port number
    $mail->Timeout = 10;
    
    $mail->setFrom($email);
    $mail->addAddress('barakamines@barakaminingltd.co.ke', 'Recipient Name');
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    
    //change the body according to your website
    $mail->Body = "
        <h1>Contact Details:</h1>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        
        <h1>Message:</h1>
        <p>$message</p>
        
    ";
    
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
?>
