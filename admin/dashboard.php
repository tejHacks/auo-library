<?php

// Include your database connection file here
include('checklogin.php'); 

// Query Functions
// Query Functions
function getTotalCount($table, $conn) {
    $query = "SELECT COUNT(*) as total FROM $table";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
    return $data['total'];
}

// function getIssuedBooksCount($conn) {
//     $query = "SELECT COUNT(*) as total FROM IssuedBooks";
//     $result = $conn->query($query);
//     $data = $result->fetch_assoc();
//     return $data['total'];
// }

// function getCurrentBorrowedCount($conn) {
//     $query = "SELECT COUNT(*) as total FROM IssuedBooks WHERE return_date IS NULL";
//     $result = $conn->query($query);
//     $data = $result->fetch_assoc();
//     return $data['total'];
// }

// function getOverdueBooksCount($conn) {
//     $query = "SELECT COUNT(*) as total FROM IssuedBooks WHERE due_date < NOW() AND return_date IS NULL";
//     $result = $conn->query($query);
//     $data = $result->fetch_assoc();
//     return $data['total'];
// }

// Fetch Metrics
$total_students = getTotalCount('Student', $conn);
$total_books = getTotalCount('Books', $conn);
$total_librarians = getTotalCount('Librarian', $conn);
$total_suggestions = getTotalCount('Suggestions', $conn);
// $total_issued_books = getIssuedBooksCount($conn);
// $current_borrowed = getCurrentBorrowedCount($conn);
// $overdue_books = getOverdueBooksCount($conn);
$total_lecturers = getTotalCount('Lecturers', $conn);
$borrow_requests = getTotalCount('BorrowRequests', $conn);
$not_yet_returned = $current_borrowed; // same as 'currently borrowed'

// Close the connection
$conn->close();
?>



<!-- THE HTML PAGE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Site Metas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="#343a40">
    <meta name="application-name" content="Achievers University Library">
    <meta name="robots" content="all">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#343a40">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <meta name="author" content="Olamide Olateju Emmanuel">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Achievers University Library, ACHIEVERS UNIVERSITY LIBRARY, AUO library">
   
    <title>ACHIEVERS UNIVERSITY LIBRARY |ADMIN DASHBOARD </title>

    <!-- Stylesheets -->
 

    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
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

<div class="container-fluid my-4 fade-in" style="padding-bottom:120px;">
    <p class="" style="font-size:18px;font-weight:400;">Welcome Back, <?php echo htmlspecialchars($fullName); ?> </p>
    
   
    <hr>
    
    <div id="page-content-wrapper" class="flex-grow-1">
        <div class="container ">
            <h3 class="text-center mt-4">DASHBOARD <i class="fa fa-dashboard"></i></h3><hr>

            <div class="row text-uppercase">
                <!-- The row set for the cards and the details it contains -->
                
                <div class="col-md-3 mb-4">
                    <div class="card bg-light text-success border border-2 border-success ">
                        <div class="card-body text-center">
                            
                        <i class="fa fa-users fa-2x"></i>
                            <h5 class="card-title">Total Students Registered</h5>
                            <p class="card-text"><?php echo $total_students; ?></p>
                            <button class="w-100 btn btn-lg btn-success fw-bold" type="submit" id="submit" name="submit">
                        MANAGE <i class="fa fa-users"></i>
                    </button>
                        </div>
                    </div>
                </div>

                <!-- The next card follows -->

                <div class="col-md-3 mb-4">
                    <div class="card bg-light text-primary border border-2 border-primary">
                        <div class="card-body">
                        <i class="fa fa-book fa-2x"></i>
                            <h5 class="card-title">Total BOOKS AVAILABLE</h5>
                            <p class="card-text"><?php echo $total_books; ?></p>
                            <button class="w-100 btn btn-lg btn-primary fw-bold" type="submit" id="submit" name="submit">
                        MANAGE <i class="fa fa-book"></i>
                    </button>
                        </div>
                    </div>
                </div>


                <!-- the next card follows it too -->
                <div class="col-md-3 mb-4">
                    <div class="card bg-light text-warning border border-2 border-warning">
                        <div class="card-body">
                        <i class="fa fa-address-card fa-2x"></i>
                            <h5 class="card-title">Total Admins </h5>
                            <p class="card-text"><?php echo $total_librarians; ?></p>
                            <button class="w-100 text-light btn btn-lg btn-warning fw-bold" type="submit" id="submit" name="submit">
                        MANAGE <i class="fa fa-user-circle-o"></i>
                    </button>
                        </div>
                    </div>
                </div>

                <!-- and the next too -->
                <div class="col-md-3 mb-4">
                    <div class="card bg-light text-danger border border-2 border-danger">
                        <div class="card-body">
                        <i class="bx bx-chat fa-2x"></i>
                            <h5 class="card-title">Total Suggestions</h5>
                            <p class="card-text"><?php echo $total_suggestions; ?></p>
                            <button class="w-100 btn btn-lg btn-danger fw-bold" type="submit" id="submit" name="submit">
                        MANAGE <i class="bx bx-chat"></i>
                    </button>
                        </div>
                    </div>
                </div>

                <!-- and the next follows it too -->
                <div class="col-md-3 mb-4">
                <div class="card bg-light text-success border border-2 border-success">
                        <div class="card-body">
                        <i class="fa fa-book fa-2x"></i>
                            <h5 class="card-title">Total Books Issued</h5>
                            <p class="card-text"><?php echo $total_issued_books; ?></p>
                            <button class="w-100 btn btn-lg btn-success fw-bold" type="submit" id="submit" name="submit">
                        MANAGE <i class="bx bx-book"></i>
                    </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                <div class="card bg-light text-primary border border-2 border-primary">
                        <div class="card-body">
                        <i class="fa fa-book fa-2x"></i>
                            <h5 class="card-title">Currently Borrowed</h5>
                            <p class="card-text"><?php echo $current_borrowed; ?></p>
                            <button class="w-100 btn btn-lg btn-primary fw-bold" type="submit" id="submit" name="submit">
                            MANAGE <i class="bx bx-book"></i>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                <div class="card bg-light text-warning border border-2 border-warning">
                        <div class="card-body">
                        <i class="fa fa-user-circle fa-2x"></i>
                            <h5 class="card-title">Total Lecturers</h5>
                            <p class="card-text"><?php echo $total_lecturers; ?></p>
                            <button class="w-100 text-light btn btn-lg btn-warning fw-bold" type="submit" id="submit" name="submit">
                        MANAGE <i class="fa fa-book"></i>
                    </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                 <div class="card bg-light text-danger border border-2 border-danger">
                        <div class="card-body">
                        <i class="fa fa-book fa-2x"></i>
                            <h5 class="card-title">Overdue Books</h5>
                            <p class="card-text"><?php echo $overdue_books; ?></p>
                            <button class="w-100 btn btn-lg btn-danger fw-bold" type="submit" id="submit" name="submit">
                        MANAGE <i class="fa fa-book"></i>
                    </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                <div class="card bg-light text-primary border border-2 border-primary">
                        <div class="card-body">
                        <i class="fa fa-book fa-2x"></i>
                            <h5 class="card-title">BORROW requests</h5>
                            <p class="card-text"><?php echo $borrow_requests; ?></p>
                            <button class="w-100 btn btn-lg btn-primary fw-bold" type="submit" id="submit" name="submit">
                            MANAGE <i class="bx bx-book"></i>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                 <div class="card bg-light text-danger border border-2 border-danger">
                        <div class="card-body">
                        <i class="fa fa-book fa-2x"></i>
                            <h5 class="card-title">NOt yet returned</h5>
                            <p class="card-text"><?php echo $$not_yet_returned; ?></p>
                            <button class="w-100 btn btn-lg btn-danger fw-bold" type="submit" id="submit" name="submit">
                        MANAGE <i class="fa fa-book"></i>
                    </button>
                        </div>
                    </div>
                </div>




                <!-- row of the card and its details ends here -->
            </div>

        


        </div>

        <!-- small table outside a corner to see recent stuff done by the librarian -->
        <h2 class="mt-4">Recent Activities</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity</th>
                    </tr>
                </thead>
                <tbody>
                <!-- <?php #while ($activity = mysqli_fetch_assoc($recent_activities)): ?> -->
                    <tr>
                        <td><?php #echo $activity['created_at']; ?>22-23-14</td>
                        <td><?php #echo $activity['description']; ?>Validated a book borrow request</td>
                    </tr>
                    <?php #endwhile; ?>
                </tbody>
            </table>
    </div>
</div>


</body>
<!-- <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script> -->
<script src="../assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</html>