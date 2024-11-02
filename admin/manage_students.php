<?php
// Include your database connection and check login
include('checklogin.php');

// Set default values
$records_per_page = isset($_GET['records_per_page']) ? (int)$_GET['records_per_page'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Calculate the total number of students
$total_query = "SELECT COUNT(*) as total_students FROM Student";
$total_result = $conn->query($total_query);
$total_students = $total_result->fetch_assoc()['total_students'];

// Fetch students with filters and pagination
$query = "SELECT * FROM Student WHERE
          (Fullname LIKE ? OR StudentID LIKE ? OR Email LIKE ? OR MobileNumber LIKE ?)
          LIMIT ?, ?";
$stmt = $conn->prepare($query);
$search_param = "%$search%";
$stmt->bind_param("ssssii", $search_param, $search_param, $search_param, $search_param, $offset, $records_per_page);
$stmt->execute();
$result = $stmt->get_result();
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


    <title>AUO LIBRARY | MANAGE STUDENTS </title>

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
    <h2 class="text-center">Manage Students</h2>
    <div class="d-flex justify-content-between mb-3">
        <form class="d-flex" method="get" action="">
            <input type="text" name="search" class="form-control" placeholder="Search by Name, ID, Email, or Phone" value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>
        <div>
            <span>Total Students: <?= $total_students ?></span>
            <label for="records_per_page" class="ms-3">Records per page:</label>
            <select name="records_per_page" id="records_per_page" onchange="this.form.submit()" form="pagination-form">
                <option value="10" <?= $records_per_page == 10 ? 'selected' : '' ?>>10</option>
                <option value="25" <?= $records_per_page == 25 ? 'selected' : '' ?>>25</option>
                <option value="50" <?= $records_per_page == 50 ? 'selected' : '' ?>>50</option>
            </select>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Level</th>
                <th>Department</th>
                <th>Key</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['StudentID']) ?></td>
                    <td><?= htmlspecialchars($row['Fullname']) ?></td>
                    <td><?= htmlspecialchars($row['Email']) ?></td>
                    <td><?= htmlspecialchars($row['MobileNumber']) ?></td>
                    <td><?= htmlspecialchars($row['Gender']) ?></td>
                    <td><?= htmlspecialchars($row['Level']) ?></td>
                    <td><?= htmlspecialchars($row['Department']) ?></td>
                    <td><?= htmlspecialchars($row['RecoveryKey']) ?></td>
                    <td>
                        <a href="edit_student.php?id=<?= $row['ID'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_student.php?id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No students found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination controls -->
    <form id="pagination-form" method="get" action="" class="d-flex justify-content-center">
        <input type="hidden" name="records_per_page" value="<?= $records_per_page ?>">
        <?php for ($i = 1; $i <= ceil($total_students / $records_per_page); $i++): ?>
            <a href="?page=<?= $i ?>&records_per_page=<?= $records_per_page ?>&search=<?= urlencode($search) ?>" 
               class="btn <?= $i == $page ? 'btn-primary' : 'btn-outline-primary' ?> mx-1"><?= $i ?></a>
        <?php endfor; ?>
    </form>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
