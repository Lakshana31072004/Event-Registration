<?php
// send_whatsapp.php
require 'vendor/autoload.php';
use Twilio\Rest\Client;

function sendWhatsApp($name, $phone, $reg_id, $event_name) {
    $sid    = 'YAC6833d4bbe074b4f1e10deda28611c29d'; // Replace with your Twilio SID
    $token  = '048e6ec4d347c63afba7e7ac8a8cae10'; // Replace with your Twilio Auth Token
    $twilio = new Client($sid, $token);
    $from   = 'whatsapp:+14155238886'; // Twilio sandbox number
    $to     = 'whatsapp:+91' . $phone;
    $body   = "Hello $name,\nYour registration is successful.\nRegistration ID: $reg_id\nEvent: $event_name";
    try {
        $twilio->messages->create($to, [
            'from' => $from,
            'body' => $body
        ]);
    } catch (Exception $e) {
        // Display error for debugging
        echo '<pre style="color:red;">WhatsApp send error: ' . $e->getMessage() . '</pre>';
    }
}
?>