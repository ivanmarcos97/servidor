<?php
session_start();
if ($_POST['palabra']=="Navidad" && $_SESSION['numero'] % 2 == 0 && strlen($_POST['palabra'])==7){
    echo'<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            html{
                background-image: url(image/balloon.gif);
                background-repeat: no-repeat;
                background-size: cover;
            }
            body {
                margin: auto;
                border: 1px solid black;
                width: 30%;
                height: 100px;
                text-align: center;
                background-color:white;
            }
    
            h1 {
                color: blueviolet;
            }
            img{
                width: 400px;
                height: 400px;
            }
        </style>
    </head>
    <body>
        <h1>¡Lo lograste!</h1>
        <p>Felicidades, has ganado un premio</p>
    </body>
    </html>';
    exit;
}else{
    echo'<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body {
                margin: auto;
                border: 1px solid black;
                width: 30%;
                height: 100px;
                text-align: center;
            }
    
            h1 {
                color: blueviolet;
            }
            img{
                width: 400px;
                height: 400px;
            }
        </style>
    </head>
    <body>
        <h1>¡Casi...!</h1>
        <p>Vuleve a intentarlo,<a href="PrimeraPantalla.php">Volver al inicio</a></p>
        <img src="image/error.gif"/>
    </body>
    </html>';
    exit;
}
session_destroy();
?>