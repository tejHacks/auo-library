<?php
// Include necessary files and initialize variables
include('checklogin.php');  // Ensure the student is logged in
  // Connect to the database

// Get student data from checklogin or other source
$studentID = htmlspecialchars($studentID);
$fullName = htmlspecialchars($fullName);

// Query to fetch the borrow requests for the logged-in student
$sql = "SELECT request_id, bookID, book_title, request_date, status 
        FROM BorrowRequests 
        WHERE student_id = ? 
        ORDER BY request_date DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $studentID);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any requests to display
$borrowRequests = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $borrowRequests[] = $row;
    }
} else {
    $message = "You have no borrow requests.";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Borrow Requests</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
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

    <style>
        .status-approved { color: green; }
        .status-pending { color: orange; }
        .status-rejected { color: red; }
    </style>
</head>
<body>
    <?php include("nav.php"); ?>
    <div class="container my-4">
        <h2 class="text-center">My Borrow Requests</h2>
        <hr>

        <?php if (isset($message)): ?>
            <p class="text-center"><?php echo $message; ?></p>
        <?php else: ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Book ID</th>
                        <th>Book Title</th>
                        <th>Request Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($borrowRequests as $request): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($request['request_id']); ?></td>
                            <td><?php echo htmlspecialchars($request['bookID']); ?></td>
                            <td><?php echo htmlspecialchars($request['book_title']); ?></td>
                            <td><?php echo htmlspecialchars($request['request_date']); ?></td>
                            <td class="<?php echo 'status-' . strtolower($request['status']); ?>">
                                <?php echo htmlspecialchars($request['status']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
