<======== lockout user after failed login attempts ========>
<?php
include 'settings.php';

$username = $_POST['username'];
$password = $_POST['password'];

/// Define lockout period and max attempts
$lockout_time = 30 * 60; // 30 minutes
$max_attempts = 3; // Maximum allowed failed attempts

/// Check failed login attempts
$sql = "SELECT COUNT(*) AS attempt_count   
        FROM login_attempts 
        WHERE username = ? AND attempt_time > NOW() - INTERVAL ? SECOND";
$stmt = $conn->prepare($sql); // Prepare the SQL statement and execute sql queries securely
$stmt->bind_param("si", $username, $lockout_time);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['attempt_count'] >= $max_attempts) {
    die("Account locked. Please try again after 15 minutes."); //terminate script execution
}

/// Verify user's credentials
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        echo "Login successful!";
        exit;
    }
}

/// Log the failed login attempt
$sql = "INSERT INTO login_attempts (username, attempt_time) VALUES (?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

die("Invalid username or password.");
?>