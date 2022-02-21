<?php
require_once("../modelo/bd_class.php");
$conec = new Conexion('oposiciones');
$c = $conec->bd_conect;

switch ($_POST['consul']) {
    case 'conp':

        require_once("../modelo/model_class_oposicion.php");
        $opo = new Oposicion();
        $result = $opo->query_conplaza($c);
        $datos = explode(";", $result);
        require_once("../vista/conplaza.php");
        break;
    case 'conbol':

        require_once("../modelo/model_class_oposicion.php");
        $opo = new Oposicion();
        $result = $opo->query_conbol($c);
        $datos = explode(";", $result);
        require_once("../vista/conbol.php");
        break;
    case 'noap':

        require_once("../modelo/model_class_oposicion.php");
        $opo = new Oposicion();
        $result = $opo->query_noap($c);
        $datos = $result;
        require_once("../vista/noap.php");
        break;
}
