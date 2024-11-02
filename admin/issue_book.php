<?php
// Include your database connection file here
include('checklogin.php');

// Initialize variables for feedback messages
$success_message = "";
$error_message = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $student_id = htmlspecialchars($_POST['student_id']);
    $borrowers_name = htmlspecialchars($_POST['borrowers_name']);
    $role = htmlspecialchars($_POST['role']);
    $book_id = htmlspecialchars($_POST['book_id']);
    $title = htmlspecialchars($_POST['title']);
    $book_author = htmlspecialchars($_POST['book_author']);
    $publisher = htmlspecialchars($_POST['publisher']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $department = htmlspecialchars($_POST['department']);
    $issue_date = htmlspecialchars($_POST['issue_date']);
    $due_date = htmlspecialchars($_POST['due_date']);
    $notes = htmlspecialchars($_POST['notes']);

    // Prepare an SQL statement to insert the data into the IssuedBooks table
    $stmt = $conn->prepare("INSERT INTO IssuedBooks (student_id, borrowers_name, role, book_id, title, book_author, publisher, mobile, department, issue_date, due_date, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $student_id, $borrowers_name, $role, $book_id, $title, $book_author, $publisher, $mobile, $department, $issue_date, $due_date, $notes);

    // Execute the statement
    if ($stmt->execute()) {
        $success_message = "Book issued successfully!";
    } else {
        $error_message = "Error issuing book: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Fetch the roles for the dropdown
$roles = ['Student', 'Lecturer'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="#343a40">
    <meta name="application-name" content="Achievers University Library">
    <meta name="robots" content="all">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#343a40">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <meta name="author" content="Olamide Olateju Emmanuel">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Achievers University Library, ACHIEVERS UNIVERSITY LIBRARY, AUO library">
   
    <title>AUO LIBRARY | ISSUE A BOOK </title>

    <!-- Stylesheets -->
 

    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
    <style>
            ::-webkit-scrollbar{
    background: #272727;
   width:8px;
}

::-webkit-scrollbar-thumb{
    background: #808080;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover{
    background-color: #666;
}

</style>
</head>
<body>

<?php include('header.php'); ?>
<div class="container  py-3" style="padding-bottom:40px;">
    <h2>Issue Book</h2>

    <?php if ($success_message): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $success_message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = 'manage_issued_books.php'; // Redirect after 10 seconds
            }, 10000);
        </script>
    <?php elseif ($error_message): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error_message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID/ Staff ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" required>
        </div>
        <div class="mb-3">
            <label for="borrowers_name" class="form-label">Borrower's Name</label>
            <input type="text" class="form-control" id="borrowers_name" name="borrowers_name" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role ?>"><?= $role ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="book_id" class="form-label">Book ID</label>
            <input type="text" class="form-control" id="book_id" name="book_id" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="book_author" class="form-label">Book Author</label>
            <input type="text" class="form-control" id="book_author" name="book_author" required>
        </div>
        <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher" required>
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" required>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <div class="mb-3">
            <label for="issue_date" class="form-label">Issue Date</label>
            <input type="date" class="form-control" id="issue_date" name="issue_date" required>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Issue Book</button>
    </form>
</div>
<script src="../assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
