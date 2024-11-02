<?php
include('includes/config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = htmlspecialchars($_POST['studentID']);
    $email = htmlspecialchars($_POST['email']);
    
    $stmt = $conn->prepare("SELECT * FROM Student WHERE StudentID = ? AND Email = ?");
    $stmt->bind_param("ss", $studentID, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['studentID'] = $studentID;
        header("Location: verify_recovery_key.php");
    } else {
        echo "<script>alert('Invalid Student ID or Email'); window.location.href = 'password_reset.php';</script>";
    }
}
?>
