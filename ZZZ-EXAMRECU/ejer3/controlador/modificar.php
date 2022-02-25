<?php
require_once("../modelo/bd_class.php");
$conect = new Conexion('turismodwes');
$c = $conect->bd_conect;
require_once("../modelo/model_alojamiento.php");
$alojado = new Alojados();
$result = $alojado->query_modificar($c);
$datos =   $result;
require_once("../vista/actualizados.php");
