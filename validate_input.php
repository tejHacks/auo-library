<?php
include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = ["status" => false, "message" => ""];
    $field = htmlspecialchars($_POST["field"]);
    $value = htmlspecialchars($_POST["value"]);

    // Validate fields in real-time
    if ($field === "studentID" || $field === "email") {
        $stmt = $conn->prepare("SELECT StudentID, Email FROM Student WHERE StudentID = ? OR Email = ?");
        $stmt->bind_param("ss", $value, $value);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $response["status"] = true;
            $response["message"] = ucfirst($field) . " is valid!";
        } else {
            $response["message"] = "No account found with this " . ucfirst($field) . ".";
        }
    } elseif ($field === "recoveryKey") {
        $stmt = $conn->prepare("SELECT recovery_key FROM Student WHERE recovery_key = ?");
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $keyResult = $stmt->get_result();

        if ($keyResult->num_rows > 0) {
            $response["status"] = true;
            $response["message"] = "Valid recovery key!";
        } else {
            $response["message"] = "Invalid recovery key.";
        }
    }
    echo json_encode($response);
    exit();
}
