<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
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
        <div id="darePresenter">
            <div id="currentPresenter">
            </div>
            <div id="action">
            </div>
            <button id="complete" onclick="completeDare()">Completed</button>
            <button id="skip" onclick="useSkip()">Skip</button>
        </div>

        <div class="optionContainer" id="easy">
            <button onclick="fire(2)">Easy</button>
        </div>
        <div class="optionContainer" id="medium">
            <button onclick="fire(3)">Medium</button>
        </div>
        <div class="optionContainer" id="hard">
            <button onclick="fire(5)">Hard</button>
        </div>
        <?php
            $numSkips = $_SESSION["numSkips"];
            $numOfPlayers = $_SESSION["numPlayers"];
        for($i = 0; $i < $numOfPlayers; $i++) {
            echo "<div class='playerContainer' id='player".$i."'>
                    <h2>Name: ".$_POST['player'.$i.'Name']."<br>
                    <h2 id='player".$i."skips'>Skips: ".$_SESSION["numSkips"]."<br>
                   </div>";
        }
        ?>
        <script>
            var numPlayers = <?php echo $_SESSION['numPlayers']; ?>;
            var dareInProgress = 0;
            var currentPlayersTurn = 0;
//            var playerNames = [ <?php
//                                for($x = 0; $x < $_SESSION['numPlayers'] - 1; $x++)
//                                    echo "\"".$_POST['player'.$x.'Name']."\", ";
//                                echo "\"".$_POST['player'.$_SESSION['numPlayers'] - 1 .'Name']."\""; ?> 
//            console.dir(playerNames);
            $("#currentPresenter").html("Player Up: " + (currentPlayersTurn + 1));
            $("#action").html("Please fire a dare gun");
            var skipsLeft = [ <?php
                             for($x = 0; $x < $_SESSION["numPlayers"] - 1; $x++)
                                echo $_SESSION["numSkips"].", ";
                             echo $_SESSION["numSkips"];
                             ?> ];
            for(var i = 0; i < numPlayers; i++)
                console.log(skipsLeft[i]);
            function iterateTurn() {
                currentPlayersTurn++;
                if(currentPlayersTurn == numPlayers)
                    currentPlayersTurn = 0;
                $("#currentPresenter").html("Player Up: " +  (currentPlayersTurn + 1));
                $("#action").html("Please fire a dare gun");
            }
            function useSkip() {
                if(skipsLeft[currentPlayersTurn] != 0)
                    skipsLeft[currentPlayersTurn]--;
                else 
                    alert("You have no skips left!  Looks like you have to do the dare!");
                $("#player"+currentPlayersTurn+"skips").html("Skips: " + skipsLeft[currentPlayersTurn]);
                dareInProgress = 0;
                iterateTurn();
            }
            
            function fire(denominator) {
                if(dareInProgress == 1)
                    return;
                dareInProgress = 1;
                if(Math.floor(Math.random() * denominator) == 0){
                    //dare counts, now retreive proper dare
                    $("#action").html("*boom* Ha!  Do the dare!");
                } else {
                    $("#action").html("*click* huh.  Looks like you got off lucky...");
                }  
            }
            
            function completeDare() {
                dareInProgress = 0;
                iterateTurn();
            }
            
            //TODO: Create function to retreive a random dare from Firebase database, given a difficulty, and 
            //whether or not it's family mode
            function retrieveDare(int difficulty) {
                
            }
        </script>
    </body>
</html>