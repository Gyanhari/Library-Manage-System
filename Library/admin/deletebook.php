<?php
$mysqli = require __DIR__ . "/database.php";

$Id = $_GET['Id'];

$query = "DELETE FROM books WHERE Id='$_GET[Id]'";
$result = mysqli_query($mysqli, $query);
if ($result) {
   echo "Delete sucessfully";
   header('location:display-book.php');
} else {
   die(mysqli_error($mysqli));

}
?>