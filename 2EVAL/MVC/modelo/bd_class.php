<?php
class Conexion
{

    protected $bd_conect; // $db_conect sera un objeto con informacion sobre la conexion extablecida

    public function __construct($bd)
    {
        $this->bd_conect = new mysqli("localhost", "root", "", $bd);
        if ($this->bd_conect->connect_errno) {
            echo "Error.No se ha podido establecer conexion"; //no es el sitio adecuado para una salida
            exit();
        }
    }

    public function __get($atrib)
    {
        return ($this->bd_conect);
    }
}
