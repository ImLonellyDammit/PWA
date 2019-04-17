<?php

include "dbconn.php";


// Verifies if there's any line there... 
$lineCheck = $conn->query("SELECT * FROM vidstatus");
// Retrieves the question info for the current video 
$btnOptValue = $conn->query("SELECT * FROM video INNER JOIN vidstatus ON video.path = vidstatus.video_actual ");

if($lineCheck->num_rows == 1)
{
    if($btnOptValue->num_rows == 1)
    {
        while($row = $btnOptValue->fetch_assoc())
        {
            if($row['ending'] == 1)
                echo "<p class='display-2 text-center' id='once'>O Filme Acabou! Obrigado pela sua participação</p>";
                // Se o video ativo for um dos videos finais, então o utilizador ira ver a mensagem acima referênciada
                // Porém... o video fica marcado como ativo na tabela de estado na BD até ser retirado manualmente                    
            else
            {
                $votingButtonsHTML = "<p class='display-2 text-center'>" . $row['question'] . "</p><br>" . 
                                    "<div class='d-flex justify-content-center' id='exist'>" . 
                                    "<button type='button' class='btn btn-warning btn-outline-dark pt-4 pb-4 pl-5 pr-5 m-3' id='opt1btn'>" . $row['opt1'] . "</button>" . 
                                    "<button type='button' class='btn btn-warning btn-outline-dark pt-4 pb-4 pl-5 pr-5 m-3' id='opt2btn'>" . $row['opt2'] . "</button>" .
                                    "</div>";
                
                echo $votingButtonsHTML;
            }
        }
    }
}
else
    echo "<p class='display-2 text-center' id='once'>Votação ainda não está aberta!</p>";
