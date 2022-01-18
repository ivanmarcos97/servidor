<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            justify-content: space-evenly;
        }

        .menu {
            background-color: green;
            border: 2px solid black;
            width: 100px;
            padding: 10px;
            text-align: center;
            border-radius: 5px;

        }

        a {
            text-decoration: none;
            color: black;
        }

        table,
        td {
            border: 1px solid black;
        }

        table {
            border-top-width: 150 px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="pagar menu"><a href="./pagar.php">Pagar</a></div>
        <div class="inicio menu"><a href="./index.php">Inicio</a></div>
        <div class="salir menu"><a href="./salir.php">Salir</a></div>
    </div>
    <table>
        <tr>
            <td>Denominación</td>
            <td>Unidades</td>
        </tr>
        
            <?php
            $contador=0;
            $productos_carrito = explode('-', $_COOKIE['producto_selec']);
            
           
                foreach ($productos_carrito as $producto) {
                    if($contador % 2 == 0){
                        echo '<tr>';
                        echo '<td>' . $producto . '</td>';
                    }else if ($contador % 2 == 1){
                        echo '<td>' . $producto . '</td>';
                        echo '</tr>';
                    }
                    $contador ++;
                
            }
           
            
            ?>

        
    </table>



</body>

</html>