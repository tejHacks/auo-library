<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auolibrary";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Check if staffID is empty
    if (empty($_POST["staffID"])) {
        echo "<span style='color:red;float:left;'> Please enter a valid staff ID.</span>";
        echo "<script>let x = document.getElementById('staffId');x.classList.remove('is-valid');x.classList.add('is-invalid'); </script>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {
        // Sanitize and assign staffID
        $staffID = htmlspecialchars($_POST["staffID"]);
        
        // Prepare statement to check for staffID in the Lecturers table
        $stmt = $conn->prepare("SELECT `StaffID` FROM `Lecturers` WHERE `StaffID` = ?");
        $stmt->bind_param("s", $staffID);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Check if staffID already exists
        if ($result->num_rows > 0) {
            echo "<span style='color:red;float:left;'> Staff ID already registered.</span>";
            echo "<script>let x = document.getElementById('staffId');x.classList.remove('is-valid');x.classList.add('is-invalid'); </script>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        } else {
            echo "<span style='color:green;float:left;'>You may proceed with registration.</span>";
            echo "<script>let x = document.getElementById('staffId');x.classList.remove('is-invalid');x.classList.add('is-valid'); </script>";
            echo "<script>$('#submit').prop('disabled',false);</script>";
        }
        
        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>
