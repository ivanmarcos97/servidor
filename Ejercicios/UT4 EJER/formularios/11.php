<?php
require_once("../../../libreriaphp/FUNCIONES.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo login();
    ?>
    <form action="" method="post">
        <fieldset>
            <label for="a">Nombre:</label>
            <input type="text" name="usu" id="a" required><br>
            <label for="b">Contraseña:</label>
            <input type="password" name="pass" id="b" required><br>
            <input type="submit" name="enviar" value="Enviar">
        </fieldset>
    </form>
</body>

</html>