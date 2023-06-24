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

    <title>Book List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/display-book.css">
    <style>
        * {
            font-family: "Open Sans", sans-serif;
        }

        table {
            position: absolute;
            top: 76px;
            width: 100%;
            border-collapse: collapse;
        }

        table button {
            border-radius: 25px;
            width: 80px;
            height: 30px;
            background-color: #17a2b8;
            color: white;
            border: none;
        }

        table button:hover {
            cursor: pointer;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr {
            background-color: #f5f5f5;
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

        .navbar a {
            color: wheat;
        }

        .logo {
            font-size: 2em;
            color: wheat;
        }
        .Remove-Book{
            width: 180px;
            height: 40px;
        }

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
    </style>

</head>

<body>

    <body>
        <!-- <body onload="load()"> -->
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

        <section>

            <!-- <a href="insert.php">  <button> Add+</button> </a><br><br> -->
            <table id="customers" border=1px width=100%>
                <caption>Book Reserved By student</caption>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Reserved By</th>
                    <th>Author Name</th>
                    <th>Genre</th>
                    <th>Action</th>

                </tr>




                <?php
                $mysqli = require __DIR__ . "/database.php";
                $query = "SELECT * FROM reserve_book";
                $result = mysqli_query($mysqli, $query);
                // fetching the data from a database
                // $row=mysqli_fetch_assoc($result);  
                // echo $row['id']; for checking wether the data is fetched or not
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $Id = $row['Id'];
                    $BookName = $row['book_name'];
                    $StudentName = $row['std_name'];
                    $AuthorName = $row['auth_name'];
                    $genre = $row['genre'];




                    echo "   <tr>
                         <td>" . $Id . "</td>
                         <td>" . $BookName . "</td>
                         <td>" . $StudentName . "</td>
                         <td>" . $AuthorName . "</td>
                         <td>" . $genre . "</td>
                         <td > <a href='rem-std-resebook.php ?Id=$Id'> <button class='Remove-Book'>Remove From Student</button></td></a>
                  </tr>";

                }

                ?>
            </table>
        </section>
        <footer>
            2023 Copyright &copy; Khwopa College of Engineering Library
        </footer>
    </body>

</html>