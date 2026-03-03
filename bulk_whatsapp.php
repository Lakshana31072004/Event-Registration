<?php
// bulk_whatsapp.php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}
require 'config.php';
require 'send_whatsapp.php';

if (isset($_POST['send_bulk'])) {
    $result = $conn->query("SELECT * FROM students");
    while ($row = $result->fetch_assoc()) {
        sendWhatsApp($row['name'], $row['phone'], $row['reg_id'], $row['event_name']);
    }
    $msg = 'Bulk WhatsApp messages sent!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bulk WhatsApp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Send Bulk WhatsApp Messages</h2>
    <?php if(isset($msg)) echo '<div class="alert alert-success">'.$msg.'</div>'; ?>
    <form method="POST">
        <button type="submit" name="send_bulk" class="btn btn-primary">Send to All Registered Students</button>
    </form>
    <a href="admin_dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>
</body>
</html>