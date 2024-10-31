<?php
session_start(); // Start the session to access session variables
include('checklogin.php');  // Ensure the user is logged in
include('includes/config.php'); // Include your database connection file

// Check if required data is submitted
if (isset($_POST['book_id'], $_POST['bookTitle'], $_POST['bookSummary'])) {
    // Retrieve the student_id from the session
    $student_id = $studentID; // Ensure this is set correctly in checklogin.php
    $book_id = $_POST['book_id'];
    $bookTitle = $_POST['bookTitle'];
    $bookSummary = $_POST['bookSummary'];

    // Check if the book is already in the wishlist
    $checkSql = "SELECT * FROM wishlist WHERE student_id = ? AND book_id = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ss", $student_id, $book_id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Book is already in the wishlist
        echo "<script>alert('This book is already in your wishlist!'); window.location.href='wishlist_add.php';</script>";
    } else {
        // Insert the book into the wishlist
        $sql = "INSERT INTO wishlist (student_id, book_id, book_title, book_description) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $student_id, $book_id, $bookTitle, $bookSummary);

        if ($stmt->execute()) {
            // Successfully added to wishlist
            echo "<script>alert('Book added to wishlist successfully!'); window.location.href='wishlist.php';</script>";
        } else {
            // Error adding to wishlist
            echo "<script>alert('Error adding book to wishlist.'); window.location.href='wishlist_add.php';</script>";
        }
    }
} else {
    // Missing parameters in the request
    echo "<script>alert('Invalid request - Missing parameters.'); window.location.href='wishlist_add.php';</script>";
}
?>
