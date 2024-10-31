<?php
// Ensure user is logged in and session contains user information
include('checklogin.php');
include('config.php'); // Database connection

// Initialize variables
$plan_id = htmlspecialchars($_GET['id'] ?? '');
$plan = null;

// Fetch the reading plan details if plan_id is provided
if ($plan_id) {
    $sql = "SELECT * FROM ReadingPlans WHERE plan_id = ? AND student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $plan_id, $studentID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $plan = $result->fetch_assoc();
    } else {
        // Redirect if no plan is found
        header("Location: reading_plans.php");
        exit();
    }
    $stmt->close();
}

// Update plan if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plan_name = htmlspecialchars($_POST['plan_name'] ?? '');
    $start_date = htmlspecialchars($_POST['start_date'] ?? '');
    $end_date = htmlspecialchars($_POST['end_date'] ?? '');
    $status = htmlspecialchars($_POST['status'] ?? 'Pending');
    
    // Update the plan in the database
    $sql = "UPDATE ReadingPlans SET plan_name = ?, start_date = ?, end_date = ?, status = ? WHERE plan_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $plan_name, $start_date, $end_date, $status, $plan_id);
    
    if ($stmt->execute()) {
        header("Location: reading_plans.php?message=Plan updated successfully");
        exit();
    } else {
        $error = "Error updating plan: " . $stmt->error;
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
    <title>ACHIEVERS UNIVERSITY LIBRARY | EDIT READING PLAN</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
<?php include("nav.php"); ?>

<div class="container my-4">
    <h2 class="text-center">Edit Reading Plan</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="plan_name" class="form-label">Plan Name</label>
            <input type="text" class="form-control" id="plan_name" name="plan_name" value="<?php echo htmlspecialchars($plan['plan_name'] ?? ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo htmlspecialchars($plan['start_date'] ?? ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo htmlspecialchars($plan['end_date'] ?? ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Pending" <?php echo ($plan['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="In Progress" <?php echo ($plan['status'] == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                <option value="Completed" <?php echo ($plan['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Update Plan</button>
            <a href="reading_plans.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
