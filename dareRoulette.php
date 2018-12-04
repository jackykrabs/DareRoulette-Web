<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <script src="https://www.gstatic.com/firebasejs/5.6.0/firebase.js"></script>
        <script>
          // Initialize Firebase
          var config = {
            apiKey: "AIzaSyDY9l0sP24x6mpFuetuodT7E9FJGWePfVA",
            authDomain: "dare-roulette.firebaseapp.com",
            databaseURL: "https://dare-roulette.firebaseio.com",
            projectId: "dare-roulette",
            storageBucket: "dare-roulette.appspot.com",
            messagingSenderId: "522676418195"
          };
          firebase.initializeApp(config);
        </script>
    </head>
    <body>
        <?php
            $numSkips = $_SESSION["numSkips"];
            $numOfPlayers = $_SESSION["numPlayers"];
        for($i = 0; $i < $numOfPlayers; $i++) {
            $key = "player".$i."Name";
            echo $_POST[$key]." is in the game and has ".$numSkips." skips left <br>";
        }
        ?>
    </body>
</html>