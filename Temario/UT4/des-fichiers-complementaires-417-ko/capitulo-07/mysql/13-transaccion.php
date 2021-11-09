<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Transacción</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una pequeña función para mostrar la lista 
    // de artículos. 
    // Esta función utiliza una consulta preparada que se 
    // preparará solo una vez, en la primera llamada.
    // La variable que almacena el resultado de la preparación así como
    // la matriz utilizada para la vinculación son variables estáticas
    // cuyos valores se conservan de una llamada a otra.
    function mostrar_artículos ($conexión) { 
      static $consulta;
      static $línea = array();
      if (! isset($consulta)) { // $consulta no definida = primera llamada
        $sql = 'SELECT * FROM artículos'; 
        $consulta = mysqli_prepare($conexión,$sql);
        $ok = mysqli_stmt_bind_result($consulta,$línea[],$línea[],$línea[]); 
      }
      $ok = mysqli_stmt_execute($consulta); 
      echo '<b>Lista de artículos:</b><br />'; 
      while (mysqli_stmt_fetch($consulta)) { 
        echo $línea[0],' - ',$línea[1],' - ',$línea[2],'<br />'; 
      } 
    } 
    // Conexión (utilización de los valores predeterminados). 
    $conexión = mysqli_connect(); 
    if (! $conexión) { 
      exit('Error de conexión.'); 
    } 
    // Selección de la base de datos. 
    $ok = mysqli_select_db($conexión,'diane'); 
    if (! $ok) { 
      exit('No se pudo seleccionar la base de datos.'); 
    } 
    // Visualización de control. 
    mostrar_artículos($conexión); 
    // Iniciar una transacción.
    $ok = mysqli_begin_transacción($conexión);
    // Consulta INSERT (con parámetros).
    $sql = 'INSERT INTO artículos(texto,precio) VALUES(?,?)';
    $consulta = mysqli_prepare($conexión, $sql);
    $ok = mysqli_stmt_bind_param($consulta,'sd',$texto,$precio);
    $texto = 'Mangos';
    $precio = 24.5;
    $ok = mysqli_stmt_execute($consulta);
    // Consulta UPDATE (con parámetros).
    $sql = 'UPDATE artículos SET precio = ? WHERE identificador = ?'; 
    $consulta = mysqli_prepare($conexión, $sql); 
    $ok = mysqli_stmt_bind_param($consulta,'di',$precio,$identificador); 
    $identificador = 3;
    $precio = 29.9;
    $ok = mysqli_stmt_execute($consulta); 
    // COMMIT.
    $ok = mysqli_commit($conexión);
    // Desactivar el COMMIT automático.
    $ok = mysqli_autocommit($conexión,FALSE);
    // Consulta DELETE de todos los artículos (¡Ups!). 
    $sql = 'DELETE FROM artículos '; 
    $consulta = mysqli_query($conexión, $sql); 
    // ROLLBACK (¡Uff!). 
    $ok = mysqli_rollback($conexión); 
    // Visualización de control.
    mostrar_artículos($conexión);
    // Desconexión. 
    $ok = mysqli_close($conexión); 
    ?>

    </div>
  </body>
</html>
