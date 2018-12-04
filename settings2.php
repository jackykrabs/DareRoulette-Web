<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
    </head>
    <body>
        <form action="dareRoulette.php" method="post">
        <?php 
            if($_SESSION["auth"] == NULL)
                header("Location: index.php");
        
            $_SESSION["numSkips"] = $_POST["numSkips"];
            $_SESSION["numPlayers"] = $_POST["numPlayers"];
            $numOfPlayers = $_POST["numPlayers"];
            for($i = 0; $i < $numOfPlayers; $i+=1) {
                echo("Player ".($i + 1)." Name: ");
                echo("<input type='text' name='player".$i."Name'><br>");
            }
        ?>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>