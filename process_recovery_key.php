<?php
include('includes/config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['studentID'])) {
    $studentID = $_SESSION['studentID'];
    $recoveryKey = htmlspecialchars($_POST['recoveryKey']);
    
    $stmt = $conn->prepare("SELECT RecoveryKey FROM Student WHERE StudentID = ?");
    $stmt->bind_param("s", $studentID);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && $result['RecoveryKey'] === $recoveryKey) {
        // Display success alert and redirect after a short delay
        echo "<div class='alert alert-success'>Recovery key is correct! Redirecting to password reset page...</div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'reset_password_user.php';
                }, 2000); // Redirect after 2 seconds
              </script>";
    } else {
        // Display error alert
        echo "<div class='alert alert-danger'>Incorrect recovery key. Please try again.</div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'verify_recovery_key.php';
                }, 2000); // Redirect after 2 seconds
              </script>";
    }
} else {
    echo "<div class='alert alert-warning'>Session expired or student ID not set.</div>";
}
?>
