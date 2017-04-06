<?php
require 'navbar.php';
require 'loggedIn.php';
if(!$loggedIn){
    header('Location: home.php');
}
?>
<main>
    <?php require 'loginBox.php';?>
    <div id="left">
        <p>this is the left sidebar</p>
    </div>

    <div id="center-container">
        <div id="profile-container">
            <?php
            if(isset($_GET['uid']))
                $uid = $_GET['uid'];
            else
                $uid = $_SESSION['uid'];

            if ($error != null) {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
            } else {
                //good connection
                $stmt = $conn->prepare("SELECT username, email,bio, totalCommentScore, isAdmin FROM Users WHERE uid = ?;");
                $stmt->bind_param("i", $uid);
                $stmt->execute();
                $stmt->bind_result($username, $email, $bio, $score, $isAdmin);
                // fetch post
                if ($stmt->fetch()) {
                    $user = [
                        'isAdmin' => $isAdmin,
                        'username' => $username,
                        'email' => $email,
                        'score' => $score,
                        'bio' => $bio
                    ];
                }
                $stmt->close();
            }
            $sql ="SELECT contentType, image FROM UserImages WHERE uid=?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $uid);
            $stmt->execute();
            $stmt->bind_result($type, $image);

            ?>
            <h1><?=$user['username'] ?></h1><br>
            <?php if($stmt->fetch()){?>
            <img src="data:image/<?=$type?>;base64,<?=base64_encode($image)?>">
            <?php } ?>
            <h2>Bio:</h2><br>
            <p><?=$user['bio'] ?></p>
            <div >
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="userImage">
                    <input style="display:block;" type="submit" value="upload">
                </form>
            </div>


        <?php if($isAdmin == 1){?>
        <a href="adminControls.php">Admin Controls</a>
            <?php }?>
        </div>
    </div>

</main>
<footer>
    <p>Copyright 2017</p>
</footer>
</body>
</html>