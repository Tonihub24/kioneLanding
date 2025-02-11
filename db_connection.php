<?php
// Increase memory limit if necessary
ini_set('memory_limit', '256M');  // Or higher if needed

// Initialize the MySQL connection
$con = mysqli_init();

// Attempt to establish the connection without SSL
if (!mysqli_real_connect(
    $con,
    "mainevent.mysql.database.azure.com", // Hostname
    "d41146537",                          // Username
    "jor90Akj$",                         // Password
    "adming",                             // Database name
    3306                                  // Port
)) {
    // Log error and terminate
    error_log("Database connection failed: " . mysqli_connect_error() . " (Error Code: " . mysqli_connect_errno() . ")");
    die("Database connection failed. Please check the logs.");
} else {
    // Log success message
    error_log("Database connection successful.");
}

// Return the connection
return $con;
?>
