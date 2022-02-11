<?php
require_once("../modelo/bd_class.php");
$conec = new Conexion('cinema');
$c = $conec->bd_conect;
require_once("../modelo/model_class_actores.php");
$actor = new Actor();
$id_actor = $actor->query_id_Actor($c);
require_once("../modelo/model_class_intervencion.php");
$intervenir = new Intervenir();
$result = $intervenir->query_titulos_peliculas($c, $id_actor);
$datos = explode(";", $result);
require_once("../vista/peliculas_actor.php");
