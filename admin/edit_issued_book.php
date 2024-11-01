<?php
// Include your database connection and check login file
include('checklogin.php');

if (isset($_GET['id'])) {
    $issue_id = $_GET['id'];

    // Retrieve the issued book details based on the issue_id
    $query = "SELECT * FROM IssuedBooks WHERE issue_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $issue_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect updated information from the form
        $student_id = $_POST['student_id'];
        $borrowers_name = $_POST['borrowers_name'];
        $role = $_POST['role'];
        $book_id = $_POST['book_id'];
        $title = $_POST['title'];
        $book_author = $_POST['book_author'];
        $publisher = $_POST['publisher'];
        $issue_date = $_POST['issue_date'];
        $due_date = $_POST['due_date'];
        $return_date = $_POST['return_date'] ?: null;
        $notes = $_POST['notes'];
        $returnStatus = $_POST['returnStatus'];

        // Update the issued book record
        $update_query = "UPDATE IssuedBooks SET student_id=?, borrowers_name=?, role=?, book_id=?, title=?, book_author=?, publisher=?, issue_date=?, due_date=?, return_date=?, notes=?, returnStatus=? WHERE issue_id=?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("sssssssssssss", $student_id, $borrowers_name, $role, $book_id, $title, $book_author, $publisher, $issue_date, $due_date, $return_date, $notes, $returnStatus, $issue_id);

        if ($update_stmt->execute()) {
            echo "<div class='alert alert-success'>Record updated successfully. Redirecting...</div>";
            header("refresh:10;url=manage_issued_books.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Error updating record.</div>";
        }
    }
} else {
    echo "<div class='alert alert-danger'>Invalid request.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Issued Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
</head>
<body>
    <?php include('header.php'); ?>
<div class="container mt-5">
    <h2>Edit Issued Book</h2>
    <form method="POST">
        <div class="form-group">
            <label>Student ID</label>
            <input type="text" name="student_id" class="form-control" value="<?= $book['student_id'] ?>" required>
        </div>
        <div class="form-group">
            <label>Borrower's Name</label>
            <input type="text" name="borrowers_name" class="form-control" value="<?= $book['borrowers_name'] ?>" required>
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text" name="role" class="form-control" value="<?= $book['role'] ?>" required>
        </div>
        <div class="form-group">
            <label>Book ID</label>
            <input type="text" name="book_id" class="form-control" value="<?= $book['book_id'] ?>" required>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?= $book['title'] ?>" required>
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="book_author" class="form-control" value="<?= $book['book_author'] ?>" required>
        </div>
        <div class="form-group">
            <label>Publisher</label>
            <input type="text" name="publisher" class="form-control" value="<?= $book['publisher'] ?>" required>
        </div>
        <div class="form-group">
            <label>Issue Date</label>
            <input type="date" name="issue_date" class="form-control" value="<?= $book['issue_date'] ?>" required>
        </div>
        <div class="form-group">
            <label>Due Date</label>
            <input type="date" name="due_date" class="form-control" value="<?= $book['due_date'] ?>" required>
        </div>
        <div class="form-group">
            <label>Return Date</label>
            <input type="date" name="return_date" class="form-control" value="<?= $book['return_date'] ?>">
        </div>
        <div class="form-group">
            <label>Notes</label>
            <textarea name="notes" class="form-control"><?= $book['notes'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Return Status</label>
            <select name="returnStatus" class="form-control" required>
                <option value="Not Returned" <?php if ($book['returnStatus'] == 'Not Returned') echo 'selected'; ?>>Not Returned</option>
                <option value="Returned" <?php if ($book['returnStatus'] == 'Returned') echo 'selected'; ?>>Returned</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
