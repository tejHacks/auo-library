<?php
require_once('includes/config.php');
if (!empty($_POST["Email"])) {
    
	$Email = htmlspecialchars($_POST["Email"]);
	

	
    if (filter_var($Email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$sql ="SELECT `Email` FROM `Student` WHERE `Email`=:Email";
$query= $conn->prepare($sql);
$query-> bindParam(':Email', $Email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
	echo "<span style='color:red;float:left;'> This email already exists .</span>";
	echo "<script>let x = document.getElementById('studentId');x.classList.remove('is-valid');x.classList.add('is-invalid'); </script>";
	echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green;float:left;'> Email available for Registration .</span>";
	echo "<script>let x = document.getElementById('studentId');x.classList.remove('is-invalid');x.classList.add('is-valid'); </script>";
    echo "<script>$('#submit').prop('disabled',false);</script>";

}


    }
}else{
    echo "<span style='color:red;float:left;'> Please enter a valid email address.</span>";
    echo "<script>let x = document.getElementById('studentId');x.classList.remove('is-valid');x.classList.add('is-invalid'); </script>";
	echo "<script>$('#submit').prop('disabled',true);</script>";
}
?>

	