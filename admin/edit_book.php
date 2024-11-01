<?php
// Include your database connection and authentication file here
include('checklogin.php');

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Fetch the book details from the database
    $query = "SELECT * FROM Books WHERE bookID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if book exists
    if ($result->num_rows === 1) {
        $book = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger'>Book not found!</div>";
        exit;
    }

    // Update book details
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $year_of_publication = $_POST['year_of_publication'];
        $category = $_POST['category'];

        $update_query = "UPDATE Books SET bookTitle = ?, author = ?, publisher = ?, yearOfRelease = ?, category = ? WHERE bookID = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("ssssss", $title, $author, $publisher, $year_of_publication, $category, $book_id);

        if ($update_stmt->execute()) {
            echo "<div class='alert alert-success'>Book details updated successfully!</div>";
            header("refresh:2; url=manage_books.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Error updating book details.</div>";
        }
    }
} else {
    echo "<div class='alert alert-warning'>No book ID provided!</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Achievers University Library Book Management System.">
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
</head>
<body>
<?php include('header.php'); ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Edit Book Details</h2>
    
    <form method="POST" class="border p-4 shadow-sm rounded">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($book['bookTitle']) ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" value="<?= htmlspecialchars($book['author']) ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" name="publisher" id="publisher" value="<?= htmlspecialchars($book['publisher']) ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="year_of_publication" class="form-label">Year of Publication</label>
            <input type="text" name="year_of_publication" id="year_of_publication" value="<?= htmlspecialchars($book['yearOfRelease']) ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" id="category" value="<?= htmlspecialchars($book['category']) ?>" class="form-control" required>
        </div>
        
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update Book</button>
            <a href="manage_books.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
