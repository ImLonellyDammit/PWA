<?php

include "dbconn.php";

$statusDelete = "DELETE FROM vidstatus";
if($conn->query($statusDelete) === TRUE)
    echo "Deu";  
else
    echo $conn->error;

?>