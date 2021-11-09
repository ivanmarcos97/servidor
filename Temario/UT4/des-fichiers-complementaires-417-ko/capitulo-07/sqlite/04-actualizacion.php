<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Actualización</title>
  </head>
  <body>
    <div>

    <?php 
    // Definición de una pequeña función para mostrar la lista 
    // de artículos. 
    // Esta función utiliza una consulta preparada que se 
    // preparará solo una vez, en la primera llamada.
    // La variable que almacena el resultado de la preparación es una
    // variable estática cuyo valor se conserva de una llamada 
    // a otra.
    function mostrar_artículos($base) { 
      static $consulta;
      if (! isset($consulta)) { // $consulta no definida = primera llamada
        $sql = 'SELECT * FROM artículos'; 
        $consulta = $base->prepare($sql); 
      }
      $resultado = $consulta->execute(); 
      echo '<b>Lista de artículos:</b><br />'; 
      while ($línea = $resultado->fetchArray()) {
        echo $línea['identificador'],' - ',$línea['texto'],' - ',
             $línea['precio'],'<br />'; 
      }
    } 
    // Apertura de la base. 
    $base = new SQLite3('/app/sqlite/diane.dbf'); 
    // Visualización de control. 
    mostrar_artículos($base); 
    // Consulta INSERT (con parámetros). 
    $sql = 'INSERT INTO artículos(texto,precio) VALUES(?,?)'; 
    $consulta = $base->prepare($sql); 
    $ok = $consulta->bindParam(1,$texto);
    $ok = $consulta->bindParam(2,$precio);
    $texto = 'Peras';
    $precio = 29.9;
    $resultado = $consulta->execute(); 
    $identificador =  
      $base->lastInsertRowID(); // recuperar el identificador 
    echo "Identificador del nuevo artículo = $identificador.<br />"; 
    // Consulta UPDATE (sin parámetros). 
    $consulta = 'UPDATE artículos SET precio = ROUND(precio * 1.1,2) ' .  
                'WHERE precio < 40'; 
    $resultado = $base->exec($consulta); 
    $número = $base->changes(); 
    echo "$número artículo(s) añadido(s).<br />"; 
    // Consulta DELETE (sin parámetros). 
    $consulta = 'DELETE FROM artículos WHERE precio > 40'; 
    $resultado = $base->exec($consulta); 
    $número = $base->changes(); 
    echo "$nombre artículo(s) eliminado(s).<br />"; 
    // Visualización de control. 
    mostrar_artículos($base); 
    // Cierre de la base de datos. 
    $ok = $base->close(); 
    ?>

    </div>
  </body>
</html>
