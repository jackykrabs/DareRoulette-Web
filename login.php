<?php
    session_start();

     if($_POST["username"] == 'test' && $_POST["password"] == "pass") {
            $_SESSION["auth"] = "true";
            $_SESSION["wrongPass"] = "false";
            $_SESSION["username"] = $_POST["username"];
            header("Location: settings.php");
        }
        else {
            $_SESSION["wrongPass"] = "true";
            header("Location: index.php");
        }
?>
