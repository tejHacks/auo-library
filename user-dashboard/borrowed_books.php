<?php
session_start();
include('checklogin.php'); // Ensure the user is logged in
// include('config.php'); // Database connection

// Define the student's ID from the session or from `checklogin.php`
$studentID =  htmlspecialchars($studentID) ?? '';

// Fetch user's borrowed books
$borrowedBooks = [];
if ($studentID) {
    $sql = "SELECT * FROM IssuedBooks WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $borrowedBooks[] = $row;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="green">
    <meta name="application-name" content="Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <title>ACHIEVERS UNIVERSITY LIBRARY | BORROWED BOOKS</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <?php include("nav.php"); ?>
    
    <div class="container my-4">
        <h2 class="text-center">Your Borrowed Books</h2>
        <hr>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Contact</th>
                    <th>Date Issued</th>
                    <th>Due Date</th>
                    <th>Returned</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($borrowedBooks)): ?>
                    <?php foreach ($borrowedBooks as $book) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($book['book_id']); ?></td>
                            <td><?php echo htmlspecialchars($book['title']); ?></td>
                            <td><?php echo htmlspecialchars($book['book_author']); ?></td>
                            <td><?php echo htmlspecialchars($book['publisher']); ?></td>
                            <td><?php echo htmlspecialchars($book['mobile']); ?></td>
                            <td><?php echo htmlspecialchars($book['issue_date']); ?></td>
                            <td><?php echo htmlspecialchars($book['due_date']); ?></td>
                            <td><?php echo htmlspecialchars($book['return_date']); ?></td>
                            <td><?php echo htmlspecialchars($book['returnStatus']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No borrowed books found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
