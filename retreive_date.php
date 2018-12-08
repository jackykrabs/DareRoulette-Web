<?php
    $day = "Happy ".date("l")."!";
    $message;
    switch(date('l')){
        case "Monday":
            $message = "Let's start the week off right!";
            break;
        case "Tuesday":
            $message = "Already a day into the week!";
            break;
        case "Wednesday":
            $message = "Halfway to the weekend!";
            break;
        case "Thursday":
            $message = "One more day til Friday!";
            break;
        case "Friday":
            $message = "Cheers to the freakin weekend!";
            break;
        case "Saturday":
            $message = "Have a great Saturday!";
            break;
        case "Sunday":
            $message = "Hope you had a good weekend!";
            break;
        default:
            break;
    }

    echo $day." ".$message;
?>