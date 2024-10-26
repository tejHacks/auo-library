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


}else{
if (empty($_POST["studentID"]))
{

    echo "<span style='color:red;float:left;'> Please enter a valid matric number .</span>";
    echo "<script>let x = document.getElementById('studentId');x.classList.remove('is-valid');x.classList.add('is-invalid'); </script>";
	echo "<script>$('#submit').prop('disabled',true);</script>";


    }else{
        $studentID = htmlspecialchars($_POST["studentID"]);
	
        $stmt = $conn->prepare("SELECT `StudentID` FROM `Student` WHERE `StudentID` = ? ");
        $stmt->bind_param("s",$studentID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows >0){
            $row = $result->fetch_assoc();
	// echo "<span style='color:red;float:left;'> Matric number already registered.</span>";
    echo "<script>let x = document.getElementById('studentId');x.classList.remove('is-valid');x.classList.add('is-invalid'); </script>";
	echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	// echo "<span style='color:green;float:left;'>You may proceed for Registration .</span>";
    echo "<script>let x = document.getElementById('studentId');x.classList.remove('is-invalid');x.classList.add('is-valid'); </script>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
}
}

}
?>

	