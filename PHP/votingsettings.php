<?php

include "dbconn.php";
$aSource = $_POST['aSource'];
$mainPath = substr($aSource,strpos($aSource,"/") + 1,strlen($aSource));

$lineCheck = $conn->query("SELECT * FROM vidstatus");
if ($lineCheck->num_rows != 1)
{
    $lineInsert = "INSERT INTO vidstatus(video_actual,video_status) VALUES ('$mainPath',1);";
    if($conn->query($lineInsert) === TRUE)
        echo "Inserted";
    else
        echo "Error: " . $conn->error;
}
else
    echo "What";

?>