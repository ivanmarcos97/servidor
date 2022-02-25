<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPOSICIONES</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            padding: 15px;
        }
    </style>
</head>

<body>

    <table align="center" border="1">
        <tr>
            <td colspan="3" align="center">
                Turismo en burgos
            </td>
        </tr>
        <tr>
            <td>
                <form action="./controlador/consultar.php" method="POST">
                    <input type="submit" name="consultar" value="consultar">
                </form>
            </td>

            <td>
                <form action="./vista/insertardatos.php" method="POST">
                    <input type="submit" name="insertar" value="insertar">
                </form>
            </td>
            <td>
                <form action="./vista/modificarcategoria.php" method="POST">
                    <input type="submit" name="modificar" value="modificar">
                </form>
            </td>

        </tr>
    </table>

</body>

</html>