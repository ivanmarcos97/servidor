<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Interfaz</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de dos interfaces.
    interface lectura {
      function get();
    }
    interface escritura {
      function put($valor);
    }
    // Definición de una clase que implementa ambas interfaces.
    class unaClase implements lectura,escritura {
      // Definición de cualquier atributo.
      private $x;
      // Implementación del método de lectura.
      public function get() {
        return $this->x;
      }
      // Implementación del método de escritura.
      public function put($valor) {
        $this->x = $valor;
      }
    }
    // Utilización de la clase.
    $objeto = new unaClase();
    $objeto->put(123);
    echo "{$objeto->get()} <br />";
    ?>
    
    </div>
  </body>
</html>
