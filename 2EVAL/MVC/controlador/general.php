<?php
require_once("../modelo/bd_class.php");
$conec = new Conexion('cinema');
$c = $conec->bd_conect;
switch ($_POST['consulta']) {
    case '1':
        require_once("../modelo/model_class_peliculas.php");
        $pelicula = new Pelicula();
        $result = $pelicula->query_peliculas_drama($c);
        $datos = explode(";", $result);
        require_once("../vista/peliculas_drama.php");
        break;
    case '2':
        require_once("../modelo/model_class_actores.php");
        $actor = new Actor();
        $result = $actor->query_nombre_actrices($c);
        $datos = explode(";", $result);
        require_once("../vista/nombres_actrices.php");
        break;
    case '3':
        require_once("../modelo/model_class_actores.php");
        $actor = new Actor();
        $result = $actor->query_nacionalidades($c);
        $datos = explode(";", $result);
        require_once("../vista/elegir_nacionalidad.php");
        break;
    case '4':
        require_once("../vista/elegir_actor.php");
        break;
}
