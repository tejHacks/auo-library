<?php
include('includes/config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['studentID'])) {
    $studentID = $_SESSION['studentID'];
    $newPassword = password_hash(htmlspecialchars($_POST['newPassword']), PASSWORD_BCRYPT);

    // Generate 8 random characters
    $randomString = bin2hex(random_bytes(4)); // Generates an 8-character hexadecimal string
    // Combine the studentID with the random string to create the new recovery key
    $newRecoveryKey = $studentID . $randomString;

    // Prepare the SQL statement to update both password and recovery key
    $stmt = $conn->prepare("UPDATE Student SET Password = ?, RecoveryKey = ? WHERE StudentID = ?");
    $stmt->bind_param("sss", $newPassword, $newRecoveryKey, $studentID);

    if ($stmt->execute()) {
        // Bootstrap alert message for successful password reset
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Password Reset Successful</title>
            <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
            <meta http-equiv="refresh" content="5;url=login_student.php"> <!-- Redirect after 5 seconds -->
        </head>
        <body>
            <div class="container mt-5">
                <div class="alert alert-success" role="alert">
                    Password reset successfully! Your new recovery key is: <strong>' . $newRecoveryKey . '</strong>. You will be redirected to the login page shortly.
                </div>
            </div>
        </body>
        </html>';
    } else {
        // Bootstrap alert message for error
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Password Reset Error</title>
            <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
            <meta http-equiv="refresh" content="5;url=reset_password_user.php"> <!-- Redirect after 5 seconds -->
        </head>
        <body>
            <div class="container mt-5">
                <div class="alert alert-danger" role="alert">
                    Error resetting password. Please try again. You will be redirected back to the reset page shortly.
                </div>
            </div>
        </body>
        </html>';
    }
}
?>
