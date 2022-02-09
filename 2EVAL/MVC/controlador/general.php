<?php
require_once("../modelo/bd_class.php");
$conec = new Conexion('cinema');
$c = $conec->bd_conect;
switch ($_POST['consulta']) {
    case '1':
        require_once("../modelo/model_class_peliculas.php");
        $pelicula = new Pelicula();
        $result = $pelicula->query_peliculas_drama($c);
        $datos = explode("<br>", $result);
        require_once("../vista/peliculas_drama.php");
        break;
}
echo "hola";
