<?php 

require_once ("../db.php");

if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
}

mysqli_query($db, "UPDATE students SET status = '1' WHERE id = '$id'");
header("Location:students.php");

?>
