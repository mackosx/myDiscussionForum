<?php
session_start();
if($_SESSION['isAdmin']==0){
    header("Location: home.php");
    die();
}

require 'navbar.php';
require 'loginBox.php';

echo "<div id=\"center-container\"><br><br><br><br>";
if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
} else {
    //good connection
    $stmt = $conn->prepare("SELECT uid, username, isBanned, isAdmin FROM Users;");
    $stmt->execute();
    $stmt->bind_result($uid, $username, $isBanned, $isAdmin);
    // fetch post
    $users=[];
    while ($stmt->fetch()) {
        array_push($users, [
            'uid' => $uid,
            'username' => $username,
            'isAdmin' => $isAdmin,
            'isBanned' => $isBanned


        ]);

    }
    echo "<h1>Admin Controls</h1>";
    echo "<table><tr><td>User</td><td>Admin Status</td><td>Ban Status</td></tr>";
    foreach ($users as $user){
        echo "<tr>";
        echo "<td>" . $username . "</td>";
        if($user['isAdmin'] == 1) {
            echo "<td><a href=\"changeAdmin.php?uid=".$user['uid']."\">remove admin</a></td>";
        }else{
            echo "<td><a href=\"changeAdmin.php?uid=".$user['uid']."\">make admin</a></td>";
        }
        if($user['isBanned'] == 1) {
            echo "<td><a href=\"ban.php?uid=".$user['uid']."\">unban</a></td>";
        }else{
            echo "<td><a href=\"ban.php?uid=".$user['uid']."\">ban</a></td>";
        }

        echo "</tr>";
    }
    echo "</table";
    $stmt->close();
    echo "</div>";
}