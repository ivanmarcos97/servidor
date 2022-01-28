<?php
$db_host = "localhost";
$db_usuario = "root";
$db_clave = "";
$db = "cinema";
$conexion = new mysqli($db_host, $db_usuario, $db_clave, $db);
if (!$conexion->connect_errno) {
    echo "Conexion establecida<br>";
} else {
    die("Error, no se encontro la db<br>");
}

//creacion tabla actores
$sql = "CREATE TABLE actores (
    id_actor varchar(5) NOT NULL,
    nacionalidad varchar(15) DEFAULT NULL,
    nombre_apellidos varchar(45) DEFAULT NULL,
    sexo varchar(1) DEFAULT NULL,
    PRIMARY KEY (id_actor)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$resultado = $conexion->query($sql);
if ($resultado == TRUE) {
    echo "La creacion es correcta<br>";
} else {
    echo "Error, la creacion no es posible<br>";
}



//creacion tabla peliculas
$sql = "CREATE TABLE peliculas (
    titulo varchar(50) NOT NULL,
    genero varchar(15) DEFAULT NULL,
    anno_prod smallint(5) UNSIGNED DEFAULT NULL,
    PRIMARY KEY (titulo)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$resultado = $conexion->query($sql);
if ($resultado == TRUE) {
    echo "La creacion es correcta<br>";
} else {
    echo "Error, la creacion no es posible<br>";
}



//creacion tabla intervencion
$sql = "CREATE table intervencion (
    id_actor varchar(5) NOT NULL DEFAULT '',
    titulo varchar(50) NOT NULL DEFAULT '',
    PRIMARY KEY (`id_actor`,`titulo`),
    KEY fk_intervenir_pelicula (titulo)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$resultado = $conexion->query($sql);
if ($resultado == TRUE) {
    echo "La creacion es correcta<br>";
} else {
    echo "Error, la creacion no es posible<br>";
}
$conexion->close();
