<?php
require_once("lib/nusoap.php");

function suma($num1, $num2)
{
    $resultadoSuma = $num1 + $num2;
    $resultado = "El resultado de la suma " . $num1 . " + " . $num2 . " es: " . $resultadoSuma;
    return $resultado;
}
$servicio = new nusoap_server();
$ns = "urn:miserviciowsdl";
$servicio->configureWSDL("MiPrimerServicioWeb", $ns);
$servicio->register(
    "Suma",
    array('num1' => 'xsd:integer', 'mum2' => 'xsd:integer'),
    array('return' => 'xsd:string'),
    $ns
);
$servicio->service(file_get_contents('php://input'));
