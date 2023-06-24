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

    <title>Book List</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Open Sans", sans-serif;
        }

        caption {
            caption-side: top;
            background-color: red;
            font-size: 40px;
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

        table {
            position: absolute;
            top: 76px;
            width: 100%;
            left: 0;
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

    <body>
        <!-- <body onload="load()"> -->
        <header>
            <div class="logo">LOGO</div>
            <!-- <div class="logo"><img class="image-123" src="css/library-logo.jpg" alt=""></div> -->
            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="std-reserve-book.php">Reserve Books</a>
                <a href="#">All Books</a>
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
                    <!-- <th>Quantiy Of Books</th> -->
                    <th>Genre</th>
                    <th>Availablity
                    </th>

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

    <title>Book List</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Open Sans", sans-serif;
        }

        caption {
            caption-side: top;
            background-color: red;
            font-size: 40px;
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

        table {
            position: absolute;
            top: 76px;
            width: 100%;
            left: 0;
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

    <body>
        <!-- <body onload="load()"> -->
        <header>
            <div class="logo">LOGO</div>
            <!-- <div class="logo"><img class="image-123" src="css/library-logo.jpg" alt=""></div> -->
            <nav class="navbar">
                <a href="index.php">Home</a>
                <a href="std-reserve-book.php">Reserve Books</a>
                <a href="#">All Books</a>
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
                    <!-- <th>Quantiy Of Books</th> -->
                    <th>Genre</th>
                    <th>Availablity
                    </th>

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