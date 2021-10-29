<?php
class Alumno
{
    private $nmatri;
    private $tasamatri = 2;
    private $nombre;
    private $edad;

    function __construct($nmatri, $tasamatri, $nombre, $edad)
    {
        $this->$nmatri = $nmatri;
        $this->$tasamatri = $tasamatri;
        $this->$nombre = $nombre;
        $this->$edad = $edad;
    }
    function __get($tasamatri)
    {
        echo $tasamatri;
    }
    function calcula()
    {

        if (self::$edad < 18) {
            self::$tasamatri = 0;
        }
    }
}
