<?php
// admin_dashboard.php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}
require 'config.php';
$result = $conn->query("SELECT * FROM students ORDER BY registration_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>All Registrations</h2>
    <a href="export_excel.php" class="btn btn-success mb-3">Download Excel</a>
    <a href="bulk_whatsapp.php" class="btn btn-info mb-3">Send Bulk WhatsApp</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Reg ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>College</th>
                <th>Event</th>
                <th>Date</th>
                <th>QR Code</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['reg_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['college']; ?></td>
                <td><?php echo $row['event_name']; ?></td>
                <td><?php echo $row['registration_date']; ?></td>
                <td><img src="qr_code.php?reg_id=<?php echo $row['reg_id']; ?>" width="60"></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>