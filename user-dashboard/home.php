<?php

include('checklogin.php');   
?>



<!-- THE HTML PAGE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Site Metas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="green">
    <meta name="application-name" content="Achievers University Library">
    <meta name="robots" content="all">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="green">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <meta name="author" content="Olamide Olateju Emmanuel">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Achievers University Library">
    
    <meta name="theme-color" content="#19B10E">
    <title>ACHIEVERS UNIVERSITY LIBRARY | STUDENT DASHBOARD </title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.min.css">
    

<!-- few scripts -->
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.js" defer></script>
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="../assets/font-awesome/" defer></script>
    <!-- other sylesheets -->
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">

    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
    <style>
            ::-webkit-scrollbar{
    background: #272727;
   width:12px;
}

::-webkit-scrollbar-thumb{
    background: #808080;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover{
    background-color: #666;
}

</style>


<style>
     

     /* Container Styles */
     .content-box {
         border-radius: 10px;
         background-color: #f8f9fa;
         padding: 20px;
         /* border:2px solid black; */
         box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
         transition: transform 0.3s ease, background-color 0.3s ease;
     }

     .content-box:hover {
         transform: translateY(-5px);
         background-color: #f1f1f1;
     }


     /* Animations */
     .fade-in {
         opacity: 0;
         transform: translateX(-50px);
         animation: fadeIn 0.5s ease forwards;
     }

     @keyframes fadeIn {
         to {
             opacity: 1;
             transform: translateX(0);
         }
     }
 </style>

</head>




<body>
<?php include("nav.php"); ?>

<div class="container my-4" style="padding-bottom:120px;">
    <p class=" fade-in" style="font-size:18px;font-weight:400;">Hi, <?php echo htmlspecialchars($fullName); ?> </p>
    <hr>

    
    <div class="row fade-in">

    <div class="col-md-12 py-3">
            <div class="content-box">
                <h5 class="text-success">Borrow a book? <i class="fa fa-book fa-2x "></i></h5>
                <p>Borrow a book at the library and grab it later.</p>
                <a class="btn btn-outline-success" href="borrow.php">Borrow A Book</a>
            </div>
        </div>

        <div class="col-md-12 py-3">
            <div class="content-box">
                <h5 class="text-success">Find A Book? <i class="fa fa-book fa-2x "></i></h5>
                <p>Finding a book in the library has never been easier,just type in a title,author or a related keyword.</p>
                <a class="btn btn-outline-success" href="book_search.php">Search for A Book</a>
            </div>
        </div>



        <div class="col-md-12 py-3">
            <div class="content-box">
                <h5  class="text-success">Need a reading plan? <i class="fa fa-calendar-check-o fa-2x "></i></h5>
                <p>Explore various reading plans tailored to help you study effectively.</p>
                <a class="btn btn-outline-success" href="reading_plans.php">Explore Study Plans</a>
            </div>
        </div>

        <div class="col-md-12 py-3">
            <div class="content-box">
                <h5  class="text-success">Need some inspiration? <i class="fa fa-quote-right fa-2x "></i></h5>
                <p>Read inspirational quotes from famous individuals who later succeeded in life.</p>
                <a class="btn btn-outline-success" href="quotes.php">Read Quotes</a>
            </div>
        </div>

        <div class="col-md-12 py-3">
            <div class="content-box">
                <h5  class="text-success">Need Academic Advice or Help? <i class="fa fa-quote-right fa-2x "></i></h5>
                <p>Reach out to our group of experienced counselors and facilitators.</p>
                <a class="btn btn-outline-success" href="request_help.php">Reach out To Us</a>
            </div>
        </div>


        <div class="col-md-12 py-3">
            <div class="content-box">
                <h5  class="text-success">Wishlist <i class="fa fa-quote-right fa-2x "></i></h5>
                <p>Create a list of books you wanna read or study later on.</p>
                <a class="btn btn-outline-success" href="wishlist_start.php">Start a wishlist</a>
            </div>
        </div>


        <div class="col-md-12 py-3">
            <div class="content-box">
                <h5  class="text-success">Need a to-do list<i class="fa fa-list-ol fa-2x "></i></h5>
                <p>Feel overwhelmed and need a priority check list,we've got you covered.</p>
                <a class="btn btn-outline-success" href="to_do.php">Create a to-do list today</a>
            </div>
        </div>

        <div class="col-md-12 py-3">
            <div class="content-box">
                <h5  class="text-success">Need some materials<i class="fa fa-list-ol fa-2x "></i></h5>
                <p>Request materials from the library.</p>
                <a class="btn btn-outline-success" href="materials.php">View Study Materials</a>
            </div>
        </div>

        <div class="col-md-12 py-3">
            <div class="content-box">
                <h5  class="text-success">Got a suggestion for the platform?<i class="fa fa-star-o fa-2x "></i></h5>
                <p>Help us to help you,we are concerned about making this platform better and effective,got any ideas for improvement for us,we would love to hear your thoughts.</p>
                <a class="btn btn-outline-success" href="suggest.php">Give us your feedback</a>
            </div>
        </div>

        







    <!-- END OF THE DIV CONTAINER -->
    </div>

</body>
</html>