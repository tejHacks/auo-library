<?php
include('includes/config.php');

$response = ["status" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = htmlspecialchars($_POST["studentID"]);
    $email = htmlspecialchars($_POST["email"]);
    $recoveryKey = htmlspecialchars($_POST["recoveryKey"]);
    $newPassword = htmlspecialchars($_POST["newPassword"]);

    if (!empty($studentId) || !empty($email)) {
        // Check if ID or email exists in the database
        $stmt = $conn->prepare("SELECT StudentID, Email, recovery_key FROM Student WHERE StudentID = ? OR Email = ?");
        $stmt->bind_param("ss", $studentId, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if ($user['recovery_key'] === $recoveryKey) {
                // Update password
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $updateStmt = $conn->prepare("UPDATE Student SET Password = ? WHERE StudentID = ? OR Email = ?");
                $updateStmt->bind_param("sss", $hashedPassword, $studentId, $email);

                if ($updateStmt->execute()) {
                    $response["status"] = true;
                    $response["message"] = "Password reset successfully!";
                } else {
                    $response["message"] = "An error occurred. Try again.";
                }
            } else {
                $response["message"] = "Invalid recovery key.";
            }
        } else {
            $response["message"] = "No account found with the provided ID or email.";
        }
    } else {
        $response["message"] = "Please enter a valid ID or email.";
    }

    echo json_encode($response);
}
?>
