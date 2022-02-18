<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <table border="1">
        <form action="./controlador/general.php" method="post">
            <table align="center" border="1">
                <tr>
                    <td>
                        Elegir una consulta:<br><br>
                        <select name="consulta">

                            <option value="insertar">insertar</option>
                            <option value="borrar">borrar</option>
                            <option value="consultar">consultar</option>

                        </select>
                        <br>
                    </td>
                    <td align="center">
                        <input type="submit" name="Continuar" value="continuar">

                    </td>
                </tr>
            </table>
        </form>
    </table>
</body>

</html>