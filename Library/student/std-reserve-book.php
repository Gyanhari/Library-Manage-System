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
<html>

<head>
    <title>Reserve Books</title>
    <link rel="stylesheet" href="css/reserve-book.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
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

        .logo {
            user-select: none;
            font-size: 2em;
            color: #fff;
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

        .lgn-box {
            height: 630px;
            width: 400px;
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



    <div class="input-container">

        <form method="POST">
            <h2 style="margin-bottom: 10px; text-align:center;">Reserve Book</h3>


                <label for="book_name">Book Name : </label>
                <input type="text" id="book_name" name="book_name" placeholder="Book name.."><br> <br>

                <label for="std_name">Student Name</label>
                <input type="text" id="std_name" name="std_name" placeholder="Student name.."><br> <br>

                <label for="authname">Author Name</label>
                <input type="text" id="auth_name" name="auth_name" placeholder="Author's name.."><br> <br>



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

                <div class="form-submit">
                    <input type="submit" value="Submit" name="submit">
                </div>



                <?php
                $mysqli = require __DIR__ . "/database.php";

                if (isset($_POST['submit'])) {
                    $bookname = $_POST['book_name'];
                    $stdname = $_POST['std_name'];
                    echo $stdname . "<br>";
                    $authname = $_POST['auth_name'];
                    $genre = $_POST['type'];
                    // Check if the student exists
                    $studentQuery = "SELECT std_id FROM student WHERE std_fname = '$stdname'";
                    $studentResult = mysqli_query($mysqli, $studentQuery);

                    if (mysqli_num_rows($studentResult) > 0) {
                        // Check if the book exists and is available
                        $bookQuery = "SELECT isAvailable FROM books WHERE Book_Name = '$bookname'";
                        $bookResult = mysqli_query($mysqli, $bookQuery);

                        if (mysqli_num_rows($bookResult) > 0) {
                            $bookData = mysqli_fetch_assoc($bookResult);
                            $availability = $bookData['isAvailable'];

                            if ($availability == 1) {
                                // Book is available, reserve it for the student
                                $reserveQuery = "UPDATE books SET isAvailable = 0 WHERE Book_Name = '$bookname';";
                                mysqli_query($mysqli, $reserveQuery);

                                // Add reservation record to the reservations table
                                $insertQuery = "INSERT INTO reserve_book (`std_name`, `book_name`,`auth_name`,`genre`) VALUES ('$stdname', '$bookname','$authname','$genre')";
                                mysqli_query($mysqli, $insertQuery);

                                echo "Book reserved successfully!";
                            } else {
                                echo "Book is not available for reservation.";
                            }
                        } else {
                            echo "Book not found.";
                        }
                    } else {
                        echo "Student not found.";
                    }


                }
                ?>
        </form>

</body>

</html>