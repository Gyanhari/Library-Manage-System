<?php
// Start session
session_start();

if (isset($_SESSION['user_id']) === true) {
    // Redirect the user to the home page or any other authorized page
    header('Location: index.php');
    exit;
}
?>
<?php
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["Email"];

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM student
          WHERE email = '$email' ";
    $mysqli->real_escape_string($_POST["Email"]);

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();


    if ($user) {

        if (password_verify($_POST["password"], $user["Password_hash"])) {

            session_start();

            $_SESSION["user_id"] = $user["std_id"];
            // echo $user["std_id"];
            header("location: index.php");
            exit;
        } else
            $is_invalid = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
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

        .register-link:hover {
            text-decoration: underline;
        }

        .register-link {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- <body onload="load()"> -->
    <header>
        <div class="logo">LOGO</div>
        <nav class="navbar">
            <a href="/library/index.php">Home</a>
            <!-- <a href="#">Contact</a> -->
            <a href="std-reg.php">Register</a>
        </nav>
    </header>

    <div id="login-form" class="lgn-box">

        <!-- <span class="close"><ion-icon name="close-sharp"></ion-icon></span> -->
        <div id="login" class="form-box">
            <h2>Student - Login</h2>
            <?php if ($is_invalid == true): ?>
                <h2>Ivalid Login</h2>
            <?php endif; ?>
            <form method="POST">

                <div class="input-box">

                    <span class="icon"><ion-icon name="mail-sharp"></ion-icon></span>

                    <input type="text" name="Email" required value="<?= htmlspecialchars($_POST["Email"] ?? "") ?>">

                    <label>Email</label>

                </div>



                <div class="input-box">

                    <span class="icon"><ion-icon name="lock-closed-sharp"></ion-icon></span>

                    <input type="password" required name="password">

                    <label>Password</label>

                </div>


                <div class="remember-me"><label><input type="checkbox">Remember Me</label>

                    <!-- <a href="#">Forgot Password?</a> -->

                </div>
                <button type="submit" class="log-but">Login</button><br><br>

                <div class="register-acc">

                    <p style="text-align:center;">Don't have an Account? <a style="color:black;" href="std-reg.php"
                            class="register-link" id="reg-Button">Register</a>
                    </p>

                </div>
            </form>
        </div>


        <!-- <span class="close"><ion-icon name="close-sharp"></ion-icon></span> -->
        <!-- <div id="register" class="form-box">
            <h2>Register</h2>
            <form action="student-connect.php" name="myform" method="post" novalidate>
                <div class="input-box">

                    <span class="icon"><ion-icon name="person-sharp"></ion-icon></ion-icon></span>

                    <input type="text" required name="std_fname">

                    <label>First Name</label>

                </div>

                <div class="input-box">

                    <span class="icon"><ion-icon name="person-sharp"></ion-icon></ion-icon></span>

                    <input type="text" required name="std_lname">

                    <label>Last Name</label>

                </div>


                <div class="input-box">

                    <span class="icon"><ion-icon name="mail-sharp"></ion-icon></span>

                    <input type="text" id="email" required name="Email">

                    <label>Email</label>

                </div>

                <div class="input-box">

                    <span class="icon"><ion-icon name="lock-closed-sharp"></ion-icon></span>

                    <input type="password" required name="Password">

                    <label>Password</label>

                </div>
                <div class="input-box">

                    <span class="icon"><ion-icon name="lock-closed-sharp"></ion-icon></span>

                    <input type="password" required name="ConfirmPassword">

                    <label>Confirm Password</label>

                </div>


                <div class="remember-me"><label><input type="checkbox">Agree to the terms and condition?</label>

                </div>


                <button type="submit" class="log-but">Register</button>

                <div class="register-acc">
                    <p>Already Have an Account? <a href="#" class="register-link" id="log-Button">Login</a></p>
                </div>


            </form>
        </div> -->

    </div>
    <footer>
        &copy; 2023 Library Management System. All rights reserved.
    </footer>


    <script>
        // const width  = document.querySelector("#login-form").style.height;
        // document.querySelector("#log-Button").addEventListener("click", function () {
        //     document.querySelector("#login").style.display = "block";
        //     document.querySelector("#register").style.display = "none";
        //     document.querySelector("#login-form").style.height = "420px";
        // });
        // document.querySelector("#reg-Button").addEventListener("click", function () {
        //     document.querySelector("#register").style.display = "block";
        //     document.querySelector("#login").style.display = "none";
        //     document.querySelector("#login-form").style.height = "650px";
        // });
        // console.log(width);

        // document.querySelector(".close").addEventListener("click", function () {
        // document.querySelector(".lgn-box").style.display = "none";
        // });
        // document.querySelector(".Lgn-button").addEventListener("click", function () {
        // document.querySelector(".lgn-box").style.display = "block";
        // document.querySelector("#login-form").style.height = "530px";
        // });
        // function load() {
        //     document.querySelector(".lgn-box").style.display = "none";
        // }

    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>