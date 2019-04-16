<?php

include "dbconn.php";
// Count total votes for the first option
$option1Update = "SELECT COUNT(coption) AS PeopleWhoChooseOpt1 FROM voting INNER JOIN video ON voting.coption = video.opt1";

$opt1Update = $conn->query($option1Update);

if ($opt1Update->num_rows == 1) 
{
    while($row = $opt1Update->fetch_assoc())
        $votesForOpt1 = $row['PeopleWhoChooseOpt1'];
        
    echo $votesForOpt1;
}