<?php

include "dbconn.php";

$clickedBtn = $_POST['clickedBtn']; // Text attached to the clicked button
$fp = $_POST['fp']; // User Fingerprint
$videoCorresp = $conn->query("SELECT * FROM video INNER JOIN vidstatus ON video.path = vidstatus.video_actual"); // Needed query to obtain current Cod Video


if($videoCorresp->num_rows == 1)
{
    while($row = $videoCorresp->fetch_assoc())
    {   
        $videoPath = $row['codvideo'];
        $votingLine = "INSERT INTO voting (fp,codvideo,coption) 
        VALUES('$fp','$videoPath','$clickedBtn');";

        if($conn->query($votingLine) === TRUE)
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span></button>Obrigado pelo seu voto!</div>";
        else
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span></button>Voce deu o seu voto! Espere pela próxima ocasião</div>";
    }
}
