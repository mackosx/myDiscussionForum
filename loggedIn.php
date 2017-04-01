<?php
$loggedIn = false;
if (isset($_SESSION['username'])) {
    $loggedIn = true;
    //$username = $_SESSION['username'];
}
?>