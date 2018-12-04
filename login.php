<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Logging in...</title>
    </head>
    <body>
        <?php
            if($_POST["authenticated"] == NULL)
                header("Location: index.php");
        
            if($_POST["username"] == 'test' && $_POST["password"] == "pass") {
                $_SESSION["auth"] = "true";
                $_SESSION["username"] = $_POST["username"];
                header("Location: settings.php");
            }
            else {
                header("Location: index.php");
            }
        ?>
    </body>
</html>