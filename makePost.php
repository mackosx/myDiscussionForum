<?php
require 'connection.php';
require 'loggedIn.php';

if(!$loggedIn){
    header("Location: home.php");
    die();
}else if(!isset($_POST['title'])||!isset($_POST['text'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if (isset($_POST['link'])) {
    $link = $_POST['link'];
} else {
    $link = "";
}

if (isset($_POST['title'])) {
    $title = $_POST['title'];
}
if (isset($_POST['text'])) {
    $text = $_POST['text'];
}

$score = 1;
$stmt = $conn->prepare("INSERT INTO Posts(title, text, link, uid, score) VALUES(?, ?, ?, ?, ?);");
$stmt->bind_param("sssii", $title, $text, $link, $_SESSION['uid'], $score);
$stmt->execute();
$stmt->close();

$stmt = $conn->prepare("SELECT pid FROM Posts ORDER BY pid DESC LIMIT 1;");
$stmt->execute();
$stmt->bind_result($pid);
$stmt->fetch();
header("Location: post.php?pid=" . $pid);
