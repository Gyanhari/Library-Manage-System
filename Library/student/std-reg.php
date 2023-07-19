<?php
// Start session
session_start();

if (isset($_SESSION['user_id']) === true) {
    // Redirect the user to the home page or any other authorized page
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/std-reg.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <script src="std-reg.js"></script>
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
        <!-- <div class="logo"><img class="image-123" src="css/library-logo.jpg" alt=""></div> -->
        <div class="logo">LOGO</div>
        <nav class="navbar">
            <a href="/library/index.php">Home</a>
            <!-- <a href="#">Contact</a> -->
            <a href="login.php">Login</a>
        </nav>
    </header>

    <div id="login-form" class="lgn-box">
        <div id="register" class="form-box">
            <h2>Student - Register</h2>
            <form action="student-connect.php" name="myform" method="post">
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


                <button type="submit" onclick="validat()" id="submit" class="log-but">Register</button>

                <div class="register-acc">
                    <p>Already Have an Account? <a href="login.php" class="register-link" id="log-Button">Login</a></p>
                </div>


            </form>
        </div>
    </div>
    <footer>
        &copy; 2023 Library Management System. All rights reserved.
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- <script>
        y= 1+1;
        console.log(y);
        var x = document.getElementById("email").value;
        var atpos = x.indexOf('@');
        var dotpos = x.lastIndexOf('.');

        if ((document.myform.email.value == "") || (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length)) {
            alert("Please Enter Valid Email")
            document.getElementById("email").focus();
            return false;
        }
    </script> -->

</body>

</html>