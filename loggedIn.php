<?php
session_start();
$loggedIn = false;
if($_SESSION['isBanned'] == 1){
    echo "<script>alert('Sorry, that account has been banned');</script>";
    unset($_SESSION['isBanned']);
}
if (isset($_SESSION['username'])) {
    $loggedIn = true;
    //$username = $_SESSION['username'];
}
?>