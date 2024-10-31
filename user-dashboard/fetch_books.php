<?php
include('includes/config.php'); // Include your database connection file

if (isset($_POST['searchTerm'])) {
    $searchTerm = '%' . $_POST['searchTerm'] . '%';
    $sql = "SELECT id, bookTitle, bookID, author, edition, yearOfRelease, category, summary 
            FROM Books 
            WHERE bookTitle LIKE ? OR author LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Edition</th>
                        <th>Year</th>
                        <th>Category</th>
                        <th>Summary</th>
                        <th>Add to Wishlist</th>
                    </tr>
                </thead>
                <tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . htmlspecialchars($row['bookTitle']) . '</td>
                    <td>' . htmlspecialchars($row['author']) . '</td>
                    <td>' . htmlspecialchars($row['edition']) . '</td>
                    <td>' . htmlspecialchars($row['yearOfRelease']) . '</td>
                    <td>' . htmlspecialchars($row['category']) . '</td>
                    <td>' . htmlspecialchars($row['summary']) . '</td>
                    <td>
                        <form method="post" action="wishlist_process.php">
                            <input type="hidden" name="book_id" value="' . htmlspecialchars($row['bookID']) . '">
                            <input type="hidden" name="bookTitle" value="' . htmlspecialchars($row['bookTitle']) . '">
                            <input type="hidden" name="bookSummary" value="' . htmlspecialchars($row['summary']) . '">
                            <button type="submit" class="btn btn-success">Add</button>
                        </form>
                    </td>
                  </tr>';
        }
        echo '</tbody></table>';
    } else {
        echo '<p>No results found.</p>';
    }
}
?>
