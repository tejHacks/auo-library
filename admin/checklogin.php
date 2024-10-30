<?php
session_start();
error_reporting(0);

include('includes/config.php');

if (!empty($_SESSION["adminID"])) {
    $adminID = $_SESSION['adminID'];
 
    $stmt = $conn->prepare("SELECT * FROM `Librarian` WHERE `LibrarianID` = ? ");
 $stmt->bind_param("s",$adminID);
 $stmt->execute();
 $result = $stmt->get_result();

 if($result->num_rows >0){
     $row = $result->fetch_assoc();
     $librarianId = $row["ID"];
     $fullName = $row["Fullname"];
     $librarianID = $row["LibrarianID"];
    $email = $row["LibrarianEmail"];
    $contact = $row["Contact"];
    $status = $row["Status"];
    $role = $row["Role"];
    $jobtitle = $row["JobTitle"];
    $department = $row["Department"];
    $gender = $row["Gender"];
   $regDate = $row["RegDate"];
   $updatedDate = $row["updationDate"];
   $recoveryKey = $row["RecoveryKey"];
 }

}
 else {
    header("location:index.php");
}



?>