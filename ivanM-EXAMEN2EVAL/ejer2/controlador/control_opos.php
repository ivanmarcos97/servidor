<?php
require_once("../modelo/bd_class.php");
$conec = new Conexion('oposiciones');
$c = $conec->bd_conect;

require_once("../modelo/model_class_oposicion.php");
$opo = new Oposicion();

$datos = $opo->query_insertar($c, $_POST["cod_op"], $_POST["notap"], $_POST["notat"]);
require_once("../vista/insertos.php");
