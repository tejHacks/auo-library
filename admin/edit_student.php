<?php
// Include your database connection and check login
include('checklogin.php');

// Prepare and validate the student ID
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $student_id = $_GET['id'];

    // Fetch the student’s current details
    $query = "SELECT * FROM Student WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if (!$student) {
        echo "<script>alert('Student not found!'); window.location.href='manage_students.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid or missing student ID.'); window.location.href='manage_students.php';</script>";
    exit;
}

// Handle form submission securely
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $fullname = htmlspecialchars(trim($_POST['Fullname']));
    $email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_EMAIL);
    $mobile = htmlspecialchars(trim($_POST['MobileNumber']));
    $gender = htmlspecialchars(trim($_POST['Gender']));
    $level = htmlspecialchars(trim($_POST['Level']));
    $department = htmlspecialchars(trim($_POST['Department']));
    $course = htmlspecialchars(trim($_POST['Course']));
    
    // Check for unique StudentID and Email (optional, depending on workflow)
    // if a new email or ID entered

    // Handle password securely: update only if a new one is provided
    $new_password = trim($_POST['Password']);
    if (!empty($new_password)) {
        $password_hash = password_hash($new_password, PASSWORD_BCRYPT);
    } else {
        $password_hash = $student['Password'];  // Keep the existing password hash
    }

    // Update student details securely
    $update_query = "UPDATE Student SET Fullname = ?, Email = ?, MobileNumber = ?, Gender = ?, Level = ?, Department = ?, Course = ?, Password = ? WHERE ID = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssssssssi", $fullname, $email, $mobile, $gender, $level, $department, $course, $password_hash, $student_id);

    if ($stmt->execute()) {
        echo "<script>alert('Student details updated successfully!'); window.location.href='manage_students.php';</script>";
    } else {
        echo "<script>alert('Error updating student details. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Student</title>
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
<?php include('header.php'); ?>

<div class="container my-4">
    <h2 class="text-center">Edit Student</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="Fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="Fullname" name="Fullname" value="<?= htmlspecialchars($student['Fullname']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="<?= htmlspecialchars($student['Email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="MobileNumber" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" value="<?= htmlspecialchars($student['MobileNumber']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="Gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="Gender" name="Gender" value="<?= htmlspecialchars($student['Gender']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="Level" class="form-label">Level</label>
            <input type="text" class="form-control" id="Level" name="Level" value="<?= htmlspecialchars($student['Level']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="Department" class="form-label">Department</label>
            <input type="text" class="form-control" id="Department" name="Department" value="<?= htmlspecialchars($student['Department']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="Course" class="form-label">Course</label>
            <input type="text" class="form-control" id="Course" name="Course" value="<?= htmlspecialchars($student['Course']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">New Password (leave blank to keep existing)</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter new password if needed">
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
        <a href="manage_students.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
