<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Settings</title>
    </head>
    <body>
        <?php
            if($_SESSION["auth"] == NULL){
                header("Location: index.php");
                exit;
            }
            echo "Welcome, ".$_SESSION["uname"]."!";
        ?>
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
            <br>
            <label for="rating">Rating</label>
            <input type="radio" name="rating" value="classic" checked> Classic
            <input type="radio" name="rating" value="family"> Family
            <br>
            <label for="numSkips">Number of Skips per Player</label>
            <select name="numSkips">
                <option value=0>0</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
            </select>
            <br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>