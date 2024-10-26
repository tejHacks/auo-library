<?php
session_start();
error_reporting(0);

include('includes/config.php');

if (!empty($_SESSION["studentID"])) {
    $studentID = $_SESSION['studentID'];
 
    $stmt = $conn->prepare("SELECT * FROM `Student` WHERE `StudentID` = ? ");
 $stmt->bind_param("s",$studentID);
 $stmt->execute();
 $result = $stmt->get_result();

 if($result->num_rows >0){
     $row = $result->fetch_assoc();
     $userId = $row["ID"];
     $studentID = $row["StudentID"];
    $fullName = $row["Fullname"];
    $email = $row["Email"];
    $mobile = $row["MobileNumber"];
    $level = $row["Level"];
    $course = $row["Course"];
    $gender = $row["Gender"];
   $regDate = $row["RegDate"];
   $updatedDate = $row["updationDate"];
 }

}
 else {
    header("location:../login.php");
}



?>