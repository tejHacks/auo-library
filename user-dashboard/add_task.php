<?php
// Ensure user is logged in
include('checklogin.php');
include('config.php'); // Database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentID = htmlspecialchars($studentID) ?? ''; 
    $taskDescription = $_POST['task_description'] ?? '';
    $dueDate = $_POST['due_date'] ?? '';
    $status = 'Pending'; 

    $sql = "INSERT INTO ToDoList (student_id, task_description, due_date, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $studentID, $taskDescription, $dueDate, $status);

    if ($stmt->execute()) {
        header("Location: todo_list.php?msg=Task added successfully");
        exit();
    } else {
        echo "Error adding task.";
    }
    $stmt->close();
}
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
    <title>ACHIEVERS UNIVERSITY LIBRARY | READING PLANS</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
<?php include("nav.php"); ?>

<div class="container my-4">
    <h2>Add New Task</h2>
    <form method="POST">
        <div class="form-group">
            <label for="task_description">Task Description</label>
            <textarea class="form-control" id="task_description" name="task_description" required></textarea>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add Task</button>
    </form>
</div>
</body>
</html>
