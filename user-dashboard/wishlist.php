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
    <title>Your Wishlist</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
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
