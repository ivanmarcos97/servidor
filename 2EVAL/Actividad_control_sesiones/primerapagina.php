<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            background-color: skyblue;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $_SESSION["numero"] = random_int(1, 10);

    ?>
    <form action="segundapagina.php" target="" method="post">
        <fieldset>
            <p>¡JUEGA Y CONSIGUE TU PREMIO!</p>

            <input type="submit" name="enviar" value="Seguir" autofocus />
        </fieldset>
    </form>
</body>

</html>