<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap CSS -->
    <link href="../assets/bootstrap-5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> 
        html, body {
            overflow-x: hidden; /* Prevent scroll on narrow devices */
        }
        body {
            padding-top: 56px; /* Space for navbar */
        }
        .navbar {
            background-color: #343a40; /* Navbar background color */
            }
        .nav-link {
            color: white; /* Navbar link color */
            font-weight: bolder;
            font-size: 1.1em;
        }
        .nav-link:hover {
            color: #007bff; /* Hover color */
        }
        .dropdown-menu {
            background-color: #343a40; /* Dropdown background color */
        }
        .dropdown-item {
            color: white; /* Dropdown item color */
        }
        .dropdown-item:hover {
            background-color: #007bff; /* Hover color for dropdown items */
        }
    </style>
</head>
<body class="bg-light">

<!-- Combined Navbar -->
<nav class="navbar navbar-expand-lg text-light fixed-top navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php $_SERVER['SCRIPT_NAME']; ?>">
            <img src="../assets/school.png" alt="Logo" height="30">
        </a>
        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dashboard.php">
                        <i class="bx bx-library"></i> AUO LIBRARY
                    </a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link" href="profile.php">
                        <i class="bx bx-bell"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="switch_account.php">
                        <i class="bx bx-recycle"></i> Switch Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="settings.php">
                        <i class="bx bx-cog"></i> Settings
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="allBooksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-library"></i> ALL BOOKS <span class="badge bg-light text-dark rounded-pill align-text-bottom">567</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="allBooksDropdown">
                        <li><a class="dropdown-item" href="add_book.php"><i class="fa fa-plus" style="color: white;"></i> Add New Book</a></li>
                        <li><a class="dropdown-item" href="manage_books.php"><i class="fa fa-cogs" style="color: white;"></i> Manage Books</a></li>
                        <li><a class="dropdown-item" href="manage_issued_books.php"><i class="bx bx-recycle" style="color: white;"></i> Issued Books</a></li>
                        <li><a class="dropdown-item" href="issue_book.php"><i class="fa fa-cart-plus" style="color: white;"></i> Issue A Book</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="staffDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-user"></i> STAFF <span class="badge bg-light text-dark rounded-pill align-text-bottom">567</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="staffDropdown">
                        <li><a class="dropdown-item" href="add_admin.php"><i class="fa fa-plus" style="color: white;"></i> Add New Staff</a></li>
                        <li><a class="dropdown-item" href="manage_admin.php"><i class="fa fa-cogs" style="color: white;"></i> Manage Staff</a></li>
                        <li><a class="dropdown-item" href="admin_password_change.php"><i class="fa fa-cogs" style="color: white;"></i> Change Staff Password</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="allStudentsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-user"></i> STUDENTS <span class="badge bg-light text-dark rounded-pill align-text-bottom">567</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="allStudentsDropdown">
                    <li><a class="dropdown-item" href="add_student.php"><i class="fa fa-plus" style="color: white;"></i> Add New Student</a></li>
                        <li><a class="dropdown-item" href="manage_students.php"><i class="fa fa-user" style="color: white;"></i> Manage Student</a></li>
                        <li><a class="dropdown-item" href="student_password_change.php"><i class="fa fa-cogs" style="color: white;"></i> Change Student Password</a></li>
                    </ul>
                </li>  
            </ul>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-danger"> SIGN OUT <i class="fa fa-user"></i> </a>
            </div>
        </div>
    </div>
</nav>

<!-- Bootstrap Bundle with Popper.js (for dropdowns and toggler) -->
<!-- <script src="..assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

<script>
    (function () {
        'use strict';
        document.querySelector('#navbarSideCollapse').addEventListener('click', function () {
            document.querySelector('.collapse').classList.toggle('show');
        });
    })();
</script>
</body>
</html>
