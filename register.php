
// Registration is now handled via Google Form
// header('Location: index.html');
// exit;

use function require_once;
require_once 'config.php';

$name = $email = $phone = $message = "";
$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$phone = trim($_POST["phone"]);
	$message = trim($_POST["message"]);

	if ($name && $email && $phone) {
		$stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, message) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $phone, $message);
		if ($stmt->execute()) {
			// Get the unique registration ID (auto-increment id)
			$reg_id = $conn->insert_id;
			$event_name = 'Your Event Name'; // Change as needed or fetch dynamically
			require_once 'send_email.php';
			sendRegistrationEmail($email, $name, $reg_id, $event_name);
			$success = "Registration successful! Details have been sent to your email.";
			$name = $email = $phone = $message = "";
		} else {
			$error = "Error: " . $stmt->error;
		}
		$stmt->close();
	} else {
		$error = "Please fill in all required fields.";
	}
}
// Add a new line at the end of this file.
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Event Registration (PHPMyAdmin)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
	<h2 class="mb-4">Event Registration Form (Database)</h2>
	<?php if ($success): ?>
		<div class="alert alert-success"><?php echo $success; ?></div>
	<?php elseif ($error): ?>
		<div class="alert alert-danger"><?php echo $error; ?></div>
	<?php endif; ?>
	<form method="post" action="">
		<div class="form-group">
			<label for="name">Name*</label>
			<input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
		</div>
		<div class="form-group">
			<label for="email">Email*</label>
			<input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
		</div>
		<div class="form-group">
			<label for="phone">Phone*</label>
			<input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
		</div>
		<div class="form-group">
			<label for="message">Message</label>
			<textarea class="form-control" id="message" name="message"><?php echo htmlspecialchars($message); ?></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Register</button>
	</form>
</div>
</body>
</html>