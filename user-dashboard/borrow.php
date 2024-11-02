<?php
// Check if user is logged in with checklogin.php and ensure variables exist
include('checklogin.php'); 

// Ensure student data exists
$studentID = isset($studentID) ? htmlspecialchars($studentID) : null;
$fullName = isset($fullName) ? htmlspecialchars($fullName) : null;

if (!$studentID || !$fullName) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Initialize variables
$books = [];
$successMessage = "";
$bookDetails = "";
$errorMessage = "";

// Handle book search via AJAX
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM Books WHERE bookTitle LIKE ? OR bookID LIKE ? OR author LIKE ? OR keywords LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$query%";
    $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $books[] = [
                'bookID' => $row['bookID'],
                'bookTitle' => $row['bookTitle'],
                'author' => $row['author'],
                'yearPublished' => $row['yearOfRelease'],
                'category' => $row['category'],
                'isbn' => $row['isbn'],
                'publisher' => $row['publisher'],
                'pages' => $row['pages']
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($books);
    } else {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Error fetching book data."]);
    }
    exit;
}

// Handle form submission to borrow a book
if (isset($_POST['submit'])) {
    $bookID = htmlspecialchars($_POST['bookID']);
    $bookTitle = htmlspecialchars($_POST['bookTitle']);
    $publisher = htmlspecialchars($_POST['publisher']);
    $yearPublished = htmlspecialchars($_POST['yearPublished']);
    $borrowerRole = 'Student';
    $key = $studentID . substr(md5(uniqid(rand(), true)), 0, 4); // Generate unique key for reference
    $unitsRequested = 1; 
    $status = 'Pending';

    // Insert the borrow request into BorrowRequests table
    $stmt = $conn->prepare("INSERT INTO BorrowRequests (userKey, student_id, bookID, borrower_name, borrower_role, mobile, course, level, book_title, units_requested, publisher, yearOfRelease, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $key, $studentID, $bookID, $fullName, $borrowerRole, $mobile, $course, $level, $bookTitle, $unitsRequested, $publisher, $yearPublished, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Book borrow request submitted successfully!'); window.location.href='home.php';</script>";
    } else {
        echo "Insert Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACHIEVERS UNIVERSITY LIBRARY | BORROW A BOOK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="#212529">
    <meta name="application-name" content="Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        .search-results {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            background-color: white;
            position: absolute;
            z-index: 1000;
        }
        .search-result-item {
            padding: 10px;
            cursor: pointer;
        }
        .search-result-item:hover {
            background-color: #f1f1f1;
        }
        .book-details {
            display: none;
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <?php include("nav.php"); ?>
    <div class="container my-4">
        <p class="fade-in" style="font-size:18px;font-weight:400;">Hi, <?php echo htmlspecialchars($fullName); ?>!</p>
        <hr>

        <h2 class="text-center">Borrow a Book</h2>
        <hr>

        <form method="post" action="borrow.php" enctype="application/x-www-form-urlencoded">
            <div class="mb-3">
                <label for="search" class="form-label">Search for a Book</label>
                <input type="text" class="form-control" id="search" name="search" onkeyup="searchBooks()" autocomplete="off" required>
                <div id="search-results" class="search-results"></div>
            </div>

            <div class="book-details" id="bookDetails">
                <h5>Book Details</h5>
                <p><strong>Book ID:</strong> <span id="detailBookID"></span></p>
                <p><strong>Title:</strong> <span id="detailTitle"></span></p>
                <p><strong>Author:</strong> <span id="detailAuthor"></span></p>
                <p><strong>Year Published:</strong> <span id="detailYear"></span></p>
                <p><strong>Category:</strong> <span id="detailCategory"></span></p>
                <p><strong>ISBN:</strong> <span id="detailISBN"></span></p>
                <p><strong>Publisher:</strong> <span id="detailPublisher"></span></p>
                <p><strong>Pages:</strong> <span id="detailPages"></span></p>
            </div>

            <input type="hidden" name="bookID" id="bookID">
            <input type="hidden" name="bookTitle" id="bookTitle">
            <input type="hidden" name="author" id="author">
            <input type="hidden" name="isbn" id="isbn">
            <input type="hidden" name="publisher" id="publisher">
            <input type="hidden" name="yearPublished" id="yearPublished">

            <button type="submit" name="submit" class="btn btn-primary">Submit Borrow Request</button>
        </form>
    </div>

    <script>
        let debounceTimer;
        function searchBooks() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const query = document.getElementById('search').value;
                const searchResultsDiv = document.getElementById('search-results');

                if (query.length > 0) {
                    fetch(`borrow.php?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        searchResultsDiv.innerHTML = '';
                        if (data.length > 0) {
                            data.forEach(book => {
                                const resultItem = document.createElement('div');
                                resultItem.classList.add('search-result-item');
                                resultItem.textContent = book.bookTitle;
                                resultItem.onclick = () => selectBook(book);
                                searchResultsDiv.appendChild(resultItem);
                            });
                        } else {
                            searchResultsDiv.innerHTML = '<div>No results found.</div>';
                        }
                    });
                } else {
                    searchResultsDiv.innerHTML = '';
                }
            }, 300);
        }

        function selectBook(book) {
            document.getElementById('bookID').value = book.bookID;
            document.getElementById('bookTitle').value = book.bookTitle;
            document.getElementById('author').value = book.author;
            document.getElementById('isbn').value = book.isbn;
            document.getElementById('publisher').value = book.publisher;
            document.getElementById('yearPublished').value = book.yearPublished;

            document.getElementById('detailBookID').textContent = book.bookID;
            document.getElementById('detailTitle').textContent = book.bookTitle;
            document.getElementById('detailAuthor').textContent = book.author;
            document.getElementById('detailYear').textContent = book.yearPublished;
            document.getElementById('detailCategory').textContent = book.category;
            document.getElementById('detailISBN').textContent = book.isbn;
            document.getElementById('detailPublisher').textContent = book.publisher;
            document.getElementById('detailPages').textContent = book.pages;

            document.getElementById('bookDetails').style.display = 'block';
        }
    </script>
</body>
</html>
