<?php
// send_email.php
function sendRegistrationEmail($to_email, $name, $reg_id, $event_name) {
    $subject = "Event Registration Confirmation";
    $message = "Hello $name,\n\nYour registration is successful.\nRegistration ID: $reg_id\nEvent: $event_name\n\nThank you for registering!";
    $headers = "From: noreply@yourdomain.com\r\n" .
               "Reply-To: noreply@yourdomain.com\r\n" .
               "X-Mailer: PHP/" . phpversion();
    // Send email
    mail($to_email, $subject, $message, $headers);
}
