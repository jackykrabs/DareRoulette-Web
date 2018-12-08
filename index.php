<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <!--font-family: 'Pacifico', cursive;-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="homeStyle.css">
        <script src="https://cdn.firebase.com/libs/firebaseui/3.1.1/firebaseui.js"></script>
        <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.1.1/firebaseui.css" />
        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
        <title>Dare Roulette - Home</title>
    </head>
    <body>
        <?php 
            $_SESSION["username"] = "Guest";
            $_SESSION["auth"] = "false";
            if($_SESSION["wrongPass"] == NULL)
                $_SESSION["wrongPass"] = "false";
        
            if($_SESSION["wrongPass"] == "true") {
                echo "<script>alert('invalid username or password');</script>";
                $_SESSION["wrongPass"] = "false";
            }
        ?>
        <div class="header">
            <h1>Dare Roulette</h1>
        </div>
        <div id="greetingContainer">
            
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
                <button type="button" onclick="window.location.href = 'rules.html'">View Rules</button>
                <button type="button" onclick="continueAsGuest()">Play As Guest</button>
            </form>
        </div>
        <div id="videoContainer">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/4OA_9I0JtlE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <script>
            $(document).ready(function() {
                $.get("retreive_date.php", function(data){
                    $("#greetingContainer").html(data);
                });
            });
            function continueAsGuest() {
                window.location.href = 'settings.php';
            }
        </script>
    </body>  
</html>