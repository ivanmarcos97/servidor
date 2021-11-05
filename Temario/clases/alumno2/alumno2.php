<?php
class Alumno
{
    const CICLO = "DAW";
    protected $nombre;
    protected $calificacionfinal;
    protected $edad;

    function __construct($nombre, $edad, $calificacionfinal)
    {

        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->calificacionfinal = $calificacionfinal;
    }
    function supera_curso()
    {
        if ($this->calificacionfinal >= 5) {
            return "El alumno $this->nombre supera el primer curso";
        } else {
            return "no supera el primer curso";
        }
    }
}
