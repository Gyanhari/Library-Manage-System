<?php
    $mysqli = require __DIR__ . "/database.php";

      $Id=$_GET['Id'];
      // echo $Id;
   $query="UPDATE books SET isAvailable='1' WHERE Id='$Id'";
 $result= mysqli_query($mysqli,$query);
 if($result){
    echo "Update Sucessful";
  header('location:display-book.php');
 }
 else{
    die(mysqli_error($mysqli));

 }
?>