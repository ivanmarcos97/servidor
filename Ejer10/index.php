<?php 
    include_once("./productos.inc");
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;

        }
        table,td{
            border:1px solid black;
        
        }
        td{
            width: 60px;
            text-align: center;
        }

        .btn_solicitud{
            margin-top: 20px;
            background-color: green;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>
                Denominación
            </th>
            <th>
                Unidades
            </th>
            <th>
                Precio
            </th>
        </tr>
        <?php 
            foreach($productos as $clave => $valor){
                echo "<tr>";
                echo "<td>".$clave."</td>";
                foreach ($valor as $valores){
                
                    echo "<td>".$valores."</td>";
                }
                echo "</tr>";
            }
        
        ?>

    </table>
    <a href="./solicitud.php"> Solicitud de producto</a>


</body>
</html>