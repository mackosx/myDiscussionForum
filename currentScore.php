<?php
include 'connection.php';
if($_GET['direction']=='up'){
    $sql = "UPDATE Posts SET score = score + 1 WHERE pid = ?;";
} else {
    $sql = "UPDATE Posts SET score = score - 1 WHERE pid = ?;";

}
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['pid']);
$stmt->execute();
$stmt->close();

$stmt = $conn->prepare("SELECT score FROM Posts WHERE pid = ?;");
$stmt->bind_param("i", $_GET['pid']);
$stmt->execute();
$stmt->bind_result($score);
$stmt->fetch();
echo $score;