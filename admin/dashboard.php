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
    <meta name="theme-color" content="#7952b3">

    <title>ACHIEVERS UNIVERSITY LIBRARY |ADMIN DASHBOARD </title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="../assets/boxicons/css/boxicons.min.css">
    


    <link rel="icon" href="../assets/school.png" type="image/png">
    <style>
            ::-webkit-scrollbar{
    background: #272727;
   width:8px;
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
 

.card {
    height: 180px; /* Increase card height */
    display: flex;
    padding:10px;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem; /* Increase font size for card text */
}

.card-body {
    text-align: center;
}

  </style>


</head>




<body>
<?php include("header.php"); ?>

<div class="container my-4" style="padding-bottom:120px;">
    <p class=" fade-in" style="font-size:18px;font-weight:400;">Welcome Back, <?php echo htmlspecialchars($fullName); ?> </p>
    <hr>

    
    <div class="row fade-in">


    <div id="page-content-wrapper" class="flex-grow-1">
        <div class="container-fluid ">
            <h1 class="mt-4">Dashboard</h1><hr>

            <div class="row text-uppercase">
                <div class="col-md-6 py-6 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body text-center">
                            
                        <i class="fa fa-users fa-5x"></i>
                            <h5 class="card-title">Total Students Registered</h5>
                            <p class="card-text"><?php echo $total_students; ?>1032</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total BOOKS AVAILABLE</h5>
                            <p class="card-text"><?php echo $total_patients; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Staff Registered</h5>
                            <p class="card-text"><?php echo $total_appointments; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Suggestions</h5>
                            <p class="card-text"><?php echo $total_counseling; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                        <i class="fa fa-book fa-5x"></i>
                            <h5 class="card-title">Total Issued Books</h5>
                            <p class="card-text"><?php echo $total_counseling; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Currently Borrowed Books</h5>
                            <p class="card-text"><?php echo $total_counseling; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Tutors</h5>
                            <p class="card-text"><?php echo $total_counseling; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5 class="card-title">Overdue Books</h5>
                            <p class="card-text"><?php echo $total_counseling; ?></p>
                        </div>
                    </div>
                </div>

            </div>


            <h2 class="mt-4">Recent Activities</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($activity = mysqli_fetch_assoc($recent_activities)): ?>
                    <tr>
                        <td><?php echo $activity['created_at']; ?></td>
                        <td><?php echo $activity['description']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>







    <!-- END OF THE DIV CONTAINER -->
    </div>

</body>
<!-- 
    <script src="../assets/vendor/jquery/jquery.min.js" defer></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.js" defer></script>
    <script src="../assets/vendor/modernizr/modernizr.js" defer></script>
    <script src="../assets/vendor/jquery-cookie/jquery.cookie.js" defer></script>
    <script src="../assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js" defer></script>
    <script src="../assets/vendor/jquery-validation/jquery.validate.js" defer></script>
    <script src="../assets/vendor/jquery-validation/jquery.validate.min.js" defer></script>
    <script src="../assets/vendor/switchery/switchery.min.js" defer></script> -->
    
    <!-- few scripts -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="../assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

     <!-- <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.min.js" defer></script> -->
    <!-- <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script> -->
    <!-- <script src="../assets/popper/popper.min.js" defer></script> -->
    <!-- <script src="../assets/popper/popper.min.js.map.json" defer></script> -->

</html>