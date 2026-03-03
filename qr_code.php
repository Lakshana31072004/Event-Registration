<?php
// qr_code.php
require 'vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if (isset($_GET['reg_id'])) {
    $reg_id = $_GET['reg_id'];
    $qr = QrCode::create($reg_id);
    $writer = new PngWriter();
    $result = $writer->write($qr);
    header('Content-Type: image/png');
    echo $result->getString();
    exit();
}
?>