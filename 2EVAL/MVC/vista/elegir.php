<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./controlador/general.php" method="post">
        <table align="center" border="1">
            <tr>
                <td>
                    Elegir una consulta:<br><br>
                    <select name="consulta">
                        <?php
                        $consulta = menuconsultas();
                        foreach ($consulta as $clave => $valor)
                            echo '<option value=' . $clave . '>' . $valor . '</option>';
                        ?>
                    </select>
                    <br>
                </td>
                <td align="center">
                    <input type="submit" name="Continuar" value="continuar">

                </td>
            </tr>
        </table>
    </form>
</body>

</html>