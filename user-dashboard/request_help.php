<?php
include('checklogin.php');   
?>

<!-- THE HTML PAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library, Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <meta name="application-name" content="Achievers University Library">
    <meta name="theme-color" content="black">
    <title>AUO LIBRARY | REQUEST HELP</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">

    <!-- Scripts -->
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>


    <!-- Scripts -->
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        /* Scrollbar Styling */
        ::-webkit-scrollbar { background: #272727; width: 12px; }
        ::-webkit-scrollbar-thumb { background: #808080; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background-color: #666; }

        /* Container Styles */
        .content-box {
            border-radius: 10px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .content-box:hover {
            transform: translateY(-5px);
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <?php include("nav.php"); ?>

  
<div class="container my-4">
    <h2>We Value You and Your Success is our Priority</h2>
    <p>PLEASE DO NOTE THAT WE DO NOT SHARE YOUR INFORMATION WITH ANYONE.</p>

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