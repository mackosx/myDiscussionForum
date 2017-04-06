<?php
/**
 * Created by PhpStorm.
 * User: macke
 * Date: 2017-04-06
 * Time: 12:52 AM
 */
require 'connection.php';
//now fetch comments
$stmt = $conn->prepare("SELECT c.text, u.username FROM Comments c, Users u WHERE c.uid = u.uid AND c.pid = ?;");
$stmt->bind_param("i", $_GET['pid']);
$stmt->execute();
$stmt->bind_result($text, $username);
$comments = [];
while ($stmt->fetch()) {
array_push($comments, [
'text' => $text,
'username' => $username,

]);
}
$output = "";
foreach ($comments as $comment)
$output .= "
<div class='comment'>" .
    "<h3>" . $comment['username'] . "</h3><br>" .
    "<p>" . $comment['text'] . "</p></div>";
$stmt->close();
echo $output;