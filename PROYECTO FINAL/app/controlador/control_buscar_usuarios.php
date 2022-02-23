<?php
require_once("../modelo/bd_class.php");
$conect = new Conexion('id18421386_imasgen');
$c = $conect->bd_conect;
require_once("../modelo/model_class_usuarios.php");
$usuario = new Usuario();
$result = $usuario->query_buscar_usuarios($c);
$datos =  explode("-", $result);
if ($datos[0] == $_POST["usuario"] && $datos[1] == $_POST["contra"]) {
    require_once("../vista/usuariologueado.php");
} else {
    $datos = "El Usuario no existe";
    require_once("../vista/usuariologueado.php");
}
