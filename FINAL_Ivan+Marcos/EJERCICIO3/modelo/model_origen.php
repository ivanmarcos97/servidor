<?php
class Origen
{

    public function __construct()
    {
    }

    public function query_mostrar($conect)
    {
        $sql = "SELECT origen FROM turista ";

        $resultado = $conect->query($sql);
        $result = "";
        while ($fila = $resultado->fetch_array()) {
            $result .= $fila[0] . ';';
        }
        return $result;
    }

    public function query_insertar($conect)
    {
        $dni = $_POST["dni"];
        $origen = $_POST["proce"];

        $sql =  "Insert into turista (dni,origen) values ('$dni','$origen'
        )";
        $result = "";
        $resultado = $conect->query($sql);
        if ($resultado == true)
            $result = "Insercion realizada turista";
        else
            $result = "la insercion no ha sido posible";
        return $result;
    }
}
