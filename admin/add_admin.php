<?php
// Include database connection and authentication file
include('checklogin.php');

// Function to generate a random recovery key
function generateRecoveryKey($librarianID) {
    $randomString = bin2hex(random_bytes(4)); // Generates a random string of 8 characters
    return $librarianID . '-' . strtoupper($randomString);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $librarianID = $_POST['librarianID'];
    $librarianEmail = $_POST['librarianEmail'];
    $contact = $_POST['contact'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $jobTitle = $_POST['jobTitle'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];

    // Generate recovery key
    $recoveryKey = generateRecoveryKey($librarianID);

    // Insert query
    $query = "INSERT INTO Librarian (Fullname, LibrarianID, LibrarianEmail, Contact, Password, RecoveryKey, JobTitle, Department, Gender)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sssssssss", $fullname, $librarianID, $librarianEmail, $contact, $password, $recoveryKey, $jobTitle, $department, $gender);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Librarian added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding librarian: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Failed to prepare statement: " . $conn->error . "</div>";
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


    <title>AUO LIBRARY | REGISTER AN ADMIN</title>

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
    <h2 class="text-center mb-4">Add New Librarian</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname" required>
        </div>
        <div class="mb-3">
            <label for="librarianID" class="form-label">Librarian ID</label>
            <input type="text" class="form-control" name="librarianID" required>
        </div>
        <div class="mb-3">
            <label for="librarianEmail" class="form-label">Email</label>
            <input type="email" class="form-control" name="librarianEmail" required>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="text" class="form-control" name="contact" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="mb-3">
            <label for="jobTitle" class="form-label">Job Title</label>
            <input type="text" class="form-control" name="jobTitle" required>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" name="department" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Librarian</button>
    </form>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
