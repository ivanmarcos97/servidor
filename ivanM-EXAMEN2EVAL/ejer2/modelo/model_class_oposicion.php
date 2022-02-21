<?php
class Oposicion
{

    public function __construct()
    {
    }
    public function query_conplaza($conect)
    {
        $sql = "SELECT * FROM resultados WHERE notap >'5'and notat>'5'";

        $resultado = $conect->query($sql);
        $result = "";
        while ($fila = $resultado->fetch_array()) {
            $result .= $fila[0] . ';' . $fila[1] . ';' . $fila[2] . ';';
        }
        return $result;
    }

    public function query_conbol($conect)
    {
        $sql = "SELECT * FROM resultados WHERE notap >'5' or notat >'5'";

        $resultado = $conect->query($sql);
        $result = "";
        while ($fila = $resultado->fetch_array()) {
            $result .= $fila[0] . ';' . $fila[1] . ';' . $fila[2] . ';';
        }
        return $result;
    }
    public function query_noap($conect)
    {
        $sql = "SELECT count(*) FROM resultados WHERE notap <'5' or notat <'5'";

        $resultado = $conect->query($sql);
        $result = "";
        while ($fila = $resultado->fetch_array()) {
            $result = $fila;
        }
        return $result;
    }

    public function query_insertar($conect, $cod_op, $notap, $notat)
    {

        $sql =  "Insert into oposiciones(cod_op,notap,notat) values ('$cod_op',$notap,$notat
        )";

        $result = $conect->query($sql);
        return $result;
        if ($result)
            return "insercion realizada";
        else
            return  mysqli_error($conect);
    }

    public function query_borrar($conect, $cod_opborrar)
    {

        $sql =  "Delete from oposiciones where cod_opborrar='$cod_opborrar'";

        $result = $conect->query($sql);
        return $result;
        if ($result)
            return "borrado realizado con exito";
        else
            return  mysqli_error($conect);
    }
}
