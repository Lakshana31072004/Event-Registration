<?php
// export_excel.php
require 'config.php';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="registrations.xls"');
$result = $conn->query("SELECT * FROM students ORDER BY registration_date DESC");
echo "<table border='1'>";
echo "<tr><th>Reg ID</th><th>Name</th><th>Email</th><th>Phone</th><th>College</th><th>Event</th><th>Date</th></tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['reg_id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['email']}</td>";
    echo "<td>{$row['phone']}</td>";
    echo "<td>{$row['college']}</td>";
    echo "<td>{$row['event_name']}</td>";
    echo "<td>{$row['registration_date']}</td>";
    echo "</tr>";
}
echo "</table>";
?>