<?php
require_once("../modelo/bd_class.php");
$conect = new Conexion('id18421386_imasgen');
$c = $conect->bd_conect;
require_once("../modelo/model_class_usuarios.php");
$usuario = new Usuario();
$result = $usuario->query_insertar_usuario($c);
$datos =  $result;
require_once("../vista/insercion.php");
