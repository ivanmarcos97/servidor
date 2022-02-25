<?php
class Alojados
{

    public function __construct()
    {
    }



    public function query_modificar($conect)
    {
        $cod = $_POST["codigo"];
        $cat = $_POST["cat"];

        $sql = "update  alojamiento set categoria='$cat'   where id_aloj='$cod'";
        $result = "";
        $resultado = $conect->query($sql);
        if ($resultado == true)
            $result = "Actualizacion realizada ";
        else
            $result = "la modificacion no ha sido posible";
        return $result;
    }
}
