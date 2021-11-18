<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Legado de clase</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una clase base.
    class usuario {
      // Definición de los atributos.
      public $apellido; // apellido del usuario
      public $nombre; // nombre del usuario
      // Definición de los métodos:
      // - método constructor
      public function __construct($nombre,$apellido) {
        // Inicializar el nombre y el apellido
        // con los valores de los parámetros
        $this->nombre = $nombre;
        $this->apellido = $apellido;
      }
      // - método que da información sobre el usuario
      public function información() {
        return "$this->nombre $this->apellido";
      }
    }
    // Definición de una clase que hereda de la primera
    class usuario_color extends usuario{
      // Definición de atributos adicionales.
      public $colores; // colores favoritos del usuario
      // Definición de métodos adicionales
      // - método constructor
      public function __construct($nombre,$colores) {
        // Llamada al constructor de la superclase
        // para la primera perte de la inicialización.
        parent::__construct ($nombre,'X');
        // Inicialización específica adicional.
        $this->colores = explode(",",$colores);
      }
      // - lista de colores favoritos del usuario
      public function colores() {
        return implode(',',$this->colores);
      }
    }
    // Instanciación un objeto de la subclase.
    $yo = new usuario_color('Olivier','azul,blanco,rojo');
    // Utilización de los métodos:
    // - de la superclase
    echo "{$yo->información()}<br />"; // existe por legado
    // - de la subclase
    echo "{$yo->colores()}<br />"; // existe en la clase
    ?>
    
    </div>
  </body>
</html>
