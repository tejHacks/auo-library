<?php
// Ensure user is logged in and session contains user information
include('checklogin.php');
include('config.php'); // Include database connection if needed

// Initialize variables
$message = '';

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the file is uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';  // Directory to store uploaded files
        $uploadFile = $uploadDir . basename($_FILES['file']['name']);
        
        // Check if upload directory exists and is writable
        if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
            $message = "Upload directory is not writable.";
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                // Collecting the form data
                $title = htmlspecialchars($_POST['title']);
                $description = htmlspecialchars($_POST['description']);
                $courseCode = htmlspecialchars($_POST['course_code']);
                $department = htmlspecialchars($_POST['department']);
                $uploadedBy = $studentID; // Assuming you have the student ID or name from session
                
                // Optional: Insert file info into the database
                $sql = "INSERT INTO StudyMaterials (title, description, course_code, department, file_path, uploaded_by) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $title, $description, $courseCode, $department, $uploadFile, $uploadedBy);

                if ($stmt->execute()) {
                    $message = "File uploaded and details saved successfully!";
                } else {
                    $message = "Error saving details to the database.";
                }

                $stmt->close();
            } else {
                $message = "Possible file upload attack!";
            }
        }
    } else {
        $message = "File upload error: " . $_FILES['file']['error'];
    }
}
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
    <title>ACHIEVERS UNIVERSITY LIBRARY | ADD STUDY MATERIAL</title>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <?php include("nav.php"); ?>

    <div class="container my-4">
        <h2 class="text-center">Add Study Material</h2>
        
        <!-- Display upload message -->
        <?php if ($message): ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <!-- Form for uploading study materials -->
        <form action="add_study_material.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="course_code" class="form-label">Course Code:</label>
                <input type="text" name="course_code" id="course_code" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department:</label>
                <input type="text" name="department" id="department" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload Study Material (PDF Only):</label>
                <input type="file" name="file" id="file" class="form-control" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
    </div>
</body>
</html>
