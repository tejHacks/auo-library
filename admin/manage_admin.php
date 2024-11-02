<?php
// Include database connection and authentication file
include('checklogin.php');

// Fetch all librarians from the database
$query = "SELECT * FROM Librarian";
$result = $conn->query($query);

if ($result === false) {
    echo "<div class='alert alert-danger'>Error fetching librarians: " . $conn->error . "</div>";
}

// Handle deletion of a librarian
if (isset($_GET['delete'])) {
    $deleteID = $_GET['delete'];
    $deleteQuery = "DELETE FROM Librarian WHERE ID = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    
    if ($deleteStmt) {
        $deleteStmt->bind_param("i", $deleteID);
        if ($deleteStmt->execute()) {
            echo "<div class='alert alert-success'>Librarian deleted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting librarian: " . $deleteStmt->error . "</div>";
        }
        $deleteStmt->close();
    }
}

// Handle updating of librarian details
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_librarian'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $librarianID = $_POST['librarianID'];
    $librarianEmail = $_POST['librarianEmail'];
    $contact = $_POST['contact'];
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $jobTitle = $_POST['jobTitle'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];

    $updateQuery = "UPDATE Librarian SET Fullname=?, LibrarianID=?, LibrarianEmail=?, Contact=?, Password=?, JobTitle=?, Department=?, Gender=? WHERE ID=?";
    $updateStmt = $conn->prepare($updateQuery);

    if ($updateStmt) {
        $updateStmt->bind_param("ssssssssi", $fullname, $librarianID, $librarianEmail, $contact, $password, $jobTitle, $department, $gender, $id);
        if ($updateStmt->execute()) {
            echo "<div class='alert alert-success'>Librarian updated successfully!</div>";
            header("location:manage_admin.php");
        } else {
            echo "<div class='alert alert-danger'>Error updating librarian: " . $updateStmt->error . "</div>";
        }
        $updateStmt->close();
    }
}
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
   
    <title>AUO LIBRARY | Manage Librarians</title> 
   

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
</head>
<body>
<?php include('header.php'); ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Manage Librarians</h2>

    <h4>Add New Librarian</h4>
    <form method="POST" action="add_librarian.php">
        <button type="submit" class="btn btn-primary">Add Librarian</button>
    </form>

    <h4 class="mt-4">Registered Librarians</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Librarian ID</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Role</th>
                <th>Job Title</th>
                <th>Department</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['ID']) ?></td>
                    <td><?= htmlspecialchars($row['Fullname']) ?></td>
                    <td><?= htmlspecialchars($row['LibrarianID']) ?></td>
                    <td><?= htmlspecialchars($row['LibrarianEmail']) ?></td>
                    <td><?= htmlspecialchars($row['Contact']) ?></td>
                    <td><?= htmlspecialchars($row['Role']) ?></td>
                    <td><?= htmlspecialchars($row['JobTitle']) ?></td>
                    <td><?= htmlspecialchars($row['Department']) ?></td>
                    <td><?= htmlspecialchars($row['Gender']) ?></td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['ID'] ?>">Edit</button>
                        <!-- Delete Link -->
                        <a href="?delete=<?= $row['ID'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this librarian?');">Delete</a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?= $row['ID'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Librarian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['ID']) ?>">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="fullname" value="<?= htmlspecialchars($row['Fullname']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="librarianID" class="form-label">Librarian ID</label>
                                        <input type="text" class="form-control" name="librarianID" value="<?= htmlspecialchars($row['LibrarianID']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="librarianEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="librarianEmail" value="<?= htmlspecialchars($row['LibrarianEmail']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="contact" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" name="contact" value="<?= htmlspecialchars($row['Contact']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Leave blank to keep current password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jobTitle" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" name="jobTitle" value="<?= htmlspecialchars($row['JobTitle']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <input type="text" class="form-control" name="department" value="<?= htmlspecialchars($row['Department']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" name="gender" required>
                                            <option value="Male" <?= $row['Gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                                            <option value="Female" <?= $row['Gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                                            <option value="Other" <?= $row['Gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="update_librarian" class="btn btn-primary">Update Librarian</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
