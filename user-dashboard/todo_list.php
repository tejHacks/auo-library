<?php
// Ensure user is logged in and session contains user information
include('checklogin.php');
include('config.php'); // Database connection

// Retrieve user's to-do tasks from the database
$studentID = htmlspecialchars($studentID) ?? '';
$tasks = [];
if ($studentID) {
    $sql = "SELECT * FROM ToDoList WHERE student_id = ? ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="green">
    <meta name="application-name" content="Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <meta name="author" content="Olamide Olateju Emmanuel">
    <title>ACHIEVERS UNIVERSITY LIBRARY | TO-DO LIST</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
<?php include("nav.php"); ?>

<div class="container my-4">
    <h2 class="text-center">Your To-Do List</h2>

    <!-- Table of To-Do Tasks -->
    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Task ID</th>
                    <th>Task Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($tasks)): ?>
                    <?php foreach ($tasks as $task) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($task['task_id']); ?></td>
                            <td><?php echo htmlspecialchars($task['task_description']); ?></td>
                            <td><?php echo htmlspecialchars($task['due_date']); ?></td>
                            <td><?php echo htmlspecialchars($task['status']); ?></td>
                            <td>
                                <a href="edit_task.php?id=<?php echo htmlspecialchars($task['task_id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="delete_task.php?id=<?php echo htmlspecialchars($task['task_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No tasks found. Start by adding one!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Add New Task Button -->
    <div class="text-center mt-4">
        <a href="add_task.php" class="btn btn-success">Add New Task</a>
    </div>
</div>
</body>
</html>
