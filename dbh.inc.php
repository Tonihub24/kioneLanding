<?php
$dsn = "mysql:host=127.0.0.1;dbname=siteusers"; // Use "127.0.0.1" instead of "localhost"
$dbusername = "root";
$dbpassword = "jor90Akj$";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Terminate script execution if connection fails
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup-submit'])) {
    // Get data from form submission
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $email = $_POST['email'];

    // Insert data into database
    $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
    $stmt = $pdo->prepare($sql);

    // Execute the statement
    try {
        $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);
        echo "User registered successfully!";
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
}
?>
