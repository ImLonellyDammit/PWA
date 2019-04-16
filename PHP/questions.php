<?php

include "dbconn.php";
$aSource = $_POST['aSource'];
$mainPath = substr($aSource,strpos($aSource,"/") + 1,strlen($aSource));

// Question Retrieve
$result = $conn->query("SELECT * from video WHERE path = '$mainPath'");

if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc()) {
        $html = "<p class='h2'>" . $row['question'] . "</p>" .
                "<ul class='list-inline d-flex justify-content-md-center pt-3'>" . 
                    "<li class='list-inline-item pr-4 h3 text-center'>" . $row['opt1'] . "</li>" .
                    "<li class='list-inline-item pl-4 h3 text-center'>" . $row['opt2'] . "</li>" .
                "</ul>";
    }
    echo $html;
}
else
    echo "No Rows found: " . $mainPath;



