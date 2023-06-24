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
    <link rel="stylesheet" href="css/display-book.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Open Sans", sans-serif;
            z-index: 25;
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

        .Available-now {
            width: 110px;
            height: 32px;
        }

        table button:hover {
            border: 2px solid red;
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

        .navbar a {
            color: wheat;
        }

        .logo {
            font-size: 2em;
            color: wheat;
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
                <caption>All Books in the Library</caption>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Published Date</th>
                    <th>Genre</th>
                    <th>Availablity</th>
                    <th>Action</th>

                </tr>




                <?php
                $mysqli = require __DIR__ . "/database.php";
                $query = "SELECT * FROM books";
                $result = mysqli_query($mysqli, $query);
                // fetching the data from a database
                // $row=mysqli_fetch_assoc($result);  
                // echo $row['id']; for checking wether the data is fetched or not
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $Id = $row['Id'];
                    $BookName = $row['Book_Name'];
                    $AuthorName = $row['Author_Name'];
                    $PublishedDate = $row['Published_Date'];
                    $Genre = $row['Genre'];
                    if ($row['isAvailable'] == 1) {
                        $Available = "Yes";
                    } else
                        $Available = "No";


                    // echo $emp_id;
                


                    echo "   <tr>
                         <td>" . $Id . "</td>
                         <td>" . $BookName . "</td>
                         <td>" . $AuthorName . "</td>
                         <td>" . $PublishedDate . "</td>
                         <td>" . $Genre . "</td>
                         <td>" . $Available . "</td>
                         
                         <td  > <a href='updatebook.php ?Id=$Id'> <button>Update</button></a>
                              <a href='deletebook.php?Id=$Id'>   <button>Delete</button></a>
                              <a href='makeavailable.php?Id=$Id'>   <button class='Available-now'>Make Available</button></td></a>

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