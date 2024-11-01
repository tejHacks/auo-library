<?php
include('checklogin.php');  

// Fetch user's wishlist
$studentID = htmlspecialchars($studentID) ?? '';
$studentID = htmlspecialchars($studentID) ?? '';
$sql = "SELECT w.book_id, w.book_title, w.book_description, w.added_at 
        FROM wishlist w 
        WHERE w.student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $studentID); // Ensure this matches the defined variable
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library, Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <meta name="application-name" content="Achievers University Library">
    <meta name="theme-color" content="black">
    <title>ACHIEVERS UNIVERSITY LIBRARY | STUDENT WISHLIST </title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">

    <style>
        /* Scrollbar Styling */
        ::-webkit-scrollbar { background: #272727; width: 12px; }
        ::-webkit-scrollbar-thumb { background: #808080; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background-color: #666; }

        /* Container Styles */
        .content-box {
            border-radius: 10px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .content-box:hover {
            transform: translateY(-5px);
            background-color: #f1f1f1;
        }
    </style>
    <!-- Scripts -->
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
    </head>
<body>
    <?php include("nav.php"); ?>
    <div class="container my-4">
        <h2>Your Wishlist</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Description</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                    <td><?php echo htmlspecialchars($row['book_description']); ?></td>
                    <td><?php echo htmlspecialchars($row['added_at']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="wishlist_add.php" class="btn btn-primary">Add Book to Wishlist</a>
    </div>
</body>
</html>
