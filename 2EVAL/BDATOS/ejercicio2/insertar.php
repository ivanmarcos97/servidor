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

//Insertar tabla actores
$sql = "INSERT INTO actores (id_actor, nacionalidad, nombre_apellidos,sexo) VALUES
('00001', 'francés', 'Jacqueline Bisset', 'f'),
('00002', 'española', 'Antonio Banderas', 'm'),
('00003', 'española', 'Belén Rueda', 'f'),
('00004', 'estadounidense', 'Brad Pitt', 'm'),
('00005', 'estadounidense', 'Laura Dern', 'f')";

$resultado = $conexion->query($sql);
if ($resultado == TRUE) {
    echo "La insercion es correcta<br>";
} else {
    echo "Error, la insercion no es posible<br>";
}



//insercion tabla peliculas
$sql = "INSERT INTO peliculas (titulo, genero, anno_prod) VALUES
('Dolor y gloria', 'drama', 2019),
('Erase una vez...Hollywood', 'comedia', 2019),
('Historia de un matrimonio', 'drama', 2019),
('La piel que habito', 'thriller', 2011)";

$resultado = $conexion->query($sql);
if ($resultado == TRUE) {
    echo "La insercion es correcta<br>";
} else {
    echo "Error, la insercion no es posible<br>";
}



//insercion tabla intervencion
$sql = "INSERT INTO intervencion (id_actor, titulo) VALUES
('00002', 'Dolor y gloria'),
('00004', 'Erase una vez...Hollywood'),
('00005', 'Historia de un matrimonio'),
('00002', 'La piel que habito')";

$resultado = $conexion->query($sql);
if ($resultado == TRUE) {
    echo "La insercion es correcta<br>";
} else {
    echo "Error, la insercion no es posible<br>";
}
$conexion->close();
