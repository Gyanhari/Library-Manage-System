<?php
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
  <title>Update Book Information</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/addbook.css">
  <style>
    * {
      font-family: "Open Sans", sans-serif;
    }

    input,
    select {
      height: 30px;
      width: 70vw;
      width: 80vw;
    }

    input[type="submit"] {
      height: 50px;
      width: 100px;
    }

    .input-container {
      display: grid;
      grid-template-columns: max-content auto;
      grid-gap: 10px;
      background-color: wheat;
      padding-bottom: 50px;
    }

    select {
      display: grid;
      grid-template-columns: max-content auto;
      grid-gap: 10px;
      background-color: white;
    }

    .input-container label {
      text-align: right;
    }

    .input-container input {
      width: 100%;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 20px 100px;
      background: black;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 99;
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

  <?php
  $mysqli = require __DIR__ . "/database.php";

  $Id = $_GET['Id'];
  $query = "SELECT * FROM books where Id = $Id";
  $result = mysqli_query($mysqli, $query);
  $row = mysqli_fetch_assoc($result);
  ?>


  <div class="input-container">

    <form action="" method="POST">
      <h2 style="margin-bottom: 10px; text-align: center;">Update Book Records</h3>

        <label for="bname">Book Name</label>
        <input type="text" id="bname" name="bname" placeholder="Book name.."><br> <br>

        <label for="authname">Author Name</label>
        <input type="text" id="authname" name="authname" placeholder="Author's name.."><br> <br>

        <!-- <label for="qty">No. of Books</label>
        <input type="number" id="qty" name="qty" placeholder="Qunatity Of Book"><br><br> -->


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

        <label for="pubdate">Published Date : </label>
        <input type="date" id="pubdate" name="pubdate" placeholder="Enter date" required><br> <br>

        <div class="form-submit">
          <input type="submit" value="Submit" name="submit">
        </div>



        <?php
        if (isset($_POST['submit'])) {
          $bname = $_POST['bname'];
          // echo $bname."<br>";
          $authname = $_POST['authname'];
          $pubdate = $_POST['pubdate'];
          // $qty = $_POST['qty'];
          $query = "UPDATE books SET Book_Name='$bname', Author_Name='$authname', Published_Date='$pubdate' WHERE Id='$Id'";
          $result = mysqli_query($mysqli, $query);
          if ($result > 0) {
            echo "<style> window.open('display-book.php');</style>";
          } else {
            die(mysqli_error($mysqli));
          }

        }

        ?>

    </form>
</body>

</html>