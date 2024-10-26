<?php
session_start();

// Include your database connection
include('includes/config.php'); 

function validateMatric($studentId) {
    return preg_match("/^AU[0-9]{2}[A-Z]{2}[0-9]{4}/", $studentId);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = htmlspecialchars($_POST["studentID"]);
    $user_password = htmlspecialchars($_POST["password"]);

    // Validate matric number
    if (!validateMatric($studentId)) {
        echo "<div class='alert alert-danger mt-3' role='alert'>Invalid matric number format (use the format AU10AN1234).
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        exit();
    }
    else{

    // Retrieve hashed password from the database
    $stmt = $conn->prepare("SELECT `Password` FROM `Student` WHERE `StudentID` = ?");
    $stmt->bind_param("s", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row["Password"];

        // Verify the password
        if (password_verify($user_password, $stored_password)) {
            $_SESSION['studentID'] = $studentId;
            header("location:user-dashboard/home.php");
            exit();
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Incorrect Password, please try again.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    } else {
        echo "<div class='alert alert-danger mt-3' role='alert'>Your matric number was not found.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }

    $stmt->close();
}

}
$conn->close();
?>




<!-- THE HTML PAGE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Site Metas -->
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
    <title>ACHIEVERS UNIVERSITY LIBRARY | STUDENT LOGIN </title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" type="text/css" href="assets/boxicons/css/boxicons.min.css">
    

<!-- few scripts -->
    <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.js" defer></script>
    <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="assets/font-awesome/" defer></script>
    <!-- other sylesheets -->
    <link rel="stylesheet" href="assets/boxicons/css/boxicons.css">
    <link rel="stylesheet" href="assets/boxicons/css/boxicons.min.css">

    <link rel="stylesheet" href="assets/style.css">
    <link rel="icon" href="assets/school.png" type="image/png">
</head>

<body class="text-center">
  

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <a href="#">

                    <img src="assets/school.png" class="text-center" width="100">
                </a>
                <h4 class="text-dark text-center text-uppercase fw-bold">WELCOME TO THE ACHIEVERS UNIVERSITY LIBRARY
                </h4>
                <p style="font-size:19px;font-weight:600;" class="text-dark fw-600 text-center text-uppercase">Login</p>


                <form method="POST" enctype="application/x-www-form-urlencoded" action="login_student.php"
                    class="text-center my-3 p-4 rounded border border-2 border-success" accept-charset="UTF-8" autocomplete="off"
                    id="registrationForm">

                    <div class="form-group text-left">
                        <label for="studentId">Matric Number</label>
                        <input type="text" class="form-control" name="studentID" id="studentId" placeholder="AU24CC5099">
                        <span id="user-availability-status1" style="font-size:12px;color:red;float:left;"></span>
                    </div><br>

                    <div class="form-group text-left">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="password" id="Password"
                            placeholder="1234#2023_5happyboys">
                        <span id="user-password" style="font-size:12px;color:red;float:left;"></span>
                    </div><br>
                    <div class="form-group text-left col-6" style="position:relative;top: -11px;right:50px;">
                        <p id="checkpassword"><input type="checkbox" id="checkPwd" onclick="showPassword()"> Show
                            Password </p>
                    </div>

                    <button class="w-100 btn btn-lg btn-success" type="submit" name="login" id="submit">
                        LOGIN <i class="fa fa-user"></i>
                    </button>


                </form>


            </div>
        </div>
    </div>



    <div class="form-actions">

        <p>
            I don't have an account
            <a style="text-decoration: none;"  class="link-primary" href="signup_student.php">
                Create one here 
            </a>
        </p>
        <p>
            I forgot my password
            <a style="text-decoration: none;" class="link-danger" href="reset-password.php">
                Reset Here.
            </a>
        </p>

    </div>
    <footer class="row mt-5 align-items-center justify-content-center">
        <div class="col-12">

            <p class="mt-5 mb-3 text-muted">&copy;<span id="year"></span> ACHIEVERS UNIVERSITY OWO.All rights
                reserved
            </p>
        </div>
    </footer>
</body>


<script src="assets/bootstrap-5.0.2-dist/js/bootstrap.min.js" defer></script>
<script src="assets/vendor/jquery/jquery.min.js" defer></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js" defer></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js" defer></script>
<script src="assets/vendor/modernizr/modernizr.js" defer></script>
<script src="assets/vendor/jquery-cookie/jquery.cookie.js" defer></script>
<script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js" defer></script>
<script src="assets/vendor/jquery-validation/jquery.validate.js" defer></script>
<script src="assets/vendor/jquery-validation/jquery.validate.min.js" defer></script>
<script src="assets/vendor/switchery/switchery.min.js" defer></script>

<script>
function loadwarn() {

    let warn = document.getElementById('warn-user');
    warn.innerHTML = 'Fill in the required data please';
}
</script>

<script>
let password = document.getElementById("Password");

function showPassword() {
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password"
    }
}
// get the year and load it out
// Get the year
let year = document.getElementById("year");
let dateYear = new Date().getFullYear();
year.innerHTML = dateYear;
</script>



</html>