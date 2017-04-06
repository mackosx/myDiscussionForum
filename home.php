<?php
require 'navbar.php';
?>
    <main>
        <?php require 'loginBox.php'; ?>
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
            <a href="newpost.php">
                <?php if ($loggedIn) { ?>
                    <button class="big-buttons">New Post</button>
                <?php } ?>
            </a>
        </div>
        <div id="center-container">
            <h1>latest posts</h1>

            <?php
            // print out posts
            if ($error != null) {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
            } else {
                //good connection
                $stmt = $conn->prepare("SELECT pid, title, link, score FROM Posts  ORDER BY pid DESC LIMIT 10;");
                $stmt->execute();
                $stmt->bind_result($pid, $title, $link, $score);
                $posts = [];
                while ($stmt->fetch()) {
                    array_push($posts, [
                        'pid' => $pid,
                        'title' => $title,
                        'link' => $link,
                        'score' => $score
                    ]);
                }
                foreach ($posts as $post) { ?>
                    <article>
                        <div id="<?=$post['pid']?>" class="score">
                            <a id="up" onclick="vote('up', <?=$post['pid']?>)">&#x25B2;</a>
                            <p><?=$post['score']?></p>
                            <a id="down" onclick="vote('down', <?=$post['pid']?>)">&#x25BC;</a>
                        </div>
                        <img src="images/placeholder.png">
                        <a href=http://"<?= $post['link'] ?>"><p><?= $post['title'] ?></p></a>

                        <p><a href="post.php?pid=<?= $post['pid'] ?>">Comments</a></p>
                        <?php if($_SESSION['isAdmin'] == 1){?>
                        <a style="float:right;" href="deletePost.php?pid=<?= $post['pid'] ?>">Delete Post</a>
                        <?php } ?>
                    </article>
                <?php }
            } ?>


        </div>

    </main>
    <footer>
        <p>Copyright 2017</p>
    </footer>
    </body>
    </html>
<? $_SESSION['referer'] = 'home.php'; ?>