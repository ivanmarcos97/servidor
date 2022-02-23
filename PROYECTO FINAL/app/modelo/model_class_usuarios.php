<?php
class Usuario
{

    public function __construct()
    {
    }
    public function query_insertar_usuario($conect)
    {
        $u = $_POST["usuario"];
        $c = $_POST["contra"];
        $n = $_POST["nombre"];
        $a = $_POST["apellidos"];
        $e = $_POST["email"];
        $t = $_POST["telefono"];
        $d = $_POST["direccion"];
        $pas = 'password';
        //$h = date('d-m-Y');

        echo $a;
        $sql = "INSERT INTO usuarios ( usuario,$pas,nombre,apellidos,email,telefono,direccion) VALUES
('$u','$c','$n','$a','$e','$t','$d')";

        $resultado = $conect->query($sql);
        if ($resultado == TRUE) {
            return "La insercion es correcta<br>";
        } else {
            return "Error, la insercion no es posible<br>";
        }
    }



    public function query_buscar_usuarios($conect)
    {
        $u = $_POST["usuario"];
        $c = $_POST["contra"];
        $pas = 'password';

        $sql = "SELECT usuario,$pas FROM usuarios WHERE usuario='$u'and $pas='$c'";

        $resultado = $conect->query($sql);
        if ($fila = $resultado->fetch_array()) {
            $result = $fila[0] . "-" . $fila[1];
            return $result;
        } else {
            return "" . ";" . "";
        }
    }
}
