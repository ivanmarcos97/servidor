<?php
class Segundo extends Alumno
{
    private $califct;
    private $calimp;

    function __construct($nombre, $edad, $calificacionfinal, $calimp, $califct)
    {
        parent::__construct($nombre, $edad, $calificacionfinal);
        $this->calimp = $calimp;
        $this->califct = $califct;
    }




    function supera_curso()
    {
        if ($this->calificacionfinal >= 5 && $this->calimp >= 5 && $this->califct == "apto") {
            return "<br>El alumno $this->nombre supera el segundo curso";
        } else {
            return "<br>El alumno $this->nombre no supera el segundo curso";
        }
    }
}
