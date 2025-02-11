<?php
session_start();
include '/home/site/wwwroot/db_connection.php'; // Include the DB connection file

// Make sure the connection is stored in $con after including db_connection.php
// If it isn't, your login code won't be able to use it for database queries

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['pwd']);

    // Check for empty fields
    if (empty($username) || empty($password)) {
        header("Location: /index.html?error=missingfields");
        exit();
    }

    // Fetch user data from the database using MySQLi
    $stmt = mysqli_prepare($con, "SELECT user_id, username, password_hash FROM users WHERE username = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 's', $username); // 's' means the parameter is a string
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Debugging: Check if user was found and password is verified
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];

        // Debugging: Check session data immediately after login
        error_log('Session after login: ' . print_r($_SESSION, true));

        header("Location: /dashboard.php");  // Make sure this URL is correct
        exit();
    } else {
        header("Location: /index.html?error=wrongpassword");
        exit();
    }
}
?>
