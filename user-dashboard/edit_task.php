<?php
include('checklogin.php');
include('config.php');

$taskId = $_GET['id'] ?? null;

if ($taskId) {
    $sql = "SELECT * FROM ToDoList WHERE task_id = ? AND student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $taskId, $studentID);
    $stmt->execute();
    $task = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $taskDescription = $_POST['task_description'];
    $dueDate = $_POST['due_date'];
    $status = $_POST['status'];

    $sql = "UPDATE ToDoList SET task_description = ?, due_date = ?, status = ? WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $taskDescription, $dueDate, $status, $taskId);
    
    if ($stmt->execute()) {
        header("Location: todo_list.php?msg=Task updated successfully");
        exit();
    } else {
        echo "Error updating task.";
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
    <h2>Edit Task</h2>
    <?php if ($task): ?>
        <form method="POST">
            <div class="form-group">
                <label for="task_description">Task Description</label>
                <textarea class="form-control" id="task_description" name="task_description" required><?php echo htmlspecialchars($task['task_description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="<?php echo htmlspecialchars($task['due_date']); ?>">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="Pending" <?php echo ($task['status'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
                    <option value="Completed" <?php echo ($task['status'] === 'Completed') ? 'selected' : ''; ?>>Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Task</button>
        </form>
    <?php else: ?>
        <p>Task not found.</p>
    <?php endif; ?>
</div>
</body>
</html>
