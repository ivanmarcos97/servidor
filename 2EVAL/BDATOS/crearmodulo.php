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

//$sql="CREATE TABLE modulo (id_mod varchar(5) PRIMARY KEY,horas int) Engine='InnoDB'";
$sql = "CREATE TABLE notas (id_al int(11),id_mod varchar(5), cali decimal(4,2),
    CONSTRAINT pk_notas PRIMARY KEY(id_al,id_mod),
    CONSTRAINT fk_notas_alumno FOREIGN KEY (id_al) REFERENCES alumno (id_al)
    ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_notas_modulo FOREIGN KEY (id_mod) REFERENCES modulo (id_mod)
    ON DELETE CASCADE ON UPDATE CASCADE) Engine='InnoDB'";

$resultado = $conexion->query($sql);
if ($resultado == TRUE) {
    echo "La creacion es correcta<br>";
} else {
    echo "Error, la creacion no es posible<br>";
}

$sql = "SHOW TABLES FROM ciclos";
$resultado = $conexion->query($sql);
//var_dump($resultado);

while ($fila = $resultado->fetch_row())
    echo $fila[0] . "<br>";

$conexion->close();
