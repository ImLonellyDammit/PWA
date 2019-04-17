<?php

include "dbconn.php";
// Count total votes for the first option
$option1Update = "SELECT COUNT(coption) AS PeopleWhoChooseOpt1 FROM voting INNER JOIN video ON voting.coption = video.opt1";
$opt1Update = $conn->query($option1Update);

if ($opt1Update->num_rows == 1) 
{     
    $totalVotes = "SELECT COUNT(coption) AS TotalVotes FROM voting INNER JOIN video ON (voting.coption = video.opt1) OR (voting.coption = video.opt2)";
    $tvUpdate = $conn->query($totalVotes);
    if ($tvUpdate->num_rows == 1)
    {
        while($row = $opt1Update->fetch_assoc())
            $votesForOpt1 = $row['PeopleWhoChooseOpt1'];
        
        while($rowVotes = $tvUpdate->fetch_assoc())
            $totalVotesUpdate = $rowVotes['TotalVotes'];
        
        if($totalVotesUpdate > 0)
        {
            $avgPercentage = ($votesForOpt1 * 100) / $totalVotesUpdate;
            echo round($avgPercentage,0);   
            
        }
        else
            echo "0";
    }
    //echo $votesForOpt1;
}   
        
