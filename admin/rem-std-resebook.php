<?php
$mysqli = require __DIR__ . "/database.php";

$Id = $_GET['Id'];

$query = "DELETE FROM reserve_book WHERE Id='$_GET[Id]'";
$result = mysqli_query($mysqli, $query);
if ($result) {
    echo "Delete sucessfully";
    // echo $Id;
    $query1 = "UPDATE books SET isAvailable='1' WHERE Id='$Id'";
    $result1 = mysqli_query($mysqli, $query1);
    if ($result1) {
        echo "Update Sucessful";
        header('location:display-book.php');
    } else {
        die(mysqli_error($mysqli));

    }
    header('location:reserved-books.php');
} else {
    die(mysqli_error($mysqli));

}
?>