<?php
// Include your database connection file here
include('checklogin.php');

// Fetch all issued books from the database
$query = "SELECT * FROM IssuedBooks";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
   
    <title>ACHIEVERS UNIVERSITY LIBRARY | ADMIN DASHBOARD</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
</head>
<body>
    <?php include('header.php'); ?>
<div class="container">
    <h2>Manage Issued Books</h2>

    <!-- Check if there are any issued books -->
    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Issue ID</th>
                    <th>Student ID</th>
                    <th>Borrower's Name</th>
                    <th>Role</th>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Issue Date</th>
                    <th>Due Date</th>
                    <th>Return Date</th>
                    <th>Return Status</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['issue_id'] ?></td>
                        <td><?= $row['student_id'] ?></td>
                        <td><?= $row['borrowers_name'] ?></td>
                        <td><?= $row['role'] ?></td>
                        <td><?= $row['book_id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['book_author'] ?></td>
                        <td><?= $row['publisher'] ?></td>
                        <td><?= $row['issue_date'] ?></td>
                        <td><?= $row['due_date'] ?></td>
                        <td><?= $row['return_date'] ? $row['return_date'] : 'Not Returned' ?></td>
                        <td><?= $row['returnStatus'] === 'Returned' ? 'Returned' : 'Not Returned' ?></td>
                        <td><?= $row['notes'] ?></td>
                        <td>
                            <a href="edit_issued_book.php?id=<?= $row['issue_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_issued_book.php?id=<?= $row['issue_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No issued books found.</p>
    <?php endif; ?>

    <a href="issue_book.php" class="btn btn-primary">Issue New Book</a>
</div>
<script src="../assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>