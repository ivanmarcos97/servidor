<?php
    class primero extends alumno2{
        private $calificaciónFCT;
        private $validarproyecto;
        function __construct($calificaciónFCT, $validarproyecto, $nombre, $edad, $calificacionFinal) {
            
            parent::__construct ($nombre, $edad, $calificacionFinal);
            $this -> calificaciónFCT = $calificaciónFCT;
            $this -> validarproyecto = $validarproyecto;
            
        }

        public function supera_curso(){
            if(validar($this->calificaciónFCT)){
                if($this->calificacionFinal>=5 && $this->validarproyecto>=5 && $this->calificaciónFCT=="apto"){
                    echo "Aprobado.";
                }else{
                    echo "Repite.";
                }
            }else{
            echo"Error";
        }
        function validar($calificaciónFCT){
            if($calificaciónFCT=="apto" || $calificaciónFCT=="no apto"){
                return true;
            }else{
                return false;
            }
        }
    }
?>
