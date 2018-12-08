<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="homeStyle.css">
    </head>
    <body>
        <form action="dareRoulette.php" method="post">
        <?php 
            if($_SESSION["auth"] != "true" && $_SESSION['username'] != "Guest")
                header("Location: index.php");
            $_SESSION["mode"] = $_POST["rating"];
            $_SESSION["numSkips"] = $_POST["numSkips"];
            $_SESSION["numPlayers"] = $_POST["numPlayers"];
            $numOfPlayers = $_POST["numPlayers"];
            for($i = 0; $i < $numOfPlayers; $i+=1) {
                echo("<div id='playerLabel'>Player ".($i + 1)." Name: </div>");
                echo("<input type='text' name='player".$i."Name'><br>");
            }
        ?>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>