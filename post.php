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
            <button class="big-buttons">New Post</button>
        </a>
    </div>
    <div id="center-container">
        <?php
        $post = [];
        if (!isset($_GET['pid'])) {
            echo "<a href=\"home.php\">No post selected!</a>";
        } else {
            // print out posts
            if ($error != null) {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
            } else {
                //good connection
                $stmt = $conn->prepare("SELECT pid, title, text, link, score FROM Posts WHERE pid = ?;");
                $stmt->bind_param("i", $_GET['pid']);
                $stmt->execute();
                $stmt->bind_result($pid, $title, $text, $link, $score);
                // fetch post
                if ($stmt->fetch()) {
                    $post = [
                        'pid' => $pid,
                        'title' => $title,
                        'text' => $text,
                        'link' => $link,
                        'score' => $score
                    ];
                    echo "<article><img src=\"images/placeholder.png\">
                            <a href=\"http://" . $post['link'] . "\"><p>" .
                        $post['title'] .
                        "</p></a>" .
                        $post['score'] .
                        "<p>" . $post['text'] . "</p>" .
                        "</article>";
                } else {
                    // no results for that pid
                    echo "<a href=\"home.php\">Post not available</a>";

                }


                $stmt->close();


            }
        }
        ?>
        <div class="comments">

        </div>
        <div class="comment">
            <?php if ($loggedIn) {
                $_SESSION['pid'] = $post['pid'];
                ?>
                <form id="commentForm" method="post">
                    <fieldset>Leave a comment</fieldset>
                    <textarea name="text"></textarea>
                    <input type="submit" value="leave comment">
                </form>
            <?php } else {
                echo "<p>You must bet logged in to comment.</p>";
            }
            ?>

        </div>
    </div>

</main>
<footer>
    <p>Copyright 2017</p>
</footer>
<script>
    (function worker() {
        $.ajax({
            url: 'updateComments.php?pid=<?=$post['pid'] ?>',
            success: function (data) {
                $('.comments').html(data);
            },
            complete: function () {
                // Schedule the next request when the current one's complete
                setTimeout(worker, 5000);
            }
        });
    })();
</script>
</body>
</html>
