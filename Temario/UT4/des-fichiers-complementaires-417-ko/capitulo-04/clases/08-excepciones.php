<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Excepciones</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una clase.
    class unaClase {
      // Cualquier atributo.
      private $x;
      // Método constructor.
      public function __construct($valor) {
        $this->x = $valor;
      }
      // Método que efectúa una acción cualquiera.
      public function action() {
        // Por alguna razón, la acción está prohibida
        // si el atributo es negativo: se produce una excepción.
        if ($this->x < 0) {
          throw new Exception('Acción prohibida',123);
        }
      }
    }
    // Crear dos objetos.
    $objeto = new unaClase(1);
    try {
      echo 'Objeto 1: ';
      $objeto->action(); // no produce una excepción
      echo 'OK<br />';
    } catch (Exception $e) {
      echo 'ERROR ',$e->getCode(),' - ',$e->getMessage(),'<br />';
    }
    $objeto = new unaClase(-1);
    try {
      echo 'Objeto 2: ';
      $objeto->action(); // produce una excepción
      echo 'OK<br />';
    } catch (Exception $e) {
      echo 'ERROR ',$e->getCode(),' - ',$e->getMessage(),'<br />';
    }
    echo '--<br />';
    // Lo mismo con un bloque finally.
    $objeto = new unaClase(1);
    try {
      echo 'Objeto 1: ';
      $objeto->action(); // no produce una excepción
      echo 'OK<br />';
    } catch (Exception $e) {
      echo 'ERROR ',$e->getCode(),' - ',$e->getMessage(),'<br />';
    } finally {
      echo 'FINALLY<br />';
    }
    $objeto = new unaClase(-1);
    try {
      echo 'Objeto 2: ';
      $objeto->action(); // produce una excepción
      echo 'OK<br />';
    } catch (Exception $e) {
      echo 'ERROR ',$e->getCode(),' - ',$e->getMessage(),'<br />';
    } finally {
      echo 'FINALLY<br />';
    }
    ?>
    
    </div>
  </body>
</html>
