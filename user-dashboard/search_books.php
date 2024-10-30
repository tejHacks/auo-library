<?php
include('includes/config.php'); // Include your database connection

$query = $_GET['query'];
$response = [];

// Prepare and execute the SQL query
$sql = "SELECT * FROM Books WHERE bookTitle LIKE ? OR bookID LIKE ? OR author LIKE ? OR keywords LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$query%";
$stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Fetch results
while ($row = $result->fetch_assoc()) {
    $response[] = [
        'bookID' => $row['bookID'],
        'bookTitle' => $row['bookTitle'],
        'author' => $row['author'],
    ];
}

// Return JSON response
echo json_encode($response);
?>
