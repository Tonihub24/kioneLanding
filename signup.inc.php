<?php
session_start();
include('db_connection.php');
  // Include the DB connection filel

// Enable error reporting for debugging during development
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if the database connection is successful
if ($con === false) {
    die('Error: Could not connect to the database. ' . mysqli_connect_error());
}

if (isset($_POST['signup-submit'])) {
    // Collect form data and trim whitespace
    $username = trim($_POST['username']);
    $password = trim($_POST['pwd']);
    $email = trim($_POST['email']);

    // Validate inputs
    if (empty($username) || empty($password) || empty($email)) {
        // Log the missing fields
        error_log("Error: Missing fields during signup (Username: $username, Email: $email)");

        header("Location: /signup.php?error=missingfields");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Log the invalid email issue
        error_log("Error: Invalid email address: $email");

        header("Location: /signup.php?error=invalidemail");
        exit();
    }

    // Log before checking if the username exists
    error_log("Checking if username exists: $username");

    // Check if the username already exists
    $checkQuery = "SELECT user_id FROM users WHERE username = ?";
    if ($stmt = $con->prepare($checkQuery)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        // If username exists, log the issue and redirect
        if ($stmt->num_rows > 0) {
            error_log("Error: Username already exists: $username");
            header("Location: /signup.php?error=userexists");
            exit();
        }

        $stmt->close();
    } else {
        error_log("Error preparing statement for username check: " . $con->error);
    }

    // Log password hashing
    error_log("Hashing password for user: $username");

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query to insert the new user
    $sql = "INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)";
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        if ($stmt->execute()) {
            // Log successful insertion of the user
            error_log("User inserted successfully into the database: $username");

            // After successful sign-up, fetch the new user ID and username
            $stmt->close();
            $stmt = $con->prepare("SELECT user_id, username FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($user_id, $username);
            $stmt->fetch();

            // Log session data before setting it
            error_log("Setting session data for new user: ID = $user_id, Username = $username");

            // Set session variables for the newly registered user
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;

            // Log session data after setting it
            error_log('Session data after signup: ' . print_r($_SESSION, true));

            // Redirect to the dashboard page after successful sign-up
            header('Location: dashboard.php');
            exit();
        } else {
            error_log("Error executing query to insert user: " . $stmt->error);
        }

        $stmt->close();
    } else {
        error_log("Error preparing statement for user insertion: " . $con->error);
    }
}

// Close the database connection
$con->close();
?>
