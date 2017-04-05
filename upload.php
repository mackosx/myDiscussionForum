<?php
require 'connection.php';
require 'loggedIn.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["userImage"]["name"]);
$uploadOk = true;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$imagedata = file_get_contents($_FILES['userImage']['tmp_name']);
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES["userImage"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = true;
    } else {
        echo "File is not an image.";
        $uploadOk = false;
    }
}

// Check file size
if ($_FILES["userImage"]["size"] > 100000) {
    echo "Sorry, your file is too large.";
    $uploadOk = false;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == false) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    // get the image contents
    // insert image
    $stmt = $conn->prepare("INSERT INTO UserImages(uid, contentType, image) VALUES(?,?,?)");
    $null = null;
    $stmt->bind_param("isb", $_SESSION['uid'], $imageFileType, $null);
    // send image
    $stmt->send_long_data(2, $imagedata);
    $stmt->execute();
    $stmt->close();
}
header("Location: profile.php");