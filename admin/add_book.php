<?php
// Include database connection and authentication file
include('checklogin.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookTitle = $_POST['bookTitle'];
    $bookID = $_POST['bookID'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $isbn = $_POST['isbn'];
    $yearOfRelease = $_POST['yearOfRelease'];
    $category = $_POST['category'];
    $publisher = $_POST['publisher'];
    $language = $_POST['language'];
    $pages = $_POST['pages'];
    $availability = $_POST['availability'];
    $summary = $_POST['summary'];
    $coverImage = $_POST['coverImage'];
    $rating = $_POST['rating'];
    $units = $_POST['units'];
    $keywords = $_POST['keywords'];

    // Insert query
    $query = "INSERT INTO Books (bookTitle, bookID, author, edition, isbn, yearOfRelease, category, publisher, language, pages, availability, summary, coverImage, rating, units, keywords)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param(
            "sssssssisssssdis",
            $bookTitle,
            $bookID,
            $author,
            $edition,
            $isbn,
            $yearOfRelease,
            $category,
            $publisher,
            $language,
            $pages,
            $availability,
            $summary,
            $coverImage,
            $rating,
            $units,
            $keywords
        );

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Book added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding book: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Failed to prepare statement: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
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
    <meta name="keywords" content="Achievers University Library, ACHIEVERS UNIVERSITY LIBRARY, Auo library">
    <meta name="theme-color" content="#343a40">


    <title>AUO LIBRARY | ADD A BOOK</title>

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

</style>

</head>
<body>
<?php include('header.php'); ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Add a New Book</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="bookTitle" class="form-label">Book Title</label>
            <input type="text" class="form-control" name="bookTitle" required>
        </div>
        <div class="mb-3">
            <label for="bookID" class="form-label">Book ID</label>
            <input type="text" class="form-control" name="bookID" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" required>
        </div>
        <div class="mb-3">
            <label for="edition" class="form-label">Edition</label>
            <input type="text" class="form-control" name="edition">
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" name="isbn" required>
        </div>
        <div class="mb-3">
            <label for="yearOfRelease" class="form-label">Year of Release</label>
            <input type="number" class="form-control" name="yearOfRelease">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" name="category">
        </div>
        <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" class="form-control" name="publisher">
        </div>
        <div class="mb-3">
            <label for="language" class="form-label">Language</label>
            <input type="text" class="form-control" name="language">
        </div>
        <div class="mb-3">
            <label for="pages" class="form-label">Pages</label>
            <input type="number" class="form-control" name="pages">
        </div>
        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <select class="form-control" name="availability">
                <option value="available">Available</option>
                <option value="checked_out">Checked Out</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea class="form-control" name="summary"></textarea>
        </div>
        <div class="mb-3">
            <label for="coverImage" class="form-label">Cover Image</label>
            <input type="text" class="form-control" name="coverImage">
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="0.1" max="5" class="form-control" name="rating">
        </div>
        <div class="mb-3">
            <label for="units" class="form-label">Units</label>
            <input type="number" class="form-control" name="units" min="0">
        </div>
        <div class="mb-3">
            <label for="keywords" class="form-label">Keywords</label>
            <input type="text" class="form-control" name="keywords">
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
