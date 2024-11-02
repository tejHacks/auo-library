<?php

// Include your database connection file here
include('checklogin.php'); 

// Query Functions
function getTotalCount($table, $conn) {
    $query = "SELECT COUNT(*) as total FROM $table";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
    return $data['total'];
}

function getIssuedBooksCount($conn) {
    $query = "SELECT COUNT(*) as total FROM IssuedBooks";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
    return $data['total'];
}

function getCurrentBorrowedCount($conn) {
    $query = "SELECT COUNT(*) as total FROM IssuedBooks WHERE return_date IS NULL";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
    return $data['total'];
}

function getOverdueBooksCount($conn) {
    $query = "SELECT COUNT(*) as total FROM IssuedBooks WHERE due_date < NOW() AND return_date IS NULL";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
    return $data['total'];
}

// Fetch Metrics
$total_students = getTotalCount('Student', $conn);
$total_books = getTotalCount('Books', $conn);
$total_librarians = getTotalCount('Librarian', $conn);
$total_suggestions = getTotalCount('Suggestions', $conn);
$total_issued_books = getIssuedBooksCount($conn);
$current_borrowed = getCurrentBorrowedCount($conn);
$overdue_books = getOverdueBooksCount($conn);
$total_lecturers = getTotalCount('Lecturers', $conn);
$borrow_requests = getTotalCount('BorrowRequests', $conn);
$not_yet_returned = $current_borrowed;

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    <meta name="keywords" content="Achievers University Library, ACHIEVERS UNIVERSITY LIBRARY, Auo library">
    <meta name="theme-color" content="#343a40">


    <title>AUO LIBRARY | ADMIN DASHBOARD</title>

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

    <style>
        .content-box {
            border-radius: 10px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .content-box:hover { transform: translateY(-5px); background-color: #f1f1f1; }
        .card { height: 180px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; }
        .card-body { text-align: center; }
    </style>
</head>

<body>
<?php include("header.php"); ?>

<div class="container-fluid my-4">
    <p style="font-size:18px;font-weight:400;">Welcome Back, <?php echo htmlspecialchars($fullName); ?></p>
    <hr>
    <div class="container">
        <h3 class="text-center mt-4">Dashboard <i class="fa fa-dashboard"></i></h3><hr>
        <div class="row text-uppercase">
            <!-- Dashboard Cards -->
            <?php
                $dashboardItems = [
                    ['Total Students Registered', $total_students, 'text-success', 'fa-users', 'manage_students.php'],
                    ['Total Books Available', $total_books, 'text-primary', 'fa-book', 'manage_books.php'],
                    ['Total Admins', $total_librarians, 'text-warning', 'fa-address-card', 'manage_admin.php'],
                    ['Total Suggestions', $total_suggestions, 'text-danger', 'bx bx-chat', 'manage_suggestions.php'],
                    ['Total Books Issued', $total_issued_books, 'text-success', 'fa-book', 'manage_issued_books.php'],
                    ['Currently Borrowed', $current_borrowed, 'text-primary', 'fa-book', 'manage_issued_books.php'],
                    ['Total Lecturers', $total_lecturers, 'text-warning', 'fa-user-circle', 'manage_lecturers.php'],
                    ['Overdue Books', $overdue_books, 'text-danger', 'fa-book', 'manage_overdue_books.php'],
                    ['Borrow Requests', $borrow_requests, 'text-primary', 'fa-book', 'manage_borrow_requests.php'],
                    ['Not Yet Returned', $not_yet_returned, 'text-danger', 'fa-book', 'manage_not_returned.php']
                ];

                foreach ($dashboardItems as $item) {
                    echo "<div class='col-md-3 mb-4'>
                            <div class='card bg-light {$item[2]} border border-2 border-{$item[2]}'>
                                <div class='card-body'>
                                    <i class='fa {$item[3]} fa-2x'></i>
                                    <h5 class='card-title'>{$item[0]}</h5>
                                    <p class='card-text'>{$item[1]}</p>
                                    <a href='{$item[4]}' class='w-100 btn btn-lg fw-bold {$item[2]}'>{$item[0]}</a>
                                </div>
                            </div>
                          </div>";
                }
            ?>
        </div>
    </div>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
