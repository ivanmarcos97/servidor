<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Classe anonyme</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una clase que permite hacer la geometría.
    class euclides {
      // Figura geométrica (objeto).
      private $figura;
      // Método que define la figura geométrica manipulada.
      public function atribuirFigura($figura) {
        $this->figura = $figura;
      }
      // Método que muestra la superficie de la figura.
      public function mostrarSuperficie() {
        echo 'Superficie = ',$this->figura->superficie();
      }
    }
    // Instanciación de un objeto.
    $euclides = new euclides();
    // Definición de la figura (objeto) manipulado utilizando una clase anónima.
    $euclides->atribuirFigura(
      new class(2,5) { // argumentos pasados al constructor
        private $ancho;
        private $longitud;
        public function __construct($ancho,$longitud) { 
          $this->ancho = $ancho;
          $this->longitud = $longitud; 
        } 
        public function superficie() { 
          return $this->ancho * $this->longitud; 
        } 
      });
    // Presentación de la superficie.
    echo $euclides->mostrarSuperficie();
    ?>

    </div>
  </body>
</html>
