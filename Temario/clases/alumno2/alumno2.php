<?php
class Alumno
{
    const CICLO = "DAW";
    private $calificacionfinal;
    private $nombre;
    private $edad;

    function __construct($calificacionfinal,  $nombre, $edad)
    {
        $this->calificacionfinal = $calificacionfinal;
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    function supera_curso()
    {
        if ($this->calificacionfinal >= 5) {
            echo "apto";
        } else {
            echo "no apto";
        }
    }
}
