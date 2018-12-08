<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="gameStyle.css">
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
        <audio id="cock" src="gun_cock.mp3"></audio>
        <audio id="click" src="gun_click.mp3"></audio>
        <audio id="boo" src="boo.mp3"></audio>
        <audio id="shot" src="gun_shot.mp3"></audio>
        
        <?php
            if($_SESSION['username'] == 'test'){
                    echo "<button onclick='logout()'>Logout</button><br>";
            }
        ?>
        <div id="darePresenter">
            <div id="currentPresenter">
            </div>
            <div id="action">
            </div>
            <button id="complete">Completed</button>
            <button id="skip">Skip</button>
        </div>
        <div id="gunContainer">
            <div class="optionContainer" id="easy">
                <img src="easy_gun.png" height=125px width=225px alt="easy">
                <button onclick="fire(2, 0)">Easy</button>
            </div>
            <div class="optionContainer" id="medium">
                <div><img src="medium_gun.png" height=125px width=225px alt="medium"></div>
                <div><button onclick="fire(3, 1)">Medium</button></div>
            </div>
            <div class="optionContainer" id="hard">
                <img src="hard_gun.jpg" height=125px width=225px alt="hard">
                <button onclick="fire(5, 2)">Hard</button>
            </div>
        </div>
        <br>
        <div id="groupContainer">
            <?php
                if($_SESSION['auth'] != "true" && $_SESSION['username'] != "Guest")
                    header("Location: index.php");
                $numSkips = $_SESSION["numSkips"];
                $numOfPlayers = $_SESSION["numPlayers"];
            for($i = 0; $i < $numOfPlayers; $i++) {
                echo "<div class='playerContainer' id='player".$i."'>
                        <h2>Name: ".$_POST['player'.$i.'Name']."<br>
                        <h2 id='player".$i."skips'>Skips: ".$_SESSION["numSkips"]."<br>
                       </div>";
            }
            ?>
        </div>
        <script>
            var difficulty = <?php echo $_SESSION['mode']; ?>;
            var numPlayers = <?php echo $_SESSION['numPlayers']; ?>;
            var dareInProgress = 0;
            var currentPlayersTurn = 0;

            $("#currentPresenter").html("Player Up: " + (currentPlayersTurn + 1));
            $("#player"+currentPlayersTurn).css("border", "5px solid turquoise");
            $("#action").html("Please fire a dare gun");
            var skipsLeft = [ <?php
                             for($x = 0; $x < $_SESSION["numPlayers"] - 1; $x++)
                                echo $_SESSION["numSkips"].", ";
                             echo $_SESSION["numSkips"];
                             ?> ];

            function iterateTurn() {
                $("#player"+currentPlayersTurn).css("border", "5px solid black");
                currentPlayersTurn++;
                if(currentPlayersTurn == numPlayers)
                    currentPlayersTurn = 0;
                $("#player"+currentPlayersTurn).css("border", "5px solid turquoise");
                $("#currentPresenter").html("Player Up: " + (currentPlayersTurn + 1));
                $("#action").html("Please fire a dare gun");
                var audio = document.getElementById("cock");
                audio.play();
            }
            $("#skip").click(function() {
                var audio = document.getElementById("boo");
                audio.play();
                if(skipsLeft[currentPlayersTurn] != 0){
                    skipsLeft[currentPlayersTurn]--;
                  $("#player"+currentPlayersTurn+"skips").html("Skips: " + skipsLeft[currentPlayersTurn]);
                    dareInProgress = 0;
                    iterateTurn();
                }
                else 
                    alert("You have no skips left!  Looks like you have to do the dare!");
              
            });
            
            function fire(denominator, diff) {
                if(dareInProgress == 1)
                    return;
                dareInProgress = 1;
                if(Math.floor(Math.random() * denominator) == 0){
                    //dare counts, now retreive proper dare
                    $("#action").html("*boom* Ha!  Do the dare!");
                    retrieveDare(diff, difficulty);
                    var audio = document.getElementById("shot");
                    audio.play();
                } else {
                    $("#action").html("*click* huh.  Looks like you got off lucky...");
                    var audio = document.getElementById("click");
                    audio.play();
                }  
            }
            
            $("#complete").click(function() {
                dareInProgress = 0;
                iterateTurn();
            });
            
            function logout(){
                window.location.href = "index.php";
            }
            
            //TODO: Create function to retreive a random dare from Firebase database, given a difficulty, and 
            //whether or not it's family mode
            function retrieveDare(difficulty,  mode) {
                var modeStr;
                var diffStr;
                switch(mode){
                    case 0:
                        modeStr = "classic";
                        break;
                    case 1:
                        modeStr = "family";
                        break;
                    default:
                        break;
                }
                
                switch(difficulty) {
                    case 0:
                        diffStr = "easy";
                        break;
                    case 1:
                        diffStr = "medium";
                        break;
                    case 2:
                        diffStr = "hard";
                        break;
                    default: break;
                }
                
                var count = 0;
                firebase.database().ref('dares/' + modeStr + "/" + diffStr ).once('value').then(function(snapshot) {
                    var localArray = [];
                    snapshot.forEach(function (snapChild) {
                        localArray.push(snapChild.val().dare);
                    });
                    
                    var randIndex = Math.floor(Math.random() * localArray.length)
                    $("#action").html(localArray[randIndex]);
                });
                
               
            }
        </script>
    </body>
</html>