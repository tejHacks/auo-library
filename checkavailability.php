<?php
require_once('includes/config.php');

if (!empty($_POST["Email"])) {
    $Email = htmlspecialchars($_POST["Email"]);

    // Validate email
    if (filter_var($Email, FILTER_VALIDATE_EMAIL) === false) {
        echo "error: You did not enter a valid email.";
    } else {
        // Prepare the SQL statement
        $sql = "SELECT `Email` FROM `student` WHERE `Email` = ?";
        $stmt = $conn->prepare($sql);

        // Bind the parameter with the correct method for MySQLi
        $stmt->bind_param("s", $Email);
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<span style='color:red;float:left;'> This email already exists .</span>";
            echo "<script>let x = document.getElementById('studentId');x.classList.remove('is-valid');x.classList.add('is-invalid'); </script>";
            echo "<script>$('#submit').prop('disabled', true);</script>";
        } else {
            echo "<span style='color:green;float:left;'> Email available for Registration .</span>";
            echo "<script>let x = document.getElementById('studentId');x.classList.remove('is-invalid');x.classList.add('is-valid'); </script>";
            echo "<script>$('#submit').prop('disabled', false);</script>";
        }

        // Close the statement
        $stmt->close();
    }
} else {
    echo "<span style='color:red;float:left;'> Please enter a valid email address.</span>";
    echo "<script>let x = document.getElementById('studentId');x.classList.remove('is-valid');x.classList.add('is-invalid'); </script>";
    echo "<script>$('#submit').prop('disabled', true);</script>";
}

// Close the database connection if needed
$conn->close();
?>
