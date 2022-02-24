<?php
$json = file_get_contents('php://input');
$id = json_decode($json);

// // Cabecera para indicar que vamos a enviar datos JSON y que no haga caché de los datos.
// header('Content-Type: application/json');
// header('Cache-Control: no-cache, must-revalidate');
// header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

// Configuración BASE DE DATOS
$host = "localhost";
$user = "root";
$dbname = "ajax";
$pass = "";
// Creamos la conexión al servidor.
$conexion = mysqli_connect($host, $user, $pass, $dbname);
mysqli_query($conexion, "SET NAMES 'utf8'");
//


$nombre = $_POST["nombre"];
$descripción = $_POST["descripcion"];
$Email = $_POST["email"];
$numero = $_POST["numero"];
$Precio = $_POST["precio"];
$tarjeta = $_POST["tarjeta"];
$CSV = $_POST["csv"];

$sql = "Insert into viajescomprados(nombre,descripcion,email,num,precio,numerotarjeta,csv) values ('$nombre','$descripción','$Email',$numero,$Precio,$tarjeta,$CSV)";


if (mysqli_query($conexion, $sql) === TRUE) {
    echo "OK";
} else {
    echo "NO";
}
