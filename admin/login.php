<?php
// Start session
session_start();

if (isset($_SESSION['admin_id']) === true) {
    header('Location: index.php');
    exit;
}
?>
<?php
$is_invalid = False;
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["Email"];

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM registration
          WHERE email = '$email' ";
    $mysqli->real_escape_string($_POST["Email"]);

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();


    if ($user) {

        if (password_verify($_POST["password"], $user["Password_hash"])) {

            session_start();

            $_SESSION["admin_id"] = $user["id"];

            header("location: index.php");
            // exit;
        }


    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Library Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
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
            <a href="/library/index.php">Home</a>
            <!-- <a href="#">Contact</a> -->
        </nav>
    </header>

    <div id="login-form" class="lgn-box">

        <!-- <span class="close"><ion-icon name="close-sharp"></ion-icon></span> -->
        <div id="login" class="form-box">
            <h2>Admin - Login</h2>
            <?php if ($is_invalid): ?>
                <h2>Ivalid Login</h2>
            <?php endif; ?>
            <form method="POST" novalidate>


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
                <button type="submit" class="log-but">Login</button>
            </form>
        </div>

    </div>

    <footer>
        2023 Copyright &copy; Khwopa College of Engineering Library
    </footer>
    <!-- <script src="js/admin-login.js"></script> -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div>
</body>

</html>