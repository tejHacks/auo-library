<?php

// Set the default timezone and show the current day in the user's locale
date_default_timezone_set("Africa/Lagos");
$timezone = new DateTimeZone('Africa/Lagos');
$currentTime = new DateTime('now', $timezone);
$curentHour = $currentTime->format('H');

$greeting = getGreeting($currentHour);
$backgroundColor = getBackgroundColor($currentHour);





?>

<div class ="alert alert-<?php echo getAlertClass($backgroundColor); ?> " role="alert">
    <?php echo $greeting ; ?>    

</div>


<?php


function getGreeting($currentHour){
    if ($currentHour >= 0 && $currentHour  < 12){
        return "Good Morning";
    }elseif ($currentHour > 12 && $currentHour < 18){
        return "Good afternoon";
    }else{
        return "Good evening";
    }
}

function getBackgroundColor($currentHour){
    if ( $currentHour >= 0 && $currentHour < 12){
        return "FFD700"; //Yellow for morning though
    }elseif($currentHour >=12 && $currentHour < 18){
        return "#00FFFF"; // cyan for the evening too
    }else{
        return " #000000"; //BLACK FOR EVENING TIME
    }
}

function getAlertClass($backgroundColor){
    switch($backgroundColor){
        case "#FFD700":
            return "warning";
        case "#00FFFF":
            return "info";
        case "#000000":
            return "dark";
        default:
        return "secondary";
        
    }
}

?>