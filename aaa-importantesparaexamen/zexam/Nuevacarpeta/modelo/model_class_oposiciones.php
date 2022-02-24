<?php
class Oposicion
{

    public function __construct()
    {
    }
    public function query_mostrar_conplaza($conect)
    {
        $sql = "SELECT * FROM resultados WHERE notap >=5 and notat>=5";
        $result = "";
        $resultado = $conect->query($sql);
        while ($fila = $resultado->fetch_array()) {
            $result .= $fila[0] . ';' . $fila[1] . ";" . $fila[2] . ";";
        }
        return $result;
    }

    public function query_mostrar_bolsatra($conect)
    {
        $sql = "SELECT * FROM resultados WHERE notap >=5 xor notat>=5";
        $result = "";
        $resultado = $conect->query($sql);
        while ($fila = $resultado->fetch_array()) {
            $result .= $fila[0] . ';' . $fila[1] . ";" . $fila[2] . ";";
        }
        return $result;
    }
    public function query_mostrar_noap($conect)
    {
        $sql = "SELECT * FROM resultados WHERE notap <5 and notat<5";
        $result = "";
        $resultado = $conect->query($sql);
        while ($fila = $resultado->fetch_array()) {
            $result .= $fila[0] . ';' . $fila[1] . ";" . $fila[2] . ";";
        }
        return $result;
    }
    public function query_insertar($conect)
    {
        $cod_op = $_POST["cod_op"];
        $notap = $_POST["notap"];
        $notat = $_POST["notat"];
        $sql =  "Insert into resultados (cod_op,notap,notat) values ('$cod_op',$notap,$notat
        )";
        $result = "";
        $resultado = $conect->query($sql);
        if ($resultado == true)
            $result = "Insercion realizada en notas";
        else
            $result = "la insercion no ha sido posible";
        return $result;
    }
    public function   query_borrar($conect)
    {
        $cod_op = $_POST["cod_op"];
        $actuali = "Delete from resultados where cod_op=?";
        $stmt = $conect->prepare($actuali); //prepare devuelve un nobjeto se la clase stmt_result
        $stmt->bind_param('s', $cod_op);
        $ok = $stmt->execute();
        if ($ok)
            $result = "actualizacion realizada";
        else
            $result = "la insercion no ha sido posible";

        return $result;
    }
}
