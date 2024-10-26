<?php
// Ensure user is logged in and session contains user information
include('checklogin.php');


$message = '';
$messageType = '';

// Update profile logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $studentid = $_POST['studentID'];
    $gender = $_POST['gender'];
    $level = $_POST['level'];
    $course = $_POST['course'];


    // Update query
    $currentDate = date('Y-m-d H:i:s'); // Current date and time
    $updateQuery = "UPDATE Student SET 
        `StudentID` ='$studentid',
        `Fullname`='$fullName', 
        `Email`='$email', 
        `MobileNumber`='$mobile', 
        `Gender`='$gender', 
        `Level`='$level', 
        `Course`='$course',
        `updationDate`='$currentDate' 
        WHERE `StudentID`='$studentID'";

    if (mysqli_query($conn, $updateQuery)) {
        $message = "Profile was updated successfully!";
        $messageType = 'success';
        session_destroy();
        session_start();
        // $SESSION['studentID']
        $_SESSION['studentID'] = $studentid;
        header('location:profile.php');
    } else {
        $message = "Error updating profile: " . mysqli_error($conn);
        $messageType = 'danger';
    }
}



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



<div class="container my-4 border border-2 border-rounded" style="padding-bottom: 70px;">
<h2 class="text-success">EDIT MY PROFILE</h2>
<h5 class="py-3">Hello, <?php echo htmlspecialchars($fullName); ?>!</h5>
<hr>

<?php if ($message): ?>
        <div class="alert alert-<?php echo $messageType; ?>" role="alert">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>


    <form method="post" enctype="multipart/form-data">
    


    <div class="mb-3">
            <label for="studentId" class="form-label">Matric Number</label>
            <input type="text" class="form-control" id="studentId" name="studentID" value="<?php echo htmlspecialchars($studentID); ?>" required>
        </div>

        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo htmlspecialchars($fullName); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="Male" <?php echo $gender == 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo $gender == 'Female' ? 'selected' : ''; ?>>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <input type="text" class="form-control" id="level" name="level" value="<?php echo htmlspecialchars($level); ?>" required>
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" id="course" name="course" value="<?php echo htmlspecialchars($course); ?>" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>

    <hr>

</div> 



</body>
</html>