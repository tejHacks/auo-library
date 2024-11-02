<?php
include('checklogin.php'); // Ensure librarian is logged in
include('db.php'); // Database connection

// Fetch all pending requests
$query = "SELECT * FROM BorrowRequests WHERE status = 'Pending'";
$result = $conn->query($query);

// Handle approve/reject actions
if (isset($_POST['action']) && isset($_POST['request_id'])) {
    $requestId = $_POST['request_id'];
    $action = strtolower($_POST['action']); // Convert action to lowercase for easier handling

    // Fetch student data from the BorrowRequests table
    $requestQuery = $conn->prepare("SELECT * FROM BorrowRequests WHERE request_id = ?");
    $requestQuery->bind_param("i", $requestId);
    $requestQuery->execute();
    $requestData = $requestQuery->get_result()->fetch_assoc();

    if ($requestData) {
        $studentID = $requestData['student_id'];
        $fullName = $requestData['borrower_name'];
        $bookTitle = $requestData['book_title'];
        
        // Determine the status and message type based on the action
        $status = ($action === 'approve') ? 'Approved' : 'Rejected';
        $messageType = ($action === 'approve') ? 'Approval' : 'Rejection';
        
        // Update the status in the BorrowRequests table
        $updateStmt = $conn->prepare("UPDATE BorrowRequests SET status = ? WHERE request_id = ?");
        $updateStmt->bind_param("si", $status, $requestId);
        if ($updateStmt->execute()) {
            // Prepare message data
            $dateSent = date("Y-m-d");
            $timeSent = date("H:i:s");
            $messageText = ($status === 'Approved') 
                ? "Your request to borrow '$bookTitle' has been approved."
                : "Your request to borrow '$bookTitle' has been rejected.";

            // Insert the message into the Message table
            $msgStmt = $conn->prepare("INSERT INTO Message (studentID, fullName, messageType, date_sent, time_sent, messageText) VALUES (?, ?, ?, ?, ?, ?)");
            $msgStmt->bind_param("ssssss", $studentID, $fullName, $messageType, $dateSent, $timeSent, $messageText);
            $msgStmt->execute();
        }
    }
    header("Location: manage_borrow_requests.php"); // Refresh the page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Borrow Requests</title>
    <!-- Stylesheets and meta tags here -->
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
  

</head>
<body>
    <?php include('header.php'); ?>
    <div class="container my-4">
        <h2>Borrow Requests</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Book Title</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['request_id']) ?></td>
                            <td><?= htmlspecialchars($row['student_id']) ?></td>
                            <td><?= htmlspecialchars($row['borrower_name']) ?></td>
                            <td><?= htmlspecialchars($row['book_title']) ?></td>
                            <td><?= htmlspecialchars($row['request_date']) ?></td>
                            <td><?= htmlspecialchars($row['status']) ?></td>
                            <td>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="request_id" value="<?= htmlspecialchars($row['request_id']) ?>">
                                    <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                                    <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No pending borrow requests.</p>
        <?php endif; ?>
    </div>

    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
