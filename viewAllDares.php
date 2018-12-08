<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <!--THIS IS ONLY ACCESSIBLE IF THE USER IS LOGGED IN-->
        <link rel="stylesheet" type="text/css" href="showDareStyle.css">
        <title>Dare Roulette - All Dares</title>
    </head>
    <body>
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
        <div id=header>
            <h1>Dares in Database</h1>
        </div>
        <button onclick="window.location.href = 'settings.php';">Return to Settings</button>
        <?php
            if($_SESSION["username"] == "Guest") 
                header("Location: index.php");
        ?>
        <table id="dares">
            <tr>
                <th>Dare</th>
                <th>Mode</th>
                <th>Difficulty</th>
            </tr>
        </table>
        
        <script>
            var modes = ["classic" , "family"];
            var difficulties = ["easy", "medium", "hard"];
            
            var tableIndex = 0;
            for(var k = 0; k < 2; k++) {
                for(var i = 0; i < 3; i++) {                    
                    firebase.database().ref('dares/'+modes[k]+'/'+difficulties[i]).once('value').then(function(snapshot) {
                        var diff;
                        var mode;
                        switch(tableIndex) {
                            case 0:
                                mode = "Classic";
                                diff = "Easy";
                                break;
                            case 1:
                                mode = "Classic";
                                diff = "Medium";
                                break;
                            case 2:
                                mode = "Classic";
                                diff = "Hard";
                                break;
                            case 3:
                                mode = "Family";
                                diff = "Easy";
                                break;
                            case 4:
                                mode = "Family";
                                diff = "Medium";
                                break;
                            case 5:
                                mode = "Family";
                                diff = "Hard";
                                break;
                            default:
                                break;
                        }
                        tableIndex++;
                        snapshot.forEach(function (snapChild) {
                            $("#dares tbody").append(
                                "<tr> <td>" + snapChild.val().dare  + "</td>" +
                                "<td>" + mode + "</td>" +
                                "<td>" + diff + "</td></tr>"
                            );
                        });
                    });
                }
            }
            
                
        </script>
    </body>
</html>