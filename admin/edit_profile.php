<?php
session_start();
error_reporting(0);

// Check if the user is logged in
include('checklogin.php');


// Handle profile update
if (isset($_POST['update'])) {
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
    $currentPassword = mysqli_real_escape_string($conn, $_POST['currentPassword']);

    // Verify current password
    $checkQuery = "SELECT Password FROM Librarian WHERE ID = '$librarianId'";
    $checkResult = mysqli_query($conn, $checkQuery);
    $checkLibrarian = mysqli_fetch_assoc($checkResult);

    if (password_verify($currentPassword, $checkLibrarian['Password'])) {
        // Update librarian information
        $recoveryKey = $librarianID . bin2hex(random_bytes(6)); // Generate new recovery key
        $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_BCRYPT) : $checkLibrarian['Password'];

        $updateQuery = "UPDATE Librarian SET Fullname = '$fullName', LibrarianEmail = '$email', Contact = '$contact', Role = '$role', JobTitle = '$jobtitle', Department = '$department' , Password = '$hashedPassword', RecoveryKey = '$recoveryKey' WHERE ID = '$librarianId'";

        if (mysqli_query($conn, $updateQuery)) {
            $success = true;
            header("Refresh:5; url=profile.php");
        } else {
            $error = "Error updating profile.";
        }
    } else {
        $error = "Current password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <meta name="keywords" content="CodeCamp,Coding academy camp">
    <meta name="theme-color" content="green">
    <meta name="application-name" content="Achievers Health Center Management System">
    <meta name="robots" content="all">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="green">
    <meta name="description" content="A web application for managing and providing digital services required by the Healthcare Organization of Achievers University, Owo.">
    <meta name="author" content="Olamide Olateju Emmanuel">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Stylesheets -->
 <!-- Stylesheets -->
 <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.min.css">
    


    <link rel="icon" href="../assets/school.png" type="image/png">
</head>
<body>

<?php include("header.php"); ?>

<!-- <div class="container mt-4 py-4"> -->

<div class="container my-4" style="padding-bottom:120px;">
   
    <h2 class="text-center">Edit Profile</h2>

    <?php if (isset($success)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Profile updated successfully. Redirecting to profile page...
        </div>
    <?php elseif (isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo htmlspecialchars($fullName); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo htmlspecialchars($contact); ?>" required>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" name="role" value="<?php echo htmlspecialchars($role); ?>" required>
        </div>
        <div class="mb-3">
            <label for="jobtitle" class="form-label">JobTitle</label>
            <input type="text" class="form-control" id="jobtitle" name="jobtitle" value="<?php echo htmlspecialchars($jobtitle); ?>" required>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="department" class="form-control" id="department" name="department" value="<?php echo htmlspecialchars($department); ?>" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" value="<?php echo htmlspecialchars($gender); ?>" required>
        </div>
        <div class="mb-3">
            <label for="currentPassword" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank if not changing">
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Leave blank if not changing">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Profile</button>
    </form>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
