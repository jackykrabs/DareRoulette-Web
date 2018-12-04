<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login!</title>
    </head>
    <body>
        <?php
            if($_POST["authenticated"] == NULL)
                header("Location: index.php");
            else {
                $_SESSION["auth"] = "true";
                $_SESSION["uname"] = $_POST["uname"];
                header("Location: settings.php");
            }
        ?>
    </body>
</html>