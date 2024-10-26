<?php

// Ensure user is logged in and session contains user information
include('checklogin.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Site Metas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="green">
    <meta name="application-name" content="Achievers University Library">
    <meta name="robots" content="all">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="green">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <meta name="author" content="Olamide Olateju Emmanuel">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Achievers University Library">
    
    <meta name="theme-color" content="#19B10E">
    <title>ACHIEVERS UNIVERSITY LIBRARY | STUDENT PROFILE </title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.min.css">
    

<!-- few scripts -->
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.js" defer></script>
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="../assets/font-awesome/" defer></script>
    <!-- other sylesheets -->
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">

    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">

</head>

<body>

<?php include("nav.php"); ?>


<div class="container my-4" style="padding-bottom: 70px;"> <!-- Increased bottom padding -->
    <h2><?php echo htmlspecialchars($fullName); ?>'s Profile</h2>
    <div class="row mb-4">
      
        <div class="col-md-9">
            <table class="table">
                <tbody>
                    
                    <tr>
                        <th>Full name:</th>
                        <td><?php echo htmlspecialchars($fullName); ?></td>
                    </tr>
                     <tr>
                        <th>Email:</th>
                        <td><?php echo htmlspecialchars($email); ?></td>
                    </tr>
                    <tr>
                        <th>Matric Number:</th>
                        <td><?php echo htmlspecialchars($studentID); ?></td>
                    </tr>
                    <tr>
                        <th>Mobile:</th>
                        <td><?php echo htmlspecialchars($mobile); ?></td>
                    </tr>
                    <tr>
                        <th>Level:</th>
                        <td><?php echo htmlspecialchars($level); ?></td>
                    </tr>
                    <tr>
                        <th>Course:</th>
                        <td><?php echo htmlspecialchars($course); ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?php echo htmlspecialchars($gender); ?></td>
                    </tr>
                    <tr>
                        <th>Registered on:</th>
                        <td><?php echo htmlspecialchars($regDate); ?></td>
                    </tr>
                     <tr>
                        <th>Updated on:</th>
                        <td><?php echo htmlspecialchars($updatedDate); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
    <button onclick="window.print()" class="btn btn-danger">Print Profile</button>
    <a href="password-change.php" class=" text-light btn btn-success">Change Password</a>
</div>

    </body>
</html>