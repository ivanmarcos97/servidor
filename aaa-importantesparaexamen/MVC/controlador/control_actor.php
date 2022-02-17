<?php
require_once("../modelo/bd_class.php");
$conec = new Conexion('cinema');
$c = $conec->bd_conect;
require_once("../modelo/model_class_actores.php");
$actor = new Actor();
$result = $actor->query_nacionalizados($c);
$datos =  $result;
require_once("../vista/num_nacionalidades.php");
