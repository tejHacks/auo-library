<?php
include('checklogin.php');  
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
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php include("nav.php"); ?>
    <div class="container my-4">
        <h2>Add Book to Wishlist</h2>
        
        <!-- Search Form -->
        <div class="mb-3">
            <input type="text" id="searchTerm" class="form-control" placeholder="Search for a book by title or author">
        </div>

        <!-- Display Search Results -->
        <div id="searchResults"></div>
    </div>

    <script>
        $(document).ready(function(){
            $('#searchTerm').on('input', function() {
                let searchTerm = $(this).val();

                // Send AJAX request to fetch_books.php
                if (searchTerm.length > 0) {
                    $.ajax({
                        url: 'fetch_books.php',
                        type: 'POST',
                        data: { searchTerm: searchTerm },
                        success: function(response) {
                            $('#searchResults').html(response);
                        }
                    });
                } else {
                    $('#searchResults').html('');
                }
            });
        });
    </script>
</body>
</html>
