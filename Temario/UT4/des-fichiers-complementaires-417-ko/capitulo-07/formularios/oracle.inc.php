<?php

// Constantes para los diferentes nombres de columnas.
const IDENTIFICADOR='IDENTIFICADOR';
const TEXTO='TEXTO';
const PRECIO='PRECIO';

// Función para la conexión a la base de datos.
function conexión(&$conexión,&$error) {
  $conexión = @oci_connect('demeter','demeter','diane','UTF8');
  // Probar si la conexión está pasada correctamente.
  if ($conexión === FALSE) { // error 
    // Recuperar el mensaje de error.
     $error = @oci_error()['mensaje'];
     $ok = FALSE;
  } else {
    $ok = TRUE;
  }
  return $ok;
}

// Función para la selección de los artículos.
function seleccionar_artículos($conexión,&$consulta,&$error) {
  // Texto de la consulta.
  $sql = 'SELECT identificador,texto,precio FROM artículos ORDER BY texto';
  // Analizar la consulta.
  $ok = (bool) ($consulta = @oci_parse($conexión,$sql));
  // Ejecutar la consulta.
  if ($ok) {
    $ok = @oci_execute($consulta);
  }
  // Probar si todo está pasado correctamente.
  if (! $ok) { // error en alguna parte
    // Recuperar el mensaje de error.
    if (! $consulta) { // error en el análisis
      $error = @oci_error($conexión)['mensaje'];
    } else { // error en otra parte
      $error = @oci_error($consulta)['mensaje'];
    }
  }
  return $ok;
}

// Función para la lectura del artículo siguiente en
// el resultado de una consulta.
function leer_artículo_siguiente($conexión,$consulta,&$artículo,&$error) {
  $ok = (bool) ($artículo = @oci_fetch_array($consulta));
  // Si oci_fetch_array devuelve FALSE, comprobar si es 
  // a causa de un error o no.
  if (! $ok) {
    $e = @oci_error($consulta); 
    if ($e === FALSE) { // ningún error
      $ok = NULL; // devolver NULL en lugar de FALSE
    } else { // error => recuperar el mensaje de error
      $error = $e['mensaje'];
    }
  }
  return $ok;
}

// Función para la selección de un artículo cuyo identificador 
// se pasa como parámetro.
function seleccionar_un_artículo($conexión,$identificador,&$artículo,&$error) {
  // Texto de la consulta.
  $sql = 'SELECT identificador,texto,precio FROM artículos WHERE identificador = :p1';
  // Analizar la consulta.
  $ok = (bool) ($consulta = @oci_parse($conexión,$sql));
  // Vincular el parámetro.
  if ($ok) {
    $ok = (bool) @oci_bind_by_name($consulta,':p1',$identificador,-1,SQLT_INT);
  }
  // Ejecutar la consulta.
  if ($ok) {
    $ok = @oci_execute($consulta);
  }
  // Leer el resultado.
  if ($ok) {
    $artículo = @oci_fetch_array($consulta);
    $ok = (bool) (! @oci_error($consulta));
  }
  // Probar si todo está pasado correctamente.
  if (! $ok) { // error en alguna parte
    if (! $consulta) { // error en el análisis
      $error = @oci_error($conexión)['mensaje'];
    } else { // error en otra parte
      $error = @oci_error($consulta)['mensaje'];
    }
  }
  return $ok;
}

// Función para guardar un artículo.
function guardar_artículo($conexión,$artículo,&$error) {
  // Texto de la consulta.
  $sql = 'UPDATE artículos SET texto = :p1, precio = :p2 ' .
         'WHERE identificador = :p3';
  // Analizar la consulta.
  $ok = (bool) ($consulta = @oci_parse($conexión,$sql));
  // Vincular los parámetros.
  if ($ok) {
    $ok =    @oci_bind_by_name($consulta,':p1',$artículo['texto'])
          && @oci_bind_by_name($consulta,':p2',$artículo['precio'])
          && @oci_bind_by_name($consulta,':p3',$artículo['identificador'],-1,SQLT_INT);
  }
  // Ejecutar la consulta.
  if ($ok) {
    $ok = @oci_execute($consulta);
  }
  // Probar si todo está pasado correctamente.
  if (! $ok) { // error en alguna parte
    if (! $consulta) { // error en el análisis
      $error = @oci_error($conexión)['mensaje'];
    } else { // error en otra parte
      $error = @oci_error($consulta)['mensaje'];
    }
  }
  return $ok;
}

// Función para guardar una lista de artículos (en asociación
// con el formulario de publicación con lista).
function guardar_artículos($conexión,$líneas,&$error) {
  // Inicializar las variables utilizadas para las consultas con parámetros.
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
        $sql = 'INSERT INTO artículos(texto,precio) VALUES(:p1,:p2)';
        $ok = (bool) ($reqINS = @oci_parse($conexión,$sql));
        if ($ok) {
          $ok = @oci_bind_by_name($reqINS,':p1',$texto,40)
             && @oci_bind_by_name($reqINS,':p2',$precio,32);
        }
      }
      $consulta = $reqINS;
    } elseif (isset($línea['eliminar'])) {
      // Casilla "eliminar" oculta = eliminación = DELETE
      if ($reqDEL == NULL) {
        // La primera vez, preparar la consulta.
        $sql = 'DELETE FROM artículos WHERE identificador = :p1';
        $ok = (bool) ($reqDEL = @oci_parse($conexión,$sql));
        if ($ok) {
          $ok = @oci_bind_by_name($reqDEL,':p1',$identificador,-1,SQLT_INT);
        }
      }
      $consulta = $reqDEL;
    } elseif (! empty($línea['modificar'])) {
      // Campo "modificar" no vacío = modificación = UPDATE
      if ($reqUPD == NULL) {
        // La primera vez, preparar la consulta.
        $sql = 'UPDATE artículos SET texto = :p1, precio = :p2 '.
               'WHERE identificador = :p3';
        $ok = (bool) ($reqUPD = @oci_parse($conexión,$sql));
        if ($ok) {
          $ok = @oci_bind_by_name($reqUPD,':p1',$texto,40)
             && @oci_bind_by_name($reqUPD,':p2',$precio,32)
             && @oci_bind_by_name($reqUPD,':p3',$identificador,-1,SQLT_INT);
        }
      }
      $consulta = $reqUPD;
    }
    // En caso de error, interrumpir el procesamiento.
    if ($ok === FALSE) {break;}
    // Si se ha determinado una consulta, ejecutarla.
    if ($consulta != NULL) {
      // Sin COMMIT automático.
      $ok = @oci_execute($consulta,OCI_DEFAULT);
      // En caso de error, interrumpir el procesamiento.
      if (! $ok) {break;}
    }
  } // foreach
  // Si todo está pasado correctamente, validar la transacción.
  if ($ok) {
    $ok = @oci_commit($conexión);
  }
  // En caso de problema, recuperar el mensaje de error y cancelar
  // la transacción.
  if (! $ok) {
    if (! $consulta) { // error en el análisis
      $error = @oci_error($conexión)['mensaje'];
    } else { // error en otra parte
      $error = @oci_error($consulta)['mensaje'];
    }
    @oci_rollback($conexión);
  }
  return $ok;
}
?>
