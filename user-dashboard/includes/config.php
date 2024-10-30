<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','auolibrary');


// Create connection
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    // show connection success message of throw error maessage above::;
    // echo "SUCCESS MESSAGE";
}

?>





