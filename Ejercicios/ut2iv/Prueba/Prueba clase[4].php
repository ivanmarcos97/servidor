<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba clases</title>
</head>
<body>
    <?php
    class Alumno{
        private $numMatricula;
        const TASA_MATRICULA = 2;
        private $nombre;
        private $edad;

        function  __construct($numMatricula, $nombre, $edad){
            $this->numMatricula = $numMatricula;
            $this->nombre = $nombre;
            $this->edad = $edad;
        }

        function precio(){
            if($this->edad < 18){
                $pago = 0;
            }else{
                $pago = self::TASA_MATRICULA;
            }
            return 'El pago es de '.$pago.' euros';
        }
    }
    
    ?>
</body>
</html>