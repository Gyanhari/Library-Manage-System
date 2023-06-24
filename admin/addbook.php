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
<html>

<head>
  <title>Add Books To library</title>
  <link rel="stylesheet" href="css/addbook.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
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
      /* z-index: 99; */
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
  <!-- <body onload="load()"> -->
  <header>
    <!-- <div class="logo"><img class="image-123" src="css/library-logo.jpg" alt=""></div> -->
    <div class="logo">LOGO</div>
    <nav class="navbar">
      <a href="index.php">Home</a>
      <a href="display-book.php">Display Books</a>
      <a href="reserved-books.php">Reserved Books</a>
      <!-- <a href="#">Contact</a> -->
      <a href="logout.php">Logout</a>
    </nav>
  </header>



  <div class="input-container">
    <form action="bookprocess.php" method="POST">
      <h2 style="margin-bottom: 10px; text-align: center;">College Library Book Addition</h3>


        <label for="bname">Book Name</label>
        <input type="text" id="bname" name="bname" placeholder="Book name.." required><br> <br>



        <label for="authname">Author Name</label>
        <input type="text" id="authname" name="authname" placeholder="Author name.." required><br> <br>




        <!-- <label for="qty">No. of Books</label>
        <input type="number" id="qty" name="qty" placeholder="Qunatity Of Book" required><br><br> -->



        <label for="type">Category of Books</label>
        <select class="form-check-input" name="type" id="type">
          <option value="N/A">Select Category</option>
          <option value="Arts & Music">Arts & Music</option>
          <option value="Biographies">Biographies</option>
          <option value="Business">Business</option>
          <option value="Comics">Comics</option>
          <option value="Computer & Tech">Computers & Tech</option>
          <option value="Cooking">Cooking</option>
          <option value="Education & Reference">Education & Reference</option>
          <option value="Entertainment">Entertainment</option>
          <option value="Health & Fitness">Health & Fitness</option>
          <option value="History">History</option>
          <option value="Hobbies & Crafts">Hobbies & Crafts</option>
          <option value="Home & Garden">Home & Garden</option>
          <option value="Horror">Horror</option>
          <option value="Kids">Kids</option>
          <option value="Literature & Fiction">Literature & Fiction</option>
          <option value="Medical">Medical</option>
          <option value="Mystery">Mystery</option>
          <option value="Parenting">Parenting</option>
          <option value="Religion">Religion</option>
          <option value="Romance">Romance</option>
          <option value="Sci-Fi & Fantasy">Sci-Fi & Fantasy</option>
          <option value="Science & Maths">Science & Maths</option>
          <option value="Self-Help">Self-Help</option>
          <option value="Social Sciences">Social Sciences</option>
          <option value="Sports">Sports</option>
          <option value="Travel">Travel</option>
          <option value="True Crime">True Crime</option>
        </select> <br> <br>




        <label for="pubdate">Published Date</label>
        <input type="date" id="pubdate" name="pubdate" required><br> <br>


        <div class="form-submit">
          <input type="submit" value="Submit" name="submit">
        </div>


    </form>
  </div>
  <footer>
    2023 Copyright &copy; Khwopa College of Engineering Library
  </footer>
</body>

</html>