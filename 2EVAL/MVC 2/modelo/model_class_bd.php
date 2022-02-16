<?php
class Conexion
{

    protected $bd_conect; // $db_conect sera un objeto con informacion sobre la conexion extablecida

    function __construct($bd)
    {
        try {
            $this->bd_conect = new PDO("mysql:host=localhost; port=3306;dbname='$bd'", "root", "");
            $this->bd_conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("La conexion no ha sido posible " . $e->getMessage());
        }
    }
    public function __get($atrib)
    {
        return ($this->bd_conect);
    }
}
