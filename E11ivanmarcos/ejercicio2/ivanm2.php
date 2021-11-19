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
    
    require_once("./validacionivanm2.php");
    require_once("./clase_libroivanm2.php");

    $tit=$pre=$fecha="";
$errores['errorpre']="";


    if (isset($_POST["enviar"])) {
        valida_precio($pre, $errores["errorpre"]);
        if ((!empty($tit)) && (!empty($pre)) && (!empty($fecha))) {
            $lib1 = new Libro($tit, $pre, $fecha);
            echo $lib1->calculodescuento();
            exit;
        }
    }
    ?>

    <form action="" target="_nblank" method="post">
       Teclee el titulo: <input type="text" name="tit" value="<?php echo "$tit" ?>">
        <span>
            <font color="red"> * obligatorio </font>
        </span><br>
        Teclee el precio: <input type="text" name="pre" value="<?php echo "$pre" ?>">
        <span>
            <font color="red"> * obligatorio <?php echo $errores["errorpre"]; ?> </font>
        </span><br>
        Elige la fecha de compra: 
        <input type="radio" name="fecha" value="nav" checked/>Navidad
        <input type="radio" name="fecha" value="felib" />Feria del libro
        
        <input type="submit" name="enviar">
    </form>

</body>

</html>