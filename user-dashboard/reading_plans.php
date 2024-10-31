<?php
// Ensure user is logged in and session contains user information
include('checklogin.php');
include('config.php'); // Database connection for reading plans

// Retrieve user's reading plans from the database
$studentID = htmlspecialchars($studentID) ?? '';
$readingPlans = [];
if ($studentID) {
    $sql = "SELECT * FROM ReadingPlans WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $readingPlans[] = $row;
    }
    $stmt->close();
}
$conn->close();

// Fetch a random motivational quote
$quotes = [
    "Keep reading. It's one of the most marvelous adventures anyone can have.",
    "Reading is essential for those who seek to rise above the ordinary.",
    "A reader lives a thousand lives before he dies.",
    "Today a reader, tomorrow a leader.",
];
$quote = $quotes[array_rand($quotes)];
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
    <p class="fade-in" style="font-size:18px;font-weight:400;">Hi, <?php echo htmlspecialchars($fullName); ?>! Today is <?php echo date("l, F j, Y"); ?>.</p>
    <hr>

    <!-- Motivational Quote -->
    <div class="text-center mb-4">
        <blockquote class="blockquote">
            <p class="mb-3"><?php echo $quote; ?></p>
            <footer class="blockquote-footer">Your daily dose of motivation</footer>
        </blockquote>
    </div>

    <!-- Reading Plans Section -->
    <h2 class="text-center">YOUR READING PLANS</h2>
    
    <!-- Table of Reading Plans -->
    <div class="table-responsive">
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Plan ID</th>
                    <th>Plan Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($readingPlans)): ?>
                    <?php foreach ($readingPlans as $plan) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($plan['plan_id']); ?></td>
                            <td><?php echo htmlspecialchars($plan['plan_name']); ?></td>
                            <td><?php echo htmlspecialchars($plan['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($plan['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($plan['status']); ?></td>
                            <td>
                                <a href="edit_plan.php?id=<?php echo htmlspecialchars($plan['plan_id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="delete_plan.php?id=<?php echo htmlspecialchars($plan['plan_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this plan?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No reading plans found. Start by adding one!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Add New Plan Button -->
    <div class="text-center mt-4">
        <a href="add_plan.php" class="btn btn-success">Add New Reading Plan</a>
    </div>
</div>
</body>
</html>
