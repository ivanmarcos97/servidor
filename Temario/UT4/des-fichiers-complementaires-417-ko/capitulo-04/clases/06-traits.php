<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Traits</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de un trait que contiene métodos de cálculo.
    trait YoSéCalcular {
      function suma($a,$b) {
        return $a+$b;
      }
      function producto($a,$b) {
        return $a*$b;
      }
    }
    // Definición de un trait que contiene un método que  
    // muestra un mensaje.
    trait YoSoyEducado {
      // El método prueba si existe un atributo 'nombre' en
      // la clase y si es el caso lo utiliza en el mensaje.
      function decirHola() {
        if (isset($this->nombre)) {
          echo "¡Hola {$this->nombre} !<br />";
        } else {
          echo '¡Hola!<br />';
        }
      }
    }
    // Definición de una clase que utiliza los dos traits.
    class usuario {
      use YoSéCalcular,YoSoyEducado;
      // Atributos y métodos de la clase.
      private $nombre; // nombre del usuario
      public function __construct($nombre) {
        // Inicializar el nombre con el valor pasado como parámetro.
        $this->nombre = $nombre;
        // Decir Hola (llamada de un método de uno de los traits).
        $this->decirHola();
      }
    }
    // Instanciar un nuevo objeto.
    $yo = new usuario('Olivier');
    // Hacer un cálculo (llamada de un método de uno de los traits)
    echo 'Yo sé calcular: ';
    echo '10821 x 11409 = ',$yo->producto(10821,11409);
    ?>

    </div>
  </body>
</html>
