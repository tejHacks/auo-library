<?php
include('includes/config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = htmlspecialchars($_POST["studentID"]);
    $email = htmlspecialchars($_POST["email"]);
    $recoveryKey = htmlspecialchars($_POST["recoveryKey"]);

    // Check if the provided details match
    $stmt = $conn->prepare("SELECT StudentID FROM Student WHERE (StudentID = ? OR Email = ?) AND recovery_key = ?");
    $stmt->bind_param("sss", $studentId, $email, $recoveryKey);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Save user session data for the reset password page
        $_SESSION['reset_user'] = $studentId;
        header("Location: reset_password_user.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Invalid credentials. Please check your details.</div>";
    }
}
?>
