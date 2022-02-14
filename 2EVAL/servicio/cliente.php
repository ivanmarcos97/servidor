<?php
require_once("lib/nusoap.php");
$cliente = new nusoap_client("http://localhost/servidor/2EVAL/servicio/servicioweb.php");
$num1 = 70;
$num2 = 80;
$parametros = array('num1' => $num1, 'num2' => $num2);
$respuesta = $cliente->call('Suma', $parametros);
echo $respuesta;
