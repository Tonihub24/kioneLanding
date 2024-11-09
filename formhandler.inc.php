<?php
// Ensure errors are displayed for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Initial debug message
echo "Script started.<br>";

// Check if the REQUEST_METHOD is set
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Redirecting...<br>";
    header("Location: ../index.php");
    exit(); // Terminates the script execution after redirection
}

// Debugging: Print POST data
echo '<pre>';
print_r($_POST);
echo '</pre>';

// Process form submission if POST method
$username = $_POST["username"] ?? ''; // Using null coalescing operator to handle undefined index
$password = $_POST["pwd"] ?? ''; // Using null coalescing operator to handle undefined index
$email = $_POST["email"] ?? ''; // Using null coalescing operator to handle undefined index

// Debugging: Print captured values
echo "Username: $username<br>";
echo "Password: $password<br>";
echo "Email: $email<br>";

// Basic validation
if (empty($username) || empty($password) || empty($email)) {
    die("All fields are required.");
}

// Include database connection file
require_once "dbh.inc.php";

try {
    // Check if the username or email already exists
    $checkQuery = "SELECT COUNT(*) FROM users WHERE username = ? OR email = ?";
    $checkStmt = $pdo->prepare($checkQuery);
    $checkStmt->execute([$username, $email]);
    $count = $checkStmt->fetchColumn();
    
    if ($count > 0) {
        die("Username or email already exists.");
    }

    // Prepare and execute the SQL query
    $query = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $stmt->execute([$username, $hashedPassword, $email]);

    // Close connections
    $pdo = null;
    $stmt = null;

    // Redirect after successful submission
    header("Location: ../index.php");
    exit(); // Terminates the script execution after redirection
} catch (PDOException $e) {
    // Handle query failure
    die("Query failed: " . $e->getMessage());
}