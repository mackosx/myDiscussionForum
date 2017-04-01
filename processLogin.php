<?php
session_start();
include "connection.php";
include "loggedIn.php";
//if($loggedIn){
//    header("Location: home.php");
//    die();
//}
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        $u = $_POST['username'];
        $p = $_POST['password'];
        // check db for user/pass combo
        $stmt = $conn->prepare("SELECT username, password, uid FROM Users WHERE username = ?;");
        $stmt->bind_param("s", $u);
        $stmt->execute();
        $stmt->bind_result($user, $pass, $uid);
        if ($stmt->fetch()) {
            if ($pass == md5($p)) {
                // log in
                $_SESSION['username'] = $user;
                $_SESSION['uid'] = $uid;
            } else
            $_SESSION['failedLogin'] = 'true';
        } else {
            $_SESSION['failedLogin'] = 'true';
        }
        header("Location: ". $_SERVER['HTTP_REFERER']);

    }
}
