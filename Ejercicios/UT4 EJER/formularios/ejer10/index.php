<?php
require_once("../../../../libreriaphp/FUNCIONES.php");
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
    echo contiene();
    ?>
    <form action="" method="post">
        <fieldset>
            <label for="a">Frase: </label>
            <input type="text" name="frase" id="a" required><br>
            <label for="b">Busca: </label>
            <input type="text" name="caracter" id="b" required><br>
            <input type="submit" name="enviar" value="Enviar">
        </fieldset>
    </form>
</body>

</html>