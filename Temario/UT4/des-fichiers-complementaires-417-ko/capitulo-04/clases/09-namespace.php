<?php
// Definición del espacio de nombres.
namespace MiProyecto;
// Inclusión de la biblioteca.
include('09-biblioteca.inc.php');
// Definición de una constante.
const UNO = 'uno';
// Definición de una clase.
class unaClase {
  static function información() {
    echo 'MiProyecto<br />';
  }
}
// Definición de una función.
function unaFunción() {
  echo __FUNCTION__,'<br />';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Espacio de nombres</title>
  </head>
  <body>
    <div>

    <?php
    // Visualización del espacio de nombres actual.
    echo 'Espacio de nombres actual = ',__NAMESPACE__,'<br />';
    // Llamada de unaFunción() :
    // nombre no cualificado = espacio de nombres actual
    echo 'unaFunción() = ';
    unaFunción();
    // Llamada de Biblioteca\unaFunción():
    // nombre cualificado relativo
    echo 'Biblioteca\unaFunción() = ';
    Biblioteca\unaFunción();
    // Visualización de \MiProyecto\Biblioteca\UNO:
    // nombre cualificado absoluto
    echo '\MiProyecto\Biblioteca\UNO = ',
         \MiProyecto\Biblioteca\UNO,
         '<br />';
    // Visualización de namespace\UNO:
    // utilización de la palabra clave 'namespace' (espacio actual)
    echo 'namespace\UNO = ',
         namespace\UNO,
         '<br />';
    // Definición de un alias de clase.
    use \MiProyecto\Biblioteca\unaClase as cl;
    echo 'cl::información() = ';
    cl::información();
    // Definición de un alias de espacio de nombres.
    use MiProyecto\Biblioteca as lib;
    echo ' lib\unaFunción() = ';
    lib\unaFunción();
    // Definición de un alias de constante.
    use const MiProyecto\Biblioteca\UNO as ONE;
    echo 'ONE = ',ONE,'<br />';
    // Definición de un alias de función.
    use function MiProyecto\Biblioteca\unaFunción as f;
    echo ' f() = ';
    f();
    ?>

    </div>
  </body>
</html>
