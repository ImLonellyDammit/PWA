<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Votação</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="Creator: Marco Ribeiro,
    Images: Tecnico de Multimédia (IEFP), Category: Interactive Film,
    Length: 5 scroll pages + 1 separated">
    <meta name="theme-color" content="#FFFFFF"/>
    <link rel="icon" href="IMG/icons/icon_144x144.png" sizes="114x114">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" type="text/css" href="CSS/Core/normalize.css">
    <link rel="stylesheet" type="text/css" href="CSS/Bootstrap Libraries/bootstrap.min.css">
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
    
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-9 mx-auto p-5" id="content-container">
                <div class="d-flex justify-content-center" id="votting-button">
                    <button type="button" class="btn btn-warning btn-outline-dark pt-4 pb-4 pl-5 pr-5 m-3" id="voting-btn">Votar!</button>
                </div>
            </div>
        </div>
    </div>   

    <div id="fingerprint" style="display:none;"></div>

    <script src="JS/Core/jquery-3.3.1.min.js"></script>
    <script src="JS/Core/popper.min.js"></script>
    <script src="JS/Bootstrap Libraries/bootstrap.bundle.min.js"></script>
    <script src="JS/Core/sw-config.js"></script>
    <script src="JS/Core/fingerprint.js"></script>
    <script src="JS/Core/voting.js"></script>
</body>
</html>