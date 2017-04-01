<?php
session_start();
include "loggedIn.php";
include "connection.php";
if ($_SESSION['failedLogin'] == 'true') {
    echo "<script>alert('Login failed');</script>";
    $_SESSION['failedLogin'] = 'false';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fashion for the Modern Man</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/script.js"></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<header>
    <h1>myFashionForum</h1>
</header>
<nav>
    <ul id="navbar" class="top-navbar">
        <li><a href="home.php">main</a></li>
        <li><a href="#">about</a></li>
        <li class="dropdown">
            <a href="#">categories</a>
            <div class="dropdown-content">
                <a href="#">What to wear</a>
                <a href="#">Trending</a>
                <a href="#">Inspiration</a>
            </div>
        </li>
        <li id="icon"><a href="javascript:void(0);">&#9776;</a></li>

        <?php
        // displays username if logged in, otherwise its a login button
        if ($loggedIn) {
            echo ">" . $_SESSION['username'] . "</a>
                    <div class=\"dropdown-content\">
                    <a href=\"profile.php\">profile</a>
                    <a href=\"logout.php\">log out</a>
                </div>
                    </li>";
        } else {
            echo "<li><a href=\"#\" class=\"loginBtn\">login/signup</a></li>";
        }
        ?>
    </ul>
</nav>