<?php
// Enable output buffering and error reporting for full debugging information
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection and authentication file
include('checklogin.php');

// Debugging: Verify connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    echo "<div>Database connected successfully.</div>";
}

// Check if book ID is provided
if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    echo "<div>Received book ID: $book_id</div>"; // Debugging

    // Fetch the book details to confirm existence
    $query = "SELECT * FROM Books WHERE bookID = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $book_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if book exists
        if ($result->num_rows === 1) {
            $book = $result->fetch_assoc();
            echo "<div>Book found: " . htmlspecialchars($book['bookTitle']) . "</div>"; // Debugging

            // Delete the book if confirmed
            if (isset($_POST["confirm_delete"])) {
                $delete_query = "DELETE FROM `Books` WHERE bookID = ?";
                $delete_stmt = $conn->prepare($delete_query);

                if ($delete_stmt) {
                    $delete_stmt->bind_param("s", $book_id);

                    // Execute delete and check success
                    if ($delete_stmt->execute()) {
                        echo "<div class='alert alert-success'>Book deleted successfully!</div>";
                        ob_flush(); // Flush output buffer

                        // Redirect after delete success
                        header("Location: manage_books.php");
                        exit;
                    } else {
                        echo "<div class='alert alert-danger'>Error deleting book: " . $delete_stmt->error . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Failed to prepare delete statement: " . $conn->error . "</div>";
                }
            }
        } else {
            echo "<div class='alert alert-danger'>Book not found!</div>";
            exit;
        }
    } else {
        echo "<div class='alert alert-danger'>Failed to prepare fetch statement: " . $conn->error . "</div>";
    }
} else {
    echo "<div class='alert alert-warning'>No book ID provided!</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
<?php include('header.php'); ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Delete Book</h2>
    
    <div class="alert alert-warning">
        <h5>Are you sure you want to delete the following book?</h5>
        <p><strong>Title:</strong> <?= htmlspecialchars($book['bookTitle'] ?? '') ?></p>
        <p><strong>BOOK ID:</strong> <?= htmlspecialchars($book['bookID'] ?? '') ?></p>
        <p><strong>Author:</strong> <?= htmlspecialchars($book['author'] ?? '') ?></p>
        <p class="text-danger">This action cannot be undone.</p>
        
        <form method="POST">
            <button type="submit" name="confirm_delete" class="btn btn-danger">Yes, Delete</button>
            <a href="manage_books.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
