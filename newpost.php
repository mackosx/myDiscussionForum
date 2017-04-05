<?php
require 'navbar.php';
?>
<main>
   <?php require 'loginBox.php';?>
    <div id="left">
        <p>this is the left sidebar</p>
    </div>

    <div id="right">
        <div id="profile-box">
            <img src="images/placeholder.png">
            <p>current profile</p>
            <button class="big-buttons loginBtn">Your posts</button>
        </div>
        <p>this is the right sidebar</p>
    </div>
    <div id="center-container">
        <div id="new-post-container">
        <form method="post" action="makePost.php">
            <fieldset>
                <legend>make a post</legend><br>
                <label>title:</label><br>
                <input type="text" name="title"><br><br>
                <label>link [optional]:</label><br>
                <input type="text" name="link"><br><br>
                <label>content:</label><br>
                <textarea name="text" placeholder="max 500 words">
                </textarea>
                <input type="submit" value="Submit Post">
            </fieldset>
        </form>
        </div>

    </div>

</main>
<footer>
    <p>Copyright 2017</p>
</footer>
</body>
</html>