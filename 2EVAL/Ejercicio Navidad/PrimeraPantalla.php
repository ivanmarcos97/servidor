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
        input{
            background-color: lightblue;
            display: flex;
            margin: auto;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p>¡JUEGA Y CONSIGUE TU PREMIO!</p>
    <a href="SegundaPantalla.php"><input type="submit" value="Enviar"></a>

    <?php
    session_start();
    $num = rand(1,10);
    $_SESSION['numero']=$num;
    ?>
</body>
</html>