<?php
require_once("../modelo/bd_class.php");
$conect = new Conexion('oposiciones');
$c = $conect->bd_conect;
//echo $_POST["oposiciones"];
switch ($_POST['oposiciones']) {
    case 'consultar':
        require_once("../vista/datosoposi.php");
        break;
    case 'insertar':
        require_once("../vista/insertardatos.php");

        break;

        break;
    case 'borrar':
        require_once("../vista/borraropo.php");


        break;
}
