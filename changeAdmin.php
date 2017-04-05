<?php
require 'connection.php';
$stmt = $conn->prepare("UPDATE Users SET isAdmin = 1 WHERE uid = ?;");
$stmt->bind_param("i", $_GET['uid']);
$stmt->execute();
$stmt->close();

header("Location: adminControls.php");