<?php
include 'connection.php';
include 'loggedIn.php';
session_start();


$set = $_SERVER['REQUEST_METHOD']== 'POST'
    && isset($_POST['username'])
    && isset($_POST['email'])
    && isset($_POST['pass']);

if ($set) {

    $u = $_POST['username'];
    $p = $_POST['pass'];
    $e = $_POST['email'];

    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        //good connection
        $stmt = $conn->prepare("SELECT username FROM Users WHERE username = ? OR email = ?;");
        $stmt->bind_param("ss", $u, $e);

        $stmt->execute();
        $stmt->bind_result($username);


        if ($stmt->fetch()) {
            echo "<p>User already exists with this name and/or email.</p>";
            echo '<a href=\"' . $_SERVER['HTTP_REFERER'] . '\">Return to user entry</a>';
        } else {

                // insert user
                $stmt = $conn->prepare("INSERT INTO Users(username, email, password) VALUES(?, ?, ?);");
                // hash pass...tasty
                $p = md5($p);
                $stmt->bind_param("sss", $u, $e, $p);
                $stmt->execute();


            header("Location: home.php");

        }


        }

        $conn->close();

}
