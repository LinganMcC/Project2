<?php
session_start();

// Database connection details for XAMPP
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$database = 'managers';

// Secret staff registration code 
$secret_staff_code = 'MANAGER2025';

$conn = new mysqli($host, $dbUsername, $dbPassword, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic validation
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $staff_code = trim($_POST['staff_code']);

    if (!$username) $errors[] = "Username is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
    if ($password !== $confirm_password) $errors[] = "Passwords do not match.";
    if ($staff_code !== $secret_staff_code) $errors[] = "Invalid secret staff code.";

    if (empty($errors)) {
        // Check if username or email exists
        $stmt = $conn->prepare("SELECT id FROM managers WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Username or email already exists.";
        } else {
            // Hash password and insert
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt_insert = $conn->prepare("INSERT INTO managers (username, email, password) VALUES (?, ?, ?)");
            $stmt_insert->bind_param("sss", $username, $email, $hash);

            if ($stmt_insert->execute()) {
                $_SESSION['success'] = "Registration successful. You can now login.";
                header('Location: stafflogin.php');
                exit();
            } else {
                $errors[] = "Database error. Please try again.";
            }
            $stmt_insert->close();
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manager Registration</title>
  <link href="styles/styles.css" rel="stylesheet">
  <link href="styles/layout.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/navbar.inc.php'; ?>

<div class="form-container">
  <h2>Register Manager</h2>
  <?php if ($errors): ?>
    <ul class="errors">
      <?php foreach ($errors as $error): ?>
        <li><?= htmlspecialchars($error) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <form method="post" action="">
    <label>Username:<input type="text" name="username" required></label><br>
    <label>Email:<input type="email" name="email" required></label><br>
    <label>Password:<input type="password" name="password" required></label><br>
    <label>Confirm Password:<input type="password" name="confirm_password" required></label><br>
    <label>Secret Staff Code:<input type="password" name="staff_code" required></label><br>
    <button type="submit">Register</button>
  </form>
</div>

<?php include 'includes/footer.inc.php'; ?>
</body>
</html>
