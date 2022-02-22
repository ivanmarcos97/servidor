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
}
