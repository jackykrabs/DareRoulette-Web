<!DOCTYPE HTML>
<html>
    <head>
        <!--font-family: 'Pacifico', cursive;-->
        <link rel="stylesheet" type="text/css" href="homeStyle.css">
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
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Username" name="uname" required>
                <br>
                <label for="pass"><b>Password</b></label>
                <input type="password" placeholder="Password" name="pass" required>
                <br>
                <button type="submit">Login</button>
                <button type="button">Create Account</button>
                <button type="button">Play As Guest</button>
            </form>
        </div>
    </body>
</html>