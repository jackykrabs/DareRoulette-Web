<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="homeStyle.css">
        <title>Settings</title>
    </head>
    <body>
        <div id="settingsHeader">
        <?php
            if($_SESSION['auth'] != "true" && $_SESSION['username'] != "Guest")
                header("Location: index.php");
            echo "<h1>Welcome, ".$_SESSION['username']."!</h1>";
            if($_SESSION['username'] == 'test')
                echo "<br><b>User Authenticated...full access granted.</b><br>";
        ?>
        </div>
        <div id="formContainer">
        <form action="settings2.php" method="post">
            <label for="numPlayers">Number of Players</label>
            <select name="numPlayers">
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
            </select>
            <br><br>
            <label for="rating">Rating</label>
            <input type="radio" name="rating" value=0 checked> Classic
            <input type="radio" name="rating" value=1> Family
            <br><br>
            <label for="numSkips">Number of Skips per Player</label>
            <select name="numSkips">
                <option value=0>0</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
            </select>
            <br><br><br>
            <button type="submit">Submit</button>
        </form>
  
            <?php
            if($_SESSION['username'] == 'test'){
                    echo "<br><button onclick='showAllDares()'>Show All Dares</button><br>";
                    echo "<button onclick='logout()'>Logout</button><br>";
            }
            
            ?>
        </div>
        <script>
            function logout() {
                window.location.href = "index.php";
            }
            
            function showAllDares() {
                window.location.href = "viewAllDares.php";
            }
        </script>
    </body>
</html>