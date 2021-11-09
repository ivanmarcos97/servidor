<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Clase o método abstracto</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una clase abstracta.
    abstract class superclase {
      // Atributo protegido.
      protected $x;
      // Dos métodos para acceder al atributo protegido:
      // - para leer
      public function get() {
        return "GET = $this->x";
      }
      // - para escribir
      //   > método abstracto
      abstract public function put($valor);
    }
    // Definición de una subclase que hereda de la superclase.
    class subclase extends superclase {
      // Implementación del método de escritura.
      public function put($valor) {
        $this->x = $valor;
      }
    }
    // Utilización de la subclase.
    $objeto = new subclase();
    $objeto->put(123);
    echo "{$objeto->get()} <br />";
    ?>
    
    </div>
  </body>
</html>
