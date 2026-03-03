<?php
// email_confirmation.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function sendEmail($to, $name, $reg_id, $event_name) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your@email.com'; // Replace with your email
        $mail->Password = 'yourpassword'; // Replace with your password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('your@email.com', 'Event Registration');
        $mail->addAddress($to, $name);
        $mail->Subject = 'Registration Confirmation';
        $mail->Body = "Hello $name,\nYour registration is successful.\nRegistration ID: $reg_id\nEvent: $event_name";
        $mail->send();
    } catch (Exception $e) {
        // Optionally log or display error
    }
}
?>