<?php
// Ensure user is logged in
include('checklogin.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentID = htmlspecialchars($studentID) ?? ''; 
    $experience = $_POST['experience'] ?? '';
    $appRating = $_POST['app_rating'] ?? '';
    $featureRequest = $_POST['feature_request'] ?? '';
    $additionalFeedback = $_POST['additional_feedback'] ?? '';

    // Insert feedback into the database
    $sql = "INSERT INTO Suggestions (student_id, experience, app_rating, feature_request, additional_feedback) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $studentID, $experience, $appRating, $featureRequest, $additionalFeedback);

    if ($stmt->execute()) {
        $message = "Thank you for your feedback!";
    } else {
        $message = "Error submitting feedback.";
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
    <h2>We Value Your Feedback</h2>
    <p>Your input helps us improve. Please take a moment to share your thoughts.</p>

    <?php if (isset($message)): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="experience">1. How has your reading experience been so far?</label>
            <textarea class="form-control" id="experience" name="experience" required></textarea>
        </div>

        <div class="form-group">
            <label for="app_rating">2. How would you rate the app on a scale of 1 to 5?</label>
            <select class="form-control" id="app_rating" name="app_rating" required>
                <option value="" disabled selected>Select a rating</option>
                <option value="1">1 - Very Poor</option>
                <option value="2">2 - Poor</option>
                <option value="3">3 - Average</option>
                <option value="4">4 - Good</option>
                <option value="5">5 - Excellent</option>
            </select>
        </div>

        <div class="form-group">
            <label for="feature_request">3. Any feature requests? (optional)</label>
            <textarea class="form-control" id="feature_request" name="feature_request"></textarea>
        </div>

        <div class="form-group">
            <label for="additional_feedback">4. Any additional feedback or comments?</label>
            <textarea class="form-control" id="additional_feedback" name="additional_feedback"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit Feedback</button>
    </form>
</div>
</body>
</html>
