<?php

include "dbconn.php";
// Count total votes for the second option
$option2Update = "SELECT COUNT(coption) AS PeopleWhoChooseOpt2 FROM voting INNER JOIN video ON voting.coption = video.opt2";
$opt2Update = $conn->query($option2Update);

if ($opt2Update->num_rows == 1) 
{
    $totalVotes = "SELECT COUNT(coption) AS TotalVotes FROM voting INNER JOIN video ON (voting.coption = video.opt1) OR (voting.coption = video.opt2)";
    $tvUpdate = $conn->query($totalVotes);
    if ($tvUpdate->num_rows == 1)
    {
        while($rowOpt2 = $opt2Update->fetch_assoc())
            $votesForOpt2 = $rowOpt2['PeopleWhoChooseOpt2'];

        while($rowVotes = $tvUpdate->fetch_assoc())
            $totalVotesUpdate = $rowVotes['TotalVotes'];
        
        if($totalVotesUpdate > 0)
        {
            $avgPercentage = ($votesForOpt2 * 100) / $totalVotesUpdate;
            echo round($avgPercentage,0);
        }
        else
            echo "0";
    }
    //echo $votesForOpt2;  
}
   
   
