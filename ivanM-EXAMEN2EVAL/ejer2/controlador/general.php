<?php
require_once("../modelo/bd_class.php");
$conec = new Conexion('oposiciones');
$c = $conec->bd_conect;

switch ($_POST['consulta']) {
    case 'consultar':
        require_once("../vista/consultar.php");

        break;
    case 'insertar':
        require_once("../vista/insertaropo.php");


        break;
    case 'borrar':
        require_once("../vista/borrar.php");


        break;
}
