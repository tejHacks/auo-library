<?php
// switch_account.php
session_start();

// Logout the current user
if (isset($_SESSION['adminID'])) {
    // Clear the session
    session_unset();
    session_destroy();
}

// Redirect to login page
header("Location: index.php"); // Replace 'login.php' with your actual login page
exit();
?>
