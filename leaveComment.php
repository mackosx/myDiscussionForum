<?php
session_start();
require 'connection.php';
$uid = $_POST['uid'];
$text = $_POST['text'];


if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
} else {
    //good connection
    $stmt = $conn->prepare("INSERT INTO Comments(text, uid) VALUES (?, ?)");
    $stmt->bind_param("si", $text, $uid);

    $stmt->execute();
    $stmt->close();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);