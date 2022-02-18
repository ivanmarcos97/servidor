<?php
require_once("../modelo/bd_class.php");
$conec = new Conexion('oposiciones');
$c = $conec->bd_conect;
switch ($_POST['consulta']) {
    case 'consultar':
        require_once("../modelo/model_class_opos.php");
        $opo = new Opo();
        //$result = $opo->query_mostar($c);
        $datos = explode(";", $result);
        require_once("../vista/peliculas_drama.php");
        break;
    case 'insertar':

        require_once("./controlador/control_opos.php");


        break;
    case 'borrar':
        require_once("../modelo/model_class_opos.php");
        $opo = new Opo();
        $result = $actor->query_nacionalidades($c);
        $datos = explode(";", $result);
        require_once("../vista/elegir_nacionalidad.php");
        break;
}
