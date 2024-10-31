<?php
session_start();
include('checklogin.php');
include('config.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $planName = $_POST['plan_name'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $studentID =  htmlspecialchars($studentID);

    // Insert into database
    $sql = "INSERT INTO `ReadingPlans` (`student_id`, `plan_name`, `start_date`, end_date, `description`,`status`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $studentID, $planName, $startDate, $endDate, $description,$status);

    if ($stmt->execute()) {
        echo "<script>alert('Reading plan added successfully!'); window.location.href='reading_plans.php';</script>";
    } else {
        echo "<script>alert('Error adding reading plan.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="green">
    <title>Add Reading Plan</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">

    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
<?php include("nav.php"); ?>

<div class="container form-container">
    <h2 class="text-center">Add a New Reading Plan</h2>
    <p class="text-muted text-center">Create a new reading schedule to help you stay on track.</p>
    <hr>

    <form action="add_plan.php" method="POST">
        <div class="mb-3">
            <label for="plan_name" class="form-label">Plan Name</label>
            <input type="text" class="form-control" id="plan_name" name="plan_name" required>
        </div>
        
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Optional description of your reading plan"></textarea>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Plan</button>
            <a href="reading_plans.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to Plans</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
