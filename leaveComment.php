<?php
session_start();
require 'connection.php';
$uid = $_SESSION['uid'];
$text = $_POST['text'];
$pid = $_SESSION['pid'];

if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
} else {
    //good connection
    $stmt = $conn->prepare("INSERT INTO Comments(text, uid, pid) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $text, $uid, $pid);

    $stmt->execute();
    $stmt->close();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);