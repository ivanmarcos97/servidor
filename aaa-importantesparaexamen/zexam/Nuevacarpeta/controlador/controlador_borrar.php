<?php
require_once("../modelo/bd_class.php");
$conect = new Conexion('oposiciones');
$c = $conect->bd_conect;

require_once("../modelo/model_class_oposiciones.php");
$oposicion = new Oposicion();
$result = $oposicion->query_borrar($c);
$datos =  $result;
require_once("../vista/borrados.php");
