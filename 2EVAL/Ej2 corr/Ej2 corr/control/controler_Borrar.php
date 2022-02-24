<?php
require_once("../modelo/bd_class.php");
$conec=new Conexion('oposiciones');
$c=$conec->bd_conect;

require_once("../modelo/model_class_oposiciones.php");

$NuevoOpositor=new Opositor();
$result=$NuevoOpositor->query_borrar($c);
require_once("../vista/echo.html");
