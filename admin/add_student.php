<?php
// Include database connection
include('checklogin.php');

// Function to generate a unique recovery key
function generateRecoveryKey($studentID) {
    return $studentID . '-' . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 8);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $fullname = $_POST['fullname'];
    $studentID = $_POST['studentID'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['mobileNumber'];
    $gender = $_POST['gender'];
    $level = $_POST['level'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Encrypt password

    // Check for unique student ID and email
    $check_query = "SELECT * FROM Student WHERE StudentID = ? OR Email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ss", $studentID, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='alert alert-danger'>Student ID or Email already exists.</div>";
    } else {
        // Generate unique recovery key
        $recoveryKey = generateRecoveryKey($studentID);

        // Insert new student data
        $query = "INSERT INTO Student (StudentID, Fullname, Email, MobileNumber, Gender, Level, Department, Course, Password, RecoveryKey)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssssss", $studentID, $fullname, $email, $mobileNumber, $gender, $level, $department, $course, $password, $recoveryKey);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Student registered successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error registering student: " . $conn->error . "</div>";
        }
    }
}
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


    <title>AUO LIBRARY | REGISTER NEW STUDENT </title>

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

<div class="container my-5">
    <h2 class="text-center mb-4">Register New Student</h2>

    <form method="POST">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>
        <div class="mb-3">
            <label for="studentID" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="studentID" name="studentID" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="mobileNumber" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <input type="text" class="form-control" id="level" name="level" required>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" id="course" name="course" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register Student</button>
    </form>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
