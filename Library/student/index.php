<?php
// Start session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user_id"])) {
  // Redirect to the login page or display an error message
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
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: "Open Sans", sans-serif;
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



    .navbar a {
      color: wheat;
    }

    .logo {
      user-select: none;
      font-size: 2em;
      color: wheat;
    }

    section {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
    }

    section h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    section p {
      margin-bottom: 10px;
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
  </style>
</head>

<body>

  <header>
    <div class="logo">LOGO</div>
    <!-- <div class="logo"><img class="image-123" src="css/library-logo.jpg" alt=""></div> -->
    <nav class="navbar">
      <a href="index.php">Home</a>
      <a href="std-reserve-book.php">Reserve Books</a>
      <a href="std-display-book.php">All Books</a>
      <!-- <a href="#">Contact</a> -->
      <a href="logout.php">Logout</a>
    </nav>
  </header>


    <section>
      <h2>Welcome to the Library Management System</h2>
      <p>This system allows you to manage books, members, and loans in your library efficiently.</p>
      <p>Explore the links above to access different features of the system.</p>
    </section>
  
  <footer>
    &copy; 2023 Library Management System. All rights reserved.
  </footer>
</body>

</html>