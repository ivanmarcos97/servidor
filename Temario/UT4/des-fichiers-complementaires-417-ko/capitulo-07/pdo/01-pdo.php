<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>PHP Data Objects (PDO)</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de los parámetros de conexión.
    // La sintaxis de la fuente (Data Source Name o DSN)
    // es específica a cada controlador.
    // El número del caso que se va a probar se pasa en la URL con la 
    // variable 'prueba'.
    // Recuperar la valor de la variable (1 por defecto = MySQL).
    $prueba = filter_input(INPUT_GET,'prueba',FILTER_VALIDATE_INT)?:1;
    switch ($prueba) {
      case 1: // MySQL
      default:
        $fuente = 'mysql:host=localhost;dbname=diane';
        $usuario = 'root';
        $contraseña = '';
        break;
      case 2: // Oracle
        $fuente = 'oci:dbname=diane;charset=UTF8';
        $usuario = 'demeter';
        $contraseña = 'demeter';
        break;
      case 3: // SQLite (versión 3.x)
        $fuente = 'sqlite:/app/sqlite/diane.dbf';
        $usuario = '';
        $contraseña = '';
        break;
    }
    // Definición de dos consultas de prueba.
    // Observar que la consulta de inserción tiene parámetros (es
    // de hecho la única característica que imita PDO,
    // si no se soporta de manera nativa por la base de
    // datos).
    $sql_select = 'SELECT * FROM articulos ORDER BY identificador';
    $sql_insert = 'INSERT INTO articulos(texto,precio) VALUES(:p1,:p2)';
    // Todas las operaciones se efectúan en un bloque
    // 'try' para recuperar las excepciones provocadas por PDO.
    try {
      // Conexión a la base de datos.
      $db = new PDO($fuente, $usuario, $contraseña);
      // Modificación de los parámetros de la conexión para
      // solicitar que se planteen excepciones en caso
      // de error.
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      // Preparar una consulta para la inserción.
      $st = $db->prepare($sql_insert);
      // Unir los parámetros
      $st->bindParam(':p1',$nombre);
      $st->bindParam(':p2',$precio);
      // Asignar un valor a las variables.
      $nombre = 'Manzanas';
      $precio = 30.5;
      // Ejecutar la consulta.
      // Para las bases de datos que admiten las transacciones,
      // los métodos beginTransaction(), commit() y rolback()
      // de objetos PDO se pueden utilizar.
      $st->execute();
      // Preparar una consulta para la selección.
      $st = $db->prepare($sql_select);
      // Ejecutar la consulta.
      $st->execute();
      // Recuperar el resultado.
      // Hay disponibles varios métodos para recuperar
      // el resultado: fetch(), fetchObject(), fetchAll().
      // El método fetch() dispone de un parámetro que permite
      // especificar el tipo de resultado (matriz, objeto, etc.).
      while ($línea = $st->fetch()) {
        echo "$línea[1] - $línea[2]<br />\n";
      }
      // Liberar los recursos
      $st = null;
      $db = null;
    } catch (PDOException $e) {
      // Gestión de excepciones
      echo '¡Error!: ',$e->getMessage(),'<br />';
      die();
    }
    ?>

    </div>
  </body>
</html>
