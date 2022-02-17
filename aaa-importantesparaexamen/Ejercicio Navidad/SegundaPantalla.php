<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: auto;
            border: 1px solid black;
            width: 30%;
            height: 100px;
            text-align: center;
        }
        .enviar{
            background-color: lightblue;
            display: flex;
            margin: auto;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form action="./tratamiento.php" method="post">
        <label for="palabra">Eescriber la palabra mágica... </label><input name="palabra" type="text" id="palabra">
        <input type="submit" value="Enviar" class="enviar">
    </form>
    <?php
        session_start();
    ?>
</body>
</html>