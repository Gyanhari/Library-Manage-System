<?php

if (empty($_POST['Username'])) {
    die('Name is Required');
}
;

if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
    die("Enter a Valid Email");
}
// if (strlen($_POST["Password"]) < 8) {
//     die("Password Should be atleast 8 characters");
// }

// if (!preg_match("/[a-z]/i", $_POST["Password"])) {
//     die("Password must contain atleast one letter");
// }

// if (!preg_match("/[0-9]/", $_POST["Password"])) {
//     die("Password must contain atleast one number");
// }

if ($_POST['Password'] !== $_POST["ConfirmPassword"]) {
    die("Password must be the same");
}

$Password_hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

// print_r($_POST);

// var_dump($Password_hash);

$sql = "INSERT INTO registration (Username,Email,Password_hash) 
        VALUES(?,?,?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL Error : " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["Username"], $_POST["Email"], $Password_hash);

if ($stmt->execute()) {

    header("Location: signup-sucess.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email Already Taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}



?>