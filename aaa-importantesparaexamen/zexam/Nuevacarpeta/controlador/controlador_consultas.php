<?php
require_once("../modelo/bd_class.php");
$conect = new Conexion('oposiciones');
$c = $conect->bd_conect;
switch ($_POST['consulta']) {
    case 'conp':
        require_once("../modelo/model_class_oposiciones.php");
        $oposicion = new Oposicion();
        $result = $oposicion->query_mostrar_conplaza($c);
        $datos = explode(";", $result);
        require_once("../vista/opositoresconp.php");
        break;
    case 'conbol':
        require_once("../modelo/model_class_oposiciones.php");
        $oposicion = new Oposicion();
        $result = $oposicion->query_mostrar_bolsatra($c);
        $datos = explode(";", $result);
        require_once("../vista/opositoresconbolsa.php");
        break;
    case 'noap':
        require_once("../modelo/model_class_oposiciones.php");
        $oposicion = new Oposicion();
        $result = $oposicion->query_mostrar_noap($c);
        $datos = explode(";", $result);
        require_once("../vista/opositoresnoap.php");
        break;
}
