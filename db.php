<?php 

$db = new mysqli("localhost", "root", "", "lms");
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . $db->connect_error);
}

//For Bangla Support
mysqli_query($db,'SET CHARACTER SET utf8');
mysqli_query($db,"SET SESSION collation_connection ='utf8_general_ci'");
 
?>
