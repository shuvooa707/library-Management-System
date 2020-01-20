<?php

require_once('../db.php');

if(isset($_GET['deletebook'])){
    $id = base64_decode($_GET['deletebook']);
        
        $query = "DELETE FROM books WHERE id = '$id'";
    mysqli_query($db, $query);
    header("Location:manage-books.php");
}

?>
