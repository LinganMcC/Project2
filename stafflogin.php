<?php
session_start();

// Database connection details for XAMPP
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$database = 'managers';

// Connect to the database using mysqli
$conn = new mysqli($host, $dbUsername, $dbPassword, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = trim($_POST['username']);
    $password = $_POST['password'];

    if (!$usernameOrEmail) {
        $errors[] = "Username or Email is required.";
    }
    if (!$password) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id, username, email, password FROM managers WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['manager_id'] = $user['id'];
                $_SESSION['manager_username'] = $user['username'];
                $_SESSION['logged_in'] = true;

                header("Location: dashboard.php"); // Change to your actual dashboard page
                exit();
            } else {
                $errors[] = "Invalid password.";
            }
        } else {
            $errors[] = "Username or email not found.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Manager Login - EcruSoft Solutions</title>
  <link href="styles/styles.css" rel="stylesheet" />
  <link href="styles/layout.css" rel="stylesheet" />
</head>
<body>
  <?php include 'includes/navbar.inc.php'; ?>

  <main>
    <div class="form-container">
      <h2 class="form-header">Manager Login</h2>

      <?php if (!empty($errors)): ?>
        <ul class="errors">
          <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <form action="" method="POST" class="login-form">
        <fieldset>
          <legend>Login Credentials</legend>
          <div>
            <label for="username">Username or Email:</label>
            <input type="text" id="username" name="username" required />
          </div>
          <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
          </div>
        </fieldset>

        <input type="submit" value="Login" class="button" />
      </form>

      <p>Don't have an account? <a href="staffregister.php" class="link-button">Register here</a></p>
    </div>
  </main>

  <?php include 'includes/footer.inc.php'; ?>
</body>
</html>
