<?php
require 'loggedIn.php';
require 'connection.php';
$pid = $_GET['pid'];
$stmt = $conn->prepare("DELETE FROM Posts WHERE pid = ?;");
$stmt->bind_param("i", $pid);
$stmt->execute();
header("Location: home.php");