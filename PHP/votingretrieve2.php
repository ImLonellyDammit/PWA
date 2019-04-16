<?php

include "dbconn.php";
// Count total votes for the second option
$option2Update = "SELECT COUNT(coption) AS PeopleWhoChooseOpt2 FROM voting INNER JOIN video ON voting.coption = video.opt2";

$opt2Update = $conn->query($option2Update);

if ($opt2Update->num_rows == 1) 
{
   while($rowOpt2 = $opt2Update->fetch_assoc())
        $votesForOpt2 = $rowOpt2['PeopleWhoChooseOpt2'];

    echo $votesForOpt2;
}