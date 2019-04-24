<?php

include "dbconn.php";

$clickedBtn = $_POST['clickedBtn']; // Text attached to the clicked button
$videoCorresp = $conn->query("SELECT * FROM video INNER JOIN vidstatus ON video.path = vidstatus.video_actual"); // Needed query to obtain current Cod Video


if($videoCorresp->num_rows == 1)
{
    while($row = $videoCorresp->fetch_assoc())
    {   
        $videoPath = $row['codvideo'];
    
        $localIP = getHostByName(getHostName()); // User personal IPv4
        $incompleteIP = substr($localIP,0,strrpos($localIP,'.'));
        $incomplete = $incompleteIP . ".1";
        $votingLine = "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";
        $incomplete = $incompleteIP . ".2";
        $votingLine .= "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";
        $incomplete = $incompleteIP . ".3";
        $votingLine .= "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";
        $incomplete = $incompleteIP . ".4";
        $votingLine .= "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";
        $incomplete = $incompleteIP . ".5";
        $votingLine .= "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";
        $incomplete = $incompleteIP . ".6";
        $votingLine .= "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";
        $incomplete = $incompleteIP . ".7";
        $votingLine .= "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";
        $incomplete = $incompleteIP . ".8";
        $votingLine .= "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";
        $incomplete = $incompleteIP . ".9";
        $votingLine .= "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";
        $incomplete = $incompleteIP . ".10";
        $votingLine .= "INSERT INTO voting (userip,codvideo,coption) 
        VALUES('$incomplete','$videoPath','$clickedBtn');";

        if($conn->multi_query($votingLine) === TRUE)
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span></button>Obrigado pelo seu voto!</div>";
        else
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span></button>Voce deu o seu voto! Espere pela próxima ocasião</div>";
    }
}
