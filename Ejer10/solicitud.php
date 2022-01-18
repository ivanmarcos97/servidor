<?php
    include_once("./productos.inc");
    
    if(isset($_POST['continuar'])){
            if(isset($_COOKIE['producto_selec'])){
                $guardar_carrito = $_COOKIE['producto_selec'];
                $guardar_carrito .= '-'.$_POST['producto'].'-'.$_POST['unidades'];
               setcookie('producto_selec',$guardar_carrito,time()+160);
                 
               
            }else{
                 setcookie('producto_selec', $_POST['producto'].'-'.$_POST['unidades'],time()+160);
                
            }
             header('location: carrito.php');
        }
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
    <form action="" method="POST">
        <label for="">Productos:
            <select name="producto">
                <?php
                foreach ($productos as $valor => $clave) {
                    echo '<option value="' . $valor . '">' . $valor . '</option>';
                }

                ?>
            </select>
            </label>
            <label for="">Unidades:
                <input type="number" name="unidades" min=1>
            </label>
        <input type="submit" name="continuar" value="Continuar">
    </form>
</body>

</html>