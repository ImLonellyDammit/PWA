<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Filme</title>
    <link rel="stylesheet" type="text/css" href="CSS/Core/normalize.css">
    <link rel="stylesheet" type="text/css" href="CSS/Bootstrap Libraries/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/Core/main.css">
    <style>
        body{
            background-color: #87CEFA;
        }

        p.text-center{
            font-size: 4vw;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-sm bg-dark justify-content-center">
        <a class="navbar-brand text-white" href="#">Reação</a>  
    </nav>
</header>

<div class="pt-5 container-fluid text-center">
    <h1 class="pb-5">Filme</h1>
    <div class="row justify-content-md-center" id="video-container">
        <video class="col-md-12" id="video" controls style="padding:0;" preload="auto">
            <source src="Media/v1.mp4" type="video/mp4">
        </video>
        <div id="ending-container">
            <div id="labels-container">
            </div>
            <form method="post" id="ajax-form" class="d-inline-block" action="PHP/choice.php">
                <div class="d-flex">
                    <label name="opt1" id="opt1" class="bg-success rounded" style="font-size:2vw;padding:2vw;">0%</label>
                    <button type="submit" id="btn" class="btn btn-primary ml-2 mr-2" style="font-size:2vw;padding:2vw;margin-bottom:7px;"> ENCERRAR VOTACAO</button>
                    <label name="opt2" id="opt2" class="bg-success rounded" style="font-size:2vw;padding:2vw;">0%</label> 
                </div>    
            </form>
        </div>
    </div>            
</div>

<script src="JS/Core/jquery-3.3.1.min.js"></script>
<script src="JS/Core/popper.min.js"></script>
<script src="JS/Bootstrap Libraries/bootstrap.bundle.min.js"></script>
<script src="JS/Core/main.js"></script>
<script src="JS/Core/voting.js"></script>

</body>
</html>
