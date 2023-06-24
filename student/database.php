<?php
$host = "localhost";
$dbname = "registration";
$username = "root";
$password = "";


$mysqli = new mysqli($host, $username, $password, $dbname);

if($mysqli->connect_errno){
    die("Not Connected the error is").$mysqli->connect_error;
}

return $mysqli;
?>