<?php

// Constantes para los diferentes nombres de columnas.
const IDENTIFICADOR='identificador';
const TEXTO='texto';
const PRECIO='precio';

// Función para la conexión a la base de datos.
function conexión(&$conexión,&$error) {
  // Conectarse y seleccionar la base de datos.
  $ok = (bool) ($conexión = @mysqli_connect("localhost", "root", "", "diane"));
  if ($ok) { // conexión OK
    $ok = @mysqli_select_db($conexión,'diane');
  }
  // Probar si todo está pasado correctamente.
  if (! $ok) { // error 
    // Recuperar el mensaje de error.
    if (! $conexión) { // error de conexión
      $error = @mysqli_connect_error();
    } else { // otro error
      $error = @mysqli_error($conexión);
    }
  }
  return $ok;
}

// Función para la selección de los artículos.
function seleccionar_artículos($conexión,&$consulta,&$error) {
  // Texto de la consulta.
  $sql = 'SELECT identificador,texto,precio FROM articulos ORDER BY texto';
  // Preparar la consulta.
  $ok = (bool) ($consulta = mysqli_prepare($conexión,$sql));
  // Ejecutar la consulta.
  if ($ok) {
    $ok = mysqli_stmt_execute($consulta); 
  }
  // Probar si todo está pasado correctamente.
  if (! $ok) { // error en alguna parte
    if (! $consulta) { // error en la preparación
      $error = @mysqli_error($conexión);
    } else { // error en otra parte
      $error = @mysqli_stmt_error($consulta);
    }
  }
  return $ok;
}

// Función para la lectura del artículo siguiente en
// el resultado de una consulta.
function leer_artículo_siguiente($conexión,$consulta,&$artículo,&$error) {
  // Vincular las columnas del resultado. 
  $ok = @mysqli_stmt_bind_result($consulta,$artículo[IDENTIFICADOR],
                                 $artículo[texto],$artículo[precio]/*,$artículo[]*/); 
  // Leer el resultado.
  if ($ok) {
    $ok = @mysqli_stmt_fetch($consulta); 
  }
  // Probar si todo está pasado correctamente.
  if ($ok === FALSE) { // error en alguna parte
    $error = @mysqli_stmt_error($consulta);
  }
  return $ok;
}

// Función para la selección de un artículo cuyo identificador 
// se pasa como parámetro.
function seleccionar_un_artículo($conexión,$identificador,&$artículo,&$error) {
  // Texto de la consulta.
  $sql = 'SELECT identificador,texto,precio FROM articulos WHERE identificador = ?';
  // Preparar la consulta.
  $ok = (bool) ($consulta = @mysqli_prepare($conexión,$sql));
  // Vincular los parámetros.
  if ($ok) {
    $ok = @mysqli_stmt_bind_param($consulta,'i',$identificador);
  }
  // Vincular las columnas del resultado. 
  if ($ok) {
    $ok = @mysqli_stmt_bind_result($consulta,$artículo[IDENTIFICADOR],
                                   $artículo[TEXTO],$artículo[PRECIO]); 
  }
  // Ejecutar la consulta.
  if ($ok) {
    $ok = @mysqli_stmt_execute($consulta); 
  }
  // Leer el resultado.
  if ($ok) {
    $ok = @mysqli_stmt_fetch($consulta); 
    if ($ok === NULL) { // ningún resultado
      $ok = TRUE; // = ningún error
      $artículo = NULL; // pero resultado vacío
    }
  }
  // Probar si todo está pasado correctamente.
  if (! $ok) { // error en alguna parte
    if (! $consulta) { // error en la preparación
      $error = @mysqli_error($conexión);
    } else { // error en otra parte
      $error = @mysqli_stmt_error($consulta);
    }
  }
  return $ok;
}

// Función para guardar un artículo.
function guardar_artículo($conexión,$artículo,&$error) {
  // Texto de la consulta.
  $sql = 'UPDATE articulos SET texto = ?, precio = ? ' .
         'WHERE identificador = ?';
  // Preparar la consulta.
  $ok = (bool) ($consulta = @mysqli_prepare($conexión,$sql));
  // Vincular los parámetros.
  if ($ok) {
    $ok = @mysqli_stmt_bind_param
            (
            $consulta,
            'sdi',
            $artículo['texto'],
            $artículo['precio'],
            $artículo['identificador']
            );
  }
  // Ejecutar la consulta.
  if ($ok) {
    $ok = @mysqli_stmt_execute($consulta);
  }
  // Probar si todo está pasado correctamente.
  if (! $ok) { // error en alguna parte
    if (! $consulta) { // error en la preparación
      $error = @mysqli_error($conexión);
    } else { // error en otra parte
      $error = @mysqli_stmt_error($consulta);
    }
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
        $sql = 'INSERT INTO articulos(texto,precio) VALUES(?,?)';
        $ok = (bool) ($reqINS = @mysqli_prepare($conexión,$sql));
        if ($ok) {
          $ok = @mysqli_stmt_bind_param($reqINS,'sd',$texto,$precio);
        }
      }
      $consulta = $reqINS;
    } elseif (isset($línea['eliminar'])) {
      // Casilla "eliminar" oculta = eliminación = DELETE
      if ($reqDEL == NULL) {
        // La primera vez, preparar la consulta.
        $sql = 'DELETE FROM articulos WHERE identificador = ?';
        $ok = (bool) ($reqDEL = @mysqli_prepare($conexión,$sql));
        if ($ok) {
          $ok = @mysqli_stmt_bind_param($reqDEL,'i',$identificador);
        }
      }
      $consulta = $reqDEL;
    } elseif (! empty($línea['modificar'])) {
      // Campo "modificar" no vacío = modificación = UPDATE
      if ($reqUPD == NULL) {
        // La primera vez, preparar la consulta.
        $sql = 'UPDATE articulos SET texto = ?, precio = ? '.
               'WHERE identificador = ?';
        $ok = (bool) ($reqUPD = @mysqli_prepare($conexión,$sql));
        if ($ok) {
          $ok = @mysqli_stmt_bind_param($reqUPD,'sdi',
                                        $texto,$precio,$identificador);
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
        $ok = @mysqli_begin_transacción($conexión);
        $transacción = TRUE;
      }
      if ($ok) {
        $ok = @mysqli_stmt_execute($consulta);
      }
      // En caso de error, interrumpir el procesamiento.
      if (! $ok) {break;}
    }
  } // foreach
  // Si todo está pasado correctamente, validar la transacción.
  if ($ok) {
    $ok = @mysqli_commit($conexión);
  }
  // En caso de problema, recuperar el mensaje de error y cancelar
  // la transacción.
  if (! $ok) {
    if (! $consulta) { // error en la preparación
      $error = @mysqli_error($conexión);
    } else { // error en otra parte
      $error = @mysqli_stmt_error($consulta);
    }
    @mysqli_rollback($conexión);
  }
  return $ok;
}
?>
