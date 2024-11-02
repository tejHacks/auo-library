<?php
include('checklogin.php'); // Ensure user is logged in and student data is available

// Fetch all messages for the logged-in student
$studentID = htmlspecialchars($studentID); // Assuming $studentID is from `checklogin.php`
$query = "SELECT * FROM Message WHERE studentID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $studentID);
$stmt->execute();
$result = $stmt->get_result();

// Handle message deletion
if (isset($_POST['delete']) && isset($_POST['messageID'])) {
    $messageID = $_POST['messageID'];
    
    // Delete message from the Message table
    $deleteStmt = $conn->prepare("DELETE FROM Message WHERE messageID = ? AND studentID = ?");
    $deleteStmt->bind_param("is", $messageID, $studentID);
    
    if ($deleteStmt->execute()) {
        $successMessage = "Message deleted successfully.";
    } else {
        $errorMessage = "Error deleting message. Please try again later.";
    }
    // Refresh the page to update the list
    header("Location: view_messages.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Messages</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="green">
    <meta name="application-name" content="Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <title>ACHIEVERS UNIVERSITY LIBRARY | STUDENT DASHBOARD</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">

    <!-- Scripts -->
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>

    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
<?php include("nav.php"); ?>
    
    <div class="container my-4">
        <h2>Your Messages</h2>
        
        <?php if (isset($successMessage)) : ?>
            <div class="alert alert-success"><?= $successMessage ?></div>
        <?php elseif (isset($errorMessage)) : ?>
            <div class="alert alert-danger"><?= $errorMessage ?></div>
        <?php endif; ?>

        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Message Type</th>
                        <th>Message</th>
                        <th>Date Sent</th>
                        <th>Time Sent</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['messageType']) ?></td>
                            <td><?= htmlspecialchars($row['messageText']) ?></td>
                            <td><?= htmlspecialchars($row['date_sent']) ?></td>
                            <td><?= htmlspecialchars($row['time_sent']) ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="messageID" value="<?= htmlspecialchars($row['messageID']) ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have no messages.</p>
        <?php endif; ?>
    </div>

    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
