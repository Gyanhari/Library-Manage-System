<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="student/css/index.css">
  <style>
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

    nav a {
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
  </style>
</head>

<body>
  <!-- <body onload="load()"> -->
  <header>
    <div class="logo">LOGO</div>
    <nav class="navbar">
      <a href="#">Home</a>
      <!-- <a href="#">Books</a> -->
      <!-- <a href="#">Contact</a> -->
      <a href="student/login.php">Student-Login</a>
      <a href="admin/login.php">Admin-Login</a>
    </nav>
  </header>
  <section>
    <h2>Welcome to the Library Management System</h2>
    <p>This system allows you to manage books, student in your library efficiently.</p>
    <p>Explore the links above to access different features of the system.</p>
  </section>
  <footer>
    2023 Copyright &copy; Khwopa College of Engineering Library
  </footer>
</body>

</html>