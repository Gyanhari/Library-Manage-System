<?php
$mysqli = require __DIR__ . "/database.php";
if (isset($_POST['submit'])) {
  $bname = $_POST['bname'];
  // echo $bname."<br>";
  $authname = $_POST['authname'];
  $pubdate = $_POST['pubdate'];
  // $Quantity = $_POST['qty'];
  $genre = $_POST['type'];
  // $isAvailable = $_POST['qty'];

  $query = "INSERT INTO books(`Book_Name`, `Author_Name`,`Published_Date`,`Genre`,`isAvailable`) VALUES ('$bname','$authname','$pubdate','$genre','1');";
  $result = mysqli_query($mysqli, $query);
  if ($result) {
    echo "insert sucessfully";
    header('location:addbook.php');
    exit;
  } else {
    die(mysqli_error($mysqli));
  }
}
?>