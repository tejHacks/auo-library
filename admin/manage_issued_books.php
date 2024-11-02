<?php
// Include your database connection and session verification
include('checklogin.php');

// Define variables for pagination and filtering
$items_per_page = isset($_GET['items_per_page']) ? (int)$_GET['items_per_page'] : 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$return_filter = isset($_GET['returnStatus']) ? $_GET['returnStatus'] : '';

// Prepare the query with filters and pagination
$query = "SELECT * FROM IssuedBooks WHERE 1=1";

// Add return status filter if set
if ($return_filter) {
    $query .= " AND returnStatus = '$return_filter'";
}

// Add search filter if set
if ($search_query) {
    $query .= " AND (student_id LIKE '%$search_query%' OR book_id LIKE '%$search_query%' OR borrowers_name LIKE '%$search_query%')";
}

// Add pagination
$query .= " LIMIT $items_per_page OFFSET $offset";
$result = $conn->query($query);

// Count total records for pagination
$total_query = "SELECT COUNT(*) as total FROM IssuedBooks WHERE 1=1";
if ($return_filter) {
    $total_query .= " AND returnStatus = '$return_filter'";
}
if ($search_query) {
    $total_query .= " AND (student_id LIKE '%$search_query%' OR book_id LIKE '%$search_query%' OR borrowers_name LIKE '%$search_query%')";
}
$total_result = $conn->query($total_query);
$total_rows = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $items_per_page);
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


    <title>AUO LIBRARY | MANAGE ISSUED BOOKS</title>

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
    <div class="container mt-4">
        <h2>Manage Issued Books</h2>

        <!-- Filter and Search Form -->
        <form method="GET" action="manage_issued_books.php" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Search by Student ID, Book ID, or Name" value="<?= htmlspecialchars($search_query) ?>">
                </div>
                <div class="col-md-3">
                    <select name="returnStatus" class="form-select">
                        <option value="">All</option>
                        <option value="Returned" <?= $return_filter == 'Returned' ? 'selected' : '' ?>>Returned</option>
                        <option value="Not Returned" <?= $return_filter == 'Not Returned' ? 'selected' : '' ?>>Not Returned</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="items_per_page" class="form-select">
                        <option value="10" <?= $items_per_page == 10 ? 'selected' : '' ?>>10</option>
                        <option value="20" <?= $items_per_page == 20 ? 'selected' : '' ?>>20</option>
                        <option value="50" <?= $items_per_page == 50 ? 'selected' : '' ?>>50</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <!-- Table displaying issued books -->
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Issue ID</th>
                        <th>Student ID</th>
                        <th>Borrower's Name</th>
                        <th>Role</th>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                        <th>Return Status</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['issue_id'] ?></td>
                            <td><?= $row['student_id'] ?></td>
                            <td><?= $row['borrowers_name'] ?></td>
                            <td><?= $row['role'] ?></td>
                            <td><?= $row['book_id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['book_author'] ?></td>
                            <td><?= $row['publisher'] ?></td>
                            <td><?= $row['issue_date'] ?></td>
                            <td><?= $row['due_date'] ?></td>
                            <td><?= $row['return_date'] ? $row['return_date'] : 'Not Returned' ?></td>
                            <td><?= $row['returnStatus'] === 'Returned' ? 'Returned' : 'Not Returned' ?></td>
                            <td><?= $row['notes'] ?></td>
                            <td>
                                <a href="edit_issued_book.php?id=<?= $row['issue_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_issued_book.php?id=<?= $row['issue_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= $i == $current_page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>&items_per_page=<?= $items_per_page ?>&returnStatus=<?= urlencode($return_filter) ?>&search=<?= urlencode($search_query) ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>

        <?php else: ?>
            <p>No issued books found.</p>
        <?php endif; ?>

        <a href="issue_book.php" class="btn btn-primary mt-3">Issue New Book</a>
    </div>
    <script src="../assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
