<?php
require_once("../modelo/bd_class.php");
$conect = new Conexion('turismodwes');
$c = $conect->bd_conect;
require_once("../modelo/model_origen.php");
$origen = new Origen();
$result = $origen->query_insertar($c);
$datos =   $result;
require_once("../vista/insertados.php");
