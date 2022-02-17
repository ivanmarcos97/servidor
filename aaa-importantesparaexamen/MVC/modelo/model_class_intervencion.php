<?php
class Intervenir
{

    public function __construct()
    {
    }
    public function query_titulos_peliculas($conect, $id_actor)
    {
        $sql = "SELECT titulo FROM intervencion WHERE id_actor='$id_actor'";
        $result = "";
        $resultado = $conect->query($sql);
        while ($fila = $resultado->fetch_array()) {
            $result .= $fila["titulo"] . ';';
        }
        return $result;
    }
    //$sql->bind_param("s", $id_actor);
    // $sql->bind_result($tit);
    //if ($sql->execute()) {
    // while ($sql->fecth()) {
    //    $result .= $tit . ';';
    //   }
    // }
    // if ($sql->num_rows == 0) {
    //    $result = "Lo sentimos; No hay peliculas del actor indicado";
    //  }
    // }
}
