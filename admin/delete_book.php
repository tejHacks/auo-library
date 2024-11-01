<?php
// Include your database connection and authentication file
include('checklogin.php');

// Check if book ID is provided
if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    // Fetch the book details to confirm existence
    $query = "SELECT * FROM Books WHERE bookID = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $book_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if book exists
        if ($result->num_rows === 1) {
            // Book exists, now delete
            $delete_query = "DELETE FROM Books WHERE bookID = ?";
            $delete_stmt = $conn->prepare($delete_query);

            if ($delete_stmt) {
                $delete_stmt->bind_param("s", $book_id);
                if ($delete_stmt->execute()) {
                    // Successful deletion
                    echo "<script>
                        alert('Book deleted successfully!');
                        window.location.href = 'manage_books.php';
                    </script>";
                    exit;
                } else {
                    // Failed to delete
                    echo "<script>
                        alert('Error deleting book.');
                        window.location.href = 'manage_books.php';
                    </script>";
                    exit;
                }
            }
        } else {
            // Book not found
            echo "<script>
                alert('Book not found.');
                window.location.href = 'manage_books.php';
            </script>";
            exit;
        }
    }
} else {
    // No book ID provided
    echo "<script>
        alert('No book ID provided!');
        window.location.href = 'manage_books.php';
    </script>";
    exit;
}
?>
