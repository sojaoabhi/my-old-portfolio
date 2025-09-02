<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// required files
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST["message"])) {

    $mail = new PHPMailer(true);

    $email = $_POST["email"];
    $name = $_POST["name"];

    try {

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'abhisheknangare5@gmail.com';
        $mail->Password   = 'sfvxdgmjuqawmgoi';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS ;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('abhisheknangare5@gmail.com', 'Contact Form');
        $mail->addAddress($_POST["email"]);
        $mail->addReplyTo('kimjisooishart@gmail.com', 'Lorem Ipsum');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Thank You for Reaching Out!';
        $mail->Body = "
            <p>Dear $name,</p>
            <p>Thank you for reaching out to us! We appreciate the time you took to share your feedback and inquiries with Lorem Ipsum Inc. Your input is valuable to us, and we are committed to providing you with the best possible experience.</p>

            <p>Our team is currently reviewing your message, and we will get back to you as soon as possible. If your inquiry is time-sensitive, rest assured that we are working diligently to address it promptly.</p>

            <p>In the meantime, feel free to explore our website for additional resources. If you have any urgent matters, please don't hesitate to contact us directly at (639) 234231.</p>

            <p>Once again, thank you for choosing Lorem Ipsum Inc.. We look forward to assisting you and appreciate your continued support.</p>
            <p>Best regards,</p>
            <p>Lorem Ipsum</p>
        ";

        $mail->send();
         header("Location: index.html");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}