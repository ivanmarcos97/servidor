<?php
class Alumno
{
    private $nmatri;
    const tasamatri = 2;
    private $nombre;
    private $edad;

    function __construct($nmatri,  $nombre, $edad)
    {
        $this->nmatri = $nmatri;
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    function __get($tasamatri)
    {
        echo $tasamatri;
    }
    function calcula()
    {
        $importe = 0;
        if ($this->edad > 18) {
            $importe = self::tasamatri;
        }
        return "<br> El importe de la matricula de " . $this->nombre . " es: " . $importe;
    }
}
