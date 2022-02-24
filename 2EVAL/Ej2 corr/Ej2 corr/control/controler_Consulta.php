<?php
require_once("../modelo/bd_class.php");
$conec=new Conexion('oposiciones');
$c=$conec->bd_conect;
switch ($_POST['consultar']){
    case 'plaza':
        require_once("../modelo/model_class_oposiciones.php");
        $NuevoOpositor=new Opositor();
        $result=$NuevoOpositor->query_con_plaza($c);
        $datos=explode(";",$result);
        require_once("../vista/plaza.php");
        break;
    case 'bolsa':
        require_once("../modelo/model_class_oposiciones.php");
        $NuevoOpositor=new Opositor();
        $result = $NuevoOpositor->query_bolsa($c);
        $datos=explode(";",$result);
        require_once("../vista/bolsa.php");
        break;
    case 'no':
        require_once("../modelo/model_class_oposiciones.php");
        $NuevoOpositor=new Opositor();
        $result = $NuevoOpositor->query_no_aptos($c);
        $datos=explode(";",$result);
        require_once("../vista/no_aptos.php");
        break;
}
