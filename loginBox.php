
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">x</span>
        <form id="signup" action="processSignup.php" method="post">
            <fieldset>
                <legend>sign up</legend>
                <br>
                <input placeholder="choose a username" type="text" class="username" name="username">
                <br><br>
                <input placeholder="choose a password" class="password" type="password" name="pass">
                <br>
                <input placeholder="re-enter password" type="password" class="password" name="pass2">
                <br><br>
                <input placeholder="enter email" type="email" class="email" name="email">
                <br>
                <input placeholder="re-enter email" type="email" class="email" name="email2">
                <br><br>
                <input class="buttons" type="submit" form="signup" value="create account">
            </fieldset>
        </form>

        <form id="login" method="post" action="processLogin.php">
            <fieldset>
                <legend>log in</legend>
                <br>
                <input name="username" type="text" class="username" placeholder="username">
                <br><br>
                <input placeholder="password" type="password" name="password" class="password">
                <br><br>
                <input class="buttons" form="login" type="submit" value="login">
            </fieldset>
        </form>
    </div>
</div>