<?php
// Start session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["admin_id"])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Ubuntu:ital,wght@0,300;0,500;0,700;1,300&display=swap"
    rel="stylesheet">
  <style>
    .navbar a::after {
      content: "";
      position: absolute;
      width: 100%;
      height: 3px;
      background: #fff;
      border-radius: 5px;
      bottom: -6px;
      left: 0;
      /* transform-origin: left; */
      transform: scaleY(0);
      transition: 0.5s;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      height: 80px;
      width: 100%;
      padding: 20px 100px;
      background: black;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 99;
      color: wheat;
    }

    footer {
      position: absolute;
      bottom: 0;
      background-color: black;
      width: 100%;
      height: 40px;
      display: flex;
      color: wheat;
      /* text-align: center; */
      justify-content: center;
      align-items: center;
      /* opacity: 0.8; */
    }

    .lgn-box {
      /* position: relative; */
      height: 200px;
      width: 500px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, 0.5);
      border-radius: 20px;
      backdrop-filter: blur(20px);
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
      display: flex;
      /* text-align: center; */
      justify-content: center;
      align-items: center;

      overflow: hidden;
      transition: 0.9s;
    }

    .navbar a {
      color: wheat;
    }

    .logo {
      font-size: 2em;
      color: wheat;
    }
  </style>
</head>

<body>

  <header>
    <!-- <div class="logo"><img class="image-123" src="css/library-logo.jpg" alt=""></div> -->
    <div class="logo">LOGO</div>
    <nav class="navbar">
      <a href="index.php">Home</a>
      <a href="addbook.php">Add Books</a>
      <a href="display-book.php">Display Books</a>
      <a href="reserved-books.php">Reserved Books</a>
      <!-- <a href="#">Contact</a> -->
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  <div id="login-form" class="lgn-box">
    <h1>Website for Admin </h1>
  </div>
  <footer>
    2023 Copyright &copy; Khwopa College of Engineering Library
  </footer>
</body>

</html>