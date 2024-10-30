<?php
include('checklogin.php');   
?>

<!-- THE HTML PAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="green">
    <meta name="application-name" content="Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <title>ACHIEVERS UNIVERSITY LIBRARY | STUDENT DASHBOARD</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">

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

    <div class="container my-4" style="padding-bottom:120px;">
        <p class="fade-in" style="font-size:18px;font-weight:400;">Hi, <?php echo htmlspecialchars($fullName); ?>!</p>
        <hr>

        <div class="row fade-in">
            <!-- Borrow a Book Section -->
            <div class="col-md-6 col-lg-4 py-3">
                <div class="content-box">
                    <h5 class="text-success">Borrow a Book <i class="fa fa-book fa-2x"></i></h5>
                    <p>Borrow a book at the library and pick it up later.</p>
                    <a class="btn btn-outline-success" href="borrow.php">Borrow A Book</a>
                </div>
            </div>

            <!-- Search for a Book Section -->
            <div class="col-md-6 col-lg-4 py-3">
                <div class="content-box">
                    <h5 class="text-success">Find A Book <i class="fa fa-search fa-2x"></i></h5>
                    <p>Quickly find a book by title, author, or keyword.</p>
                    <a class="btn btn-outline-success" href="book_search.php">Search for A Book</a>
                </div>
            </div>

            <!-- Reading Plans Section -->
            <div class="col-md-6 col-lg-4 py-3">
                <div class="content-box">
                    <h5 class="text-success">Need a Reading Plan? <i class="fa fa-calendar-check-o fa-2x"></i></h5>
                    <p>Explore reading plans to study effectively.</p>
                    <a class="btn btn-outline-success" href="reading_plans.php">Explore Study Plans</a>
                </div>
            </div>

            <!-- Inspirational Quotes Section -->
            <div class="col-md-6 col-lg-4 py-3">
                <div class="content-box">
                    <h5 class="text-success">Need Inspiration? <i class="fa fa-quote-right fa-2x"></i></h5>
                    <p>Read quotes from inspiring individuals.</p>
                    <a class="btn btn-outline-success" href="quotes.php">Read Quotes</a>
                </div>
            </div>

            <!-- Academic Help Section -->
            <div class="col-md-6 col-lg-4 py-3">
                <div class="content-box">
                    <h5 class="text-success">Academic Help <i class="fa fa-life-ring fa-2x"></i></h5>
                    <p>Reach out to our counselors for guidance.</p>
                    <a class="btn btn-outline-success" href="request_help.php">Request Help</a>
                </div>
            </div>

            <!-- Wishlist Section -->
            <div class="col-md-6 col-lg-4 py-3">
                <div class="content-box">
                    <h5 class="text-success">Wishlist <i class="fa fa-heart fa-2x"></i></h5>
                    <p>Create a list of books to read or study later.</p>
                    <a class="btn btn-outline-success" href="wishlist_start.php">Start a Wishlist</a>
                </div>
            </div>

            <!-- To-Do List Section -->
            <div class="col-md-6 col-lg-4 py-3">
                <div class="content-box">
                    <h5 class="text-success">To-Do List <i class="fa fa-list-ol fa-2x"></i></h5>
                    <p>Stay organized with a personalized checklist.</p>
                    <a class="btn btn-outline-success" href="to_do.php">Create a To-Do List</a>
                </div>
            </div>

            <!-- Study Materials Section -->
            <div class="col-md-6 col-lg-4 py-3">
                <div class="content-box">
                    <h5 class="text-success">Study Materials <i class="fa fa-file-text-o fa-2x"></i></h5>
                    <p>Request study materials from the library.</p>
                    <a class="btn btn-outline-success" href="materials.php">View Study Materials</a>
                </div>
            </div>

            <!-- Feedback Section -->
            <div class="col-md-6 col-lg-4 py-3">
                <div class="content-box">
                    <h5 class="text-success">Feedback <i class="fa fa-star-o fa-2x"></i></h5>
                    <p>Share suggestions to improve the platform.</p>
                    <a class="btn btn-outline-success" href="suggest.php">Give Feedback</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
