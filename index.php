<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <!--font-family: 'Pacifico', cursive;-->
        <link rel="stylesheet" type="text/css" href="homeStyle.css">
        <script src="https://cdn.firebase.com/libs/firebaseui/3.1.1/firebaseui.js"></script>
        <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.1.1/firebaseui.css" />
        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
        <title>Dare Roulette - Home</title>
    </head>
    <body>
        <div class="header">
            <h1>Dare Roulette</h1>
        </div>
        <div class="loginContainer">
            <form action="login.php" method="post">
                <input type="hidden" name="authenticated" value="itsureis">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Username" name="username" required>
                <br>
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Password" name="password" required>
                <br>
                <button type="submit">Login</button>
                <button type="button" onclick="window.location.href = 'createUser.html'">Create Account</button>
                <button type="button" onclick="continueAsGuest()">Play As Guest</button>
            </form>
        </div>
        <script>
            function continueAsGuest() {
                console.log("going...");
                <?php 
                    $_SESSION["username"] = "Guest";
                ?>
                window.location.href = 'settings.php';
            }
        </script>
    </body>  
</html>