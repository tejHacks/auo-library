<?php
include('checklogin.php');
// include('config.php');

// Fetch available study materials
$course_code = $_GET['course_code'] ?? '';
$department = $_GET['department'] ?? '';
$sql = "SELECT * FROM StudyMaterials WHERE 1";

if ($course_code) $sql .= " AND course_code = ?";
if ($department) $sql .= " AND department = ?";

$stmt = $conn->prepare($sql);
if ($course_code && $department) $stmt->bind_param("ss", $course_code, $department);
elseif ($course_code) $stmt->bind_param("s", $course_code);
elseif ($department) $stmt->bind_param("s", $department);

$stmt->execute();
$materials = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AUO LIBRRAY | Study Materials </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library, Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <meta name="application-name" content="Achievers University Library">
    <meta name="theme-color" content="black">
  <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">

    <!-- Scripts -->
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>

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
    </head>
<body>

<?php include("nav.php"); ?>

<div class="container my-5">
    <h2 class="text-center">Study Materials</h2>
    <p class="text-center">Find past questions, course notes, and outlines for your courses.</p>
    
    <!-- Search Filters -->
    <form method="get" class="mb-4 row g-3">
        <div class="col-md-5">
            <input type="text" name="course_code" class="form-control" placeholder="Course Code" value="<?php echo htmlspecialchars($course_code); ?>">
        </div>
        <div class="col-md-5">
            <input type="text" name="department" class="form-control" placeholder="Department" value="<?php echo htmlspecialchars($department); ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <!-- Materials Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Course Code</th>
                    <th>Department</th>
                    <th>Description</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($materials->num_rows > 0): ?>
                    <?php while ($material = $materials->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($material['title']); ?></td>
                            <td><?php echo htmlspecialchars($material['course_code']); ?></td>
                            <td><?php echo htmlspecialchars($material['department']); ?></td>
                            <td><?php echo htmlspecialchars($material['description']); ?></td>
                            <td><a href="<?php echo htmlspecialchars($material['file_path']); ?>" class="btn btn-success" download>Download</a></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No materials found. Try a different search.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
