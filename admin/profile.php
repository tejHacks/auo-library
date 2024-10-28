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
    <p class=" fade-in" style="font-size:18px;font-weight:400;">Hey, <?php echo htmlspecialchars($fullName); ?> </p>
    <hr>

    
    <div class="row fade-in">


    <div id="page-content-wrapper" class="flex-grow-1">
        <div class="container-fluid ">
            <h5 class="mt-4">EDIT YOUR PROFILE</h5><hr>
    <div class="row mb-4">
      
        <div class="col-md-9">
            <table class="table">
                <tbody>
                    
                    <tr>
                        <th>Full name:</th>
                        <td><?php echo htmlspecialchars($fullName); ?></td>
                    </tr>
                     <tr>
                        <th>Admin Email:</th>
                        <td><?php echo htmlspecialchars($email); ?></td>
                    </tr>
                    <tr>
                        <th>Admin ID/ Number:</th>
                        <td><?php echo htmlspecialchars($adminid); ?></td>
                    </tr>
                    <tr>
                        <th>Mobile:</th>
                        <td><?php echo htmlspecialchars($contact); ?></td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td><?php echo htmlspecialchars($status); ?></td>
                    </tr>
                    <tr>
                        <th>Role:</th>
                        <td><?php echo htmlspecialchars($role); ?></td>
                    </tr>
                    <tr>
                        <th>Job Title:</th>
                        <td><?php echo htmlspecialchars($jobtitle); ?></td>
                    </tr>
                    <tr>
                        <th>Department:</th>
                        <td><?php echo htmlspecialchars($department); ?></td>
                    </tr>
                    <tr>
                        <th>Gendr:</th>
                        <td><?php echo htmlspecialchars($gender); ?></td>
                    </tr>
                   
                    
                    <tr>
                        <th>Registered on:</th>
                        <td><?php echo htmlspecialchars($regDate); ?></td>
                    </tr>
                     <tr>
                        <th>Updated on:</th>
                        <td><?php echo htmlspecialchars($updatedDate); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
    <button onclick="window.print()" class="btn btn-danger">Print Profile</button>
    <a href="password-change.php" class=" text-light btn btn-success">Change Password</a>
</div>

        </div>

        </div>

        </div>
        </div>
        </body>

        </html>