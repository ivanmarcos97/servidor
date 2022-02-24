<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            color: #318aac !important;
            font-size: 20px;
            font-weight: 500;
            padding: 0.5em 1.2em;
            background: rgba(0, 0, 0, 0);
            border: 2px solid;
            border-color: #318aac;
            transition: all 1s ease;
            position: relative;
        }

        input:hover {
            background: #318aac;
            color: #fff !important;
        }
    </style>
</head>

<body>


    <table border="1">
        <form action="../controlador/controlador_consultas.php" method="post">
            <table align="center" border="1">
                <tr>
                    <td>
                        Elegir una consulta:<br><br>
                        <select name="consulta">

                            <option value="conp">con plaza</option>
                            <option value="conbol">bolsa trabajo</option>
                            <option value="noap">no aptos</option>

                        </select>
                        <br>
                    </td>
                    <td align="center">
                        <input type="submit" name="Seguir" value="Seguir">

                    </td>
                </tr>
            </table>
        </form>
    </table>



</body>

</html>