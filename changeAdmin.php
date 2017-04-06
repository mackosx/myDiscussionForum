<?php
require 'connection.php';
$stmt = $conn->prepare("SELECT isAdmin FROM Users WHERE uid = ?;");
$stmt->bind_param("i", $_GET['uid']);
$stmt->execute();
$stmt->bind_result($isAdmin);
if($stmt->fetch()){
    $isAdmin = $isAdmin==1?0:1;
    $stmt->close();
    $stmt = $conn->prepare("UPDATE Users SET isAdmin = ? WHERE uid = ?;");
    $stmt->bind_param("ii",$isAdmin, $_GET['uid']);
    $stmt->execute();
    $stmt->close();


}
header("Location: adminControls.php");

