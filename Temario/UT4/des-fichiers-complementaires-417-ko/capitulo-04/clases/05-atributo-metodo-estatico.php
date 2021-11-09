<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Atributo o método estático - Constante de clase</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una clase.
    class unaClase {
      // Cualquier atributo privado.
      private $x;
      // Atributo privado estático para almacenar
      // el número de objetos instanciados.
      static private $número = 0;
      // Constante de clase para definir un valor
      // predeterminado.
      const PREDETERMINADO = 'X';
      // Función pública estática que devuelve el
      // número de objetos.
      static public function númeroObjetos() {
        return unaClase::$número;
      }
      // Método constructor
      // - recuperar el valor del atributo (valor predeterminado
      //   = la constante de clase)
      // - incrementar el número de objetos
      public function __construct($valor = unaClase::PREDETERMINADO) {
        $this->x = $valor;
        unaClase::$número++;
        echo "Creción del objeto: $this->x<br />";
      }
      // Método destructor.
      // - decrementar el número de objetos
      public function __destruct() {
        unaClase::$número--;
        echo "Eliminación del objeto: $this->x<br />";
      }
    }
    // Crear dos objetos.
    $desconocido = new unaClase();
    $abc = new unaClase ('ABC');
    // Mostrar el número de objetos
    echo unaClase::númeroObjetos(),' objeto(s)<br />';
    // "Eliminar" un objeto.
    unset($desconocido);
    // Mostrar el número de objetos
    echo unaClase::númeroObjetos(),' objeto(s)<br />';
    ?>
    
    </div>
  </body>
</html>
