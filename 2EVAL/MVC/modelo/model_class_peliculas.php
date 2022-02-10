<?php
class Pelicula
{

    public function __construct()
    {
    }
    public function query_peliculas_drama($conect)
    {
        $sql = "SELECT titulo FROM peliculas WHERE genero='drama'";

        $resultado = $conect->query($sql);
        $result = "";
        while ($fila = $resultado->fetch_array()) {
            $result .= $fila["titulo"] . ';';
        }
        return $result;
    }
}
