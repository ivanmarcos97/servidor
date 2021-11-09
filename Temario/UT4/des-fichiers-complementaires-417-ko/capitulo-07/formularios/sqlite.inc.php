<?php

// Constantes para los diferentes nombres de columnas.
const IDENTIFICADOR='identificador';
const TEXTO='texto';
const PRECIO='precio';

// Función para la conexión a la base de datos.
function conexión(&$conexión,&$error) {
  // Abrir la base de datos y gestionar la posible excepción.
  try 
  {
    $conexión = new SQLite3('/app/sqlite/diane.dbf');
    $ok = TRUE;
  } catch (Exception $e) { // error
    // Recuperar el mensaje de error.
    $error = $e->getMessage();
    $ok = FALSE;
  }
  return $ok;
}

// Función para la selección de los artículos.
function seleccionar_artículos($conexión,&$consulta,&$error) {
  // Texto de la consulta.
  $sql = 'SELECT identificador,texto,precio FROM artículos ORDER BY texto';
  // Ejecutar la consulta.
  $ok = (bool) ($consulta = $conexión->query($sql));
  // Recuperar el posible mensaje de error.
  if (! $ok) { // error
    $error = $conexión->lastErrorMsg();
  }
  return $ok;
}

// Función para la lectura del artículo siguiente en
// el resultado de una consulta.
function leer_artículo_siguiente($conexión,$consulta,&$artículo,&$error) {
  $ok = (bool) ($artículo = @$consulta->fetchArray());
  // Si fetchArray devuelve FALSE, comprobar si es 
  // a causa de un error o no.
  if (! $ok) {
    if (in_array(@$conexión->lastErrorCode(),[0,100,101])) { // ningún error
      $ok = NULL; // devolver NULL en lugar de FALSE
    } else { // error => recuperar el mensaje de error
      $error = @$conexión->lastErrorMsg();
    }
  }
  return $ok;
}

// Función para la selección de un artículo cuyo identificador 
// se pasa como parámetro.
function seleccionar_un_artículo($conexión,$identificador,&$artículo,&$error) {
  // Texto de la consulta.
  $sql = 'SELECT identificador,texto,precio FROM artículos WHERE identificador = ?';
  // Preparar la consulta.
  $ok = (bool) ($consulta = @$conexión->prepare($sql));  
  // Vincular los parámetros.
  if ($ok) {
    $ok = @$consulta->bindParam(1,$identificador);  
  }
  // Ejecutar la consulta.
  if ($ok) {
    $ok = (bool) ($resultado = @$consulta->execute()); 
  }
  // Leer el resultado.
  if ($ok) {
    $artículo = @$resultado->fetchArray();
    $ok = in_array(@$conexión->lastErrorCode(),[0,100,101]);
  }
  // Probar si todo está pasado correctamente.
  if (! $ok) { // error en alguna parte
    $error = @$conexión->lastErrorMsg();
  }
  return $ok;
}

// Función para guardar un artículo.
function guardar_artículo($conexión,$artículo,&$error) {
  // Texto de la consulta.
  $sql = 'UPDATE artículos SET texto = ?, precio = ? ' .
         'WHERE identificador = ?';
  // Preparar la consulta.
  $ok = (bool) ($consulta = @$conexión->prepare($sql));  
  // Vincular los parámetros.
  if ($ok) {
    $ok =    @$consulta->bindParam(1,$artículo['texto'])
          && @$consulta->bindParam(2,$artículo['precio'])
          && @$consulta->bindParam(3,$artículo['identificador']);  
  }
  // Ejecutar la consulta.
  if ($ok) {
    $ok = (bool) @$consulta->execute();  
  }
  // Probar si todo está pasado correctamente.
  if (! $ok) { // error en alguna parte
    $error = @$conexión->lastErrorMsg();
  }
  return $ok;
}

// Función para guardar una lista de artículos (en asociación
// con el formulario de publicación con lista).
function guardar_artículos($conexión,$líneas,&$error) {
  // Inicializar las variables utilizadas para los cursores con parámetros.
  $reqINS = NULL;
  $reqUPD = NULL;
  $reqDEL = NULL;
  // Inicializar el indicador de éxito.
  $ok = NULL; // NULL = no se ha realizado ninguna actualización.
  // Examinar el resultado de la entrada.
  foreach($líneas as $identificador => $línea) {
    // Recuperar los valores.
    $texto = $línea['texto'];
    $precio = $línea['precio'];
    // Definir la consulta que se va a ejecutar.
    // para cada acción, la consulta es diferente.
    $consulta = NULL;
    if ($identificador < 0 and $texto.$precio != '') {
      // Identificador negativo y algún dato introducido = creación = INSERT
      if ($reqINS == NULL) {
        // La primera vez, preparar la consulta.
        $sql = 'INSERT INTO artículos(texto,precio) VALUES(?,?)';
        $ok = (bool) ($reqINS = @$conexión->prepare($sql));
        if ($ok) {
          $ok =    @$reqINS->bindParam(1,$texto)
                && @$reqINS->bindParam(2,$precio);  
        }
      }
      $consulta = $reqINS;
    } elseif (isset($línea['eliminar'])) {
      // Casilla "eliminar" oculta = eliminación = DELETE
      if ($reqDEL == NULL) {
        // La primera vez, preparar la consulta.
        $sql = 'DELETE FROM artículos WHERE identificador = ?';
        $ok = (bool) ($reqDEL = @$conexión->prepare($sql));
        if ($ok) {
          $ok = @$reqDEL->bindParam(1,$identificador);  
        }
      }
      $consulta = $reqDEL;
    } elseif (! empty($línea['modificar'])) {
      // Campo "modificar" no vacío = modificación = UPDATE
      if ($reqUPD == NULL) {
        // La primera vez, preparar la consulta.
        $sql = 'UPDATE artículos SET texto = ?, precio = ? '.
               'WHERE identificador = ?';
        $ok = (bool) ($reqUPD = @$conexión->prepare($sql));
        if ($ok) {
          $ok =    @$reqUPD->bindParam(1,$texto)
                && @$reqUPD->bindParam(2,$precio)
                && @$reqUPD->bindParam(3,$identificador);  
        }
      }
      $consulta = $reqUPD;
    }
    // En caso de error, interrumpir el procesamiento.
    if ($ok === FALSE) {break;}
    // Si se ha determinado una consulta, ejecutarla.
    // Antes de eso, iniciar una transacción si todavía 
    // no se ha hecho.
    if ($consulta != NULL) {
      if (! isset($transacción)) {
        $ok = @$conexión->exec('BEGIN TRANSACTION');
        $transacción = TRUE;
      }
      if ($ok) {
        $ok = (bool) @$consulta->execute();  
      }
      // En caso de error, interrumpir el procesamiento.
      if (! $ok) {break;}
    }
  } // foreach
  // Si todo está pasado correctamente, validar la transacción.
  if ($ok) {
    $ok = @$conexión->exec('COMMIT');
  }
  // En caso de problema, recuperar el mensaje de error y cancelar
  // la transacción.
  if (! $ok) {
    $error = @$conexión->lastErrorMsg();
    @$conexión->exec('ROLLBACK');
  }
  return $ok;
}
?>
