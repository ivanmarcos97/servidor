<?php
$db_host = "localhost";
$db_usuario = "root";
$db_clave = "";
$db = "ciclos";
$conexion = new mysqli($db_host, $db_usuario, $db_clave, $db);
if (!$conexion->connect_errno) {
    echo "Conexion establecida<br>";
} else {
    die("Error, no se encontro la db<br>");
}

$insertar1 = "INSERT INTO MODULO (ID_MOD,HORAS) VALUES ('DWES',9),('DWEC',8)";
if ($conexion->query($insertar1) == true)
    echo "Insercion realizada en modulo";
else
    echo "la insercion no ha sido posible";

$insertar2 = "INSERT INTO notas (id_al,id_mod,cali) values (1,'DWES',7),(1,'DWEC',6),(2,'DWES',4),(3,'DWES',4),(6,'DWES',5),(4,'DWEC',3)";

if ($conexion->query($insertar2) == true)
    echo "Insercion realizada en notas";
else
    echo "la insercion no ha sido posible";
$conexion->close();
