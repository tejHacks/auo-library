<?php
session_start();
error_reporting(0);
include('checklogin.php');
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>ACHIEVERS UNIVERSITY LIBRARY |ADMIN SETTINGS </title>
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

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
</head>
<body>

<?php include("header.php"); ?>

<div class="container mt-4">
    <h2 class="text-center">Settings</h2>
    
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="list-group">
                <a href="edit_profile.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-user"></i> Edit Profile
                </a>
                <a href="notifications.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-bell"></i> Check Notifications
                </a>
                <a href="edit_profile.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-lock"></i> Change Password
                </a>
                <a href="borrow_requests.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-calendar"></i> Manage Borrow Requests
                </a>
                <a href="manage_counseling.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-comments"></i> Manage Counseling Requests
                </a>
                <a href="manage_suggestions.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-comments"></i> Manage Suggestions and Feedback
                </a>
                <a href="manage_staff.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-user-plus"></i> Manage Staff
                </a>
                <a href="manage_students.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-graduation-cap"></i> Manage Students
                </a>
                <a href="manage_books.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-book"></i> Manage Books
                </a>
                <a href="logout.php" class="list-group-item list-group-item-action text-danger">
                    <i class="fa fa-user"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
