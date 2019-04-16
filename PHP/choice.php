<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include "dbconn.php";
    $aVideo = $_POST['aVideo']; // Current Video
    $option1text = $_POST['option1text']; // First Option
    $option2text = $_POST['option2text']; // Second Option
    $mainPath = substr($aVideo,strpos($aVideo,"/") + 1,strlen($aVideo));

    $removeVotingLines = "DELETE FROM voting"; // Delete every row from voting table

    if ($conn->query($removeVotingLines) === TRUE) // Verify if the query was sucessfully made 
    {
        $videoSelect = $conn->query("SELECT * FROM video WHERE path = '$mainPath'"); // Query to select the next video to play
        if ($videoSelect->num_rows > 0) 
        {
            while($rowVideo = $videoSelect->fetch_assoc()) {
                if ($option1text > $option2text) // Verify which option has more votes
                    echo "<source src='Media/" . $rowVideo['opt1path'] . "' type='video/mp4'>";
                else if($option2text > $option1text)
                    echo "<source src='Media/" . $rowVideo['opt2path'] . "' type='video/mp4'>";
            }
        }
        else
            echo "No Lines";
    }
}

?>