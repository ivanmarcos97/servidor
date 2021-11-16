
    <?php
        class alumno2 {
            private $nombre;
            private $edad;
            private $calificacionFinal;
            const NOMBRE_CICLO = "DAW";

            function __construct($nombre, $edad, $calificacionFinal) {
            $this -> nombre = $nombre;
            $this -> edad = $edad;
            $this -> calificacionFinal = $calificacionFinal;
            }

            public function supera_curso(){
                if($this -> $calificacionFinal >= 5){
                    echo "Aprobado.";
                }else{
                    echo "Repite.";
            }
        }
    ?>
