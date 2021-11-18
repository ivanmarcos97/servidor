<?php
// ¿Se llama a la página con el parámetro "fuente" 
// en la URL?
$mostrar_fuente = isset($_GET['fuente']);
if ($mostrar_fuente) {
  // Sí.
  // Se debe mostrar el código fuente de una página.
  $título_página = "Fuente de {$_GET['fuente']}";  
  // Eliminar los posibles parámetros de la URL.
  $fuente = preg_replace('/\?.*/','',$_GET['fuente']);
} else {
  // No.
  // Se debe mostrar una lista de enlaces.
  $título_página = 'Capítulo 7';
  // Lista de enlaces.
  $enlaces['<1>'] = 'MySQL';
  $enlaces['mysql/01-conexion.php'] = 'Conexión y desconexión';
  $enlaces['mysql/02-numero-lineas.php'] = 'Consulta no preparada: número de líneas en el resultado de una consulta de lectura (mysqli_num_rows)';
  $enlaces['mysql/03-fetch.php'] = 'Consulta no preparada: probar las diferentes técnicas de fetch (mysqli_fetch_*)';
  $enlaces['mysql/04-fetch-all.php'] = 'Consulta no preparada: mysqli_fetch_all';
  $enlaces['mysql/05-leer-una-linea.php'] = 'Consulta no preparada: leer una línea';
  $enlaces['mysql/06-leer-varias-lineas.php'] = 'Consulta no preparada: leer varias líneas';
  $enlaces['mysql/07-actualizacion.php'] = 'Consulta no preparada: actualización';
  $enlaces['mysql/08-gestion-errores.php'] = 'Consulta no preparada: gestión de errores';
  $enlaces['mysql/09-stmt-lectura.php'] = 'Consulta preparada: lectura';
  $enlaces['mysql/10-stmt-lectura-almacenada.php'] = 'Consulta preparada: lectura con resultado almacenado';
  $enlaces['mysql/11-stmt-actualizacion.php'] = 'Consulta preparada: actualización';
  $enlaces['mysql/12-stmt-gestion-errores.php'] = 'Consulta preparada: gestión de errores';
  $enlaces['mysql/13-transaccion.php'] = 'Transacción';
  $enlaces['mysql/14-procedimiento-almacenado-out.php'] = 'Procedimiento almacenado con parámetro OUT';
  $enlaces['mysql/15-procedimiento-almacenado-resultado.php'] = 'Procedimiento almacenado que devuelve un resultado directamente';
  $enlaces['mysql/16-funcion-almacenada.php'] = 'Función almacenada';
  $enlaces['<2>'] = 'Oracle';
  $enlaces['oracle/01-conexion.php'] = 'Conexión y desconexión';
  $enlaces['oracle/02-fetch.php'] = 'Probar las diferentes técnicas de fetch';
  $enlaces['oracle/03-fetch-all.php'] = 'Probar las diferentes técnicas de fetch (oci_fetch_all)';
  $enlaces['oracle/04-leer-una-linea.php'] = 'Leer una línea';
  $enlaces['oracle/05-leer-varias-lineas.php'] = 'Ler varias líneas';
  $enlaces['oracle/06-bind.php'] = 'Consultas con parámetros';
  $enlaces['oracle/07-actualizacion.php'] = 'Actualización';
  $enlaces['oracle/08-transaccion.php'] = 'Transacción';
  $enlaces['oracle/09-procedimiento-almacenado.php'] = 'Llamar a un procedimiento almacenado';
  $enlaces['oracle/10-cursor-implicito.php'] = 'Ler un cursor implícito (novedad de Oracle 12c)';
  $enlaces['oracle/11-entorno-nls.php'] = 'Entorno NLS';
  $enlaces['oracle/12-gestion-errores.php'] = 'Gestion de errores';
  $enlaces['<3>'] = 'SQLite';
  $enlaces['sqlite/01-fetch.php'] = 'Probar las diferentes técnicas de fetch';
  $enlaces['sqlite/02-leer-una-linea.php'] = 'Leer una línea';
  $enlaces['sqlite/03-leer-varias-lineas.php'] = 'Leer varias líneas';
  $enlaces['sqlite/04-actualizacion.php'] = 'Actualización';
  $enlaces['sqlite/05-transaccion.php'] = 'Transacción';
  $enlaces['sqlite/06-gestion-errores.php'] = 'Gestion de errores';
  $enlaces['<4>'] = 'PHP Data Objects (PDO)';
  $enlaces['pdo/01-pdo.php?prueba=1'] = 'PHP Data Objects (PDO): MySQL';
  $enlaces['pdo/01-pdo.php?prueba=2'] = 'PHP Data Objects (PDO): Oracle';
  $enlaces['pdo/01-pdo.php?prueba=3'] = 'PHP Data Objects (PDO): SQLite';
  $enlaces['<5>'] = 'Gestión de los apóstrofes en el texto de las consultas';
  $enlaces['apostrofes/01-apostrofe-problema.php'] = 'Problema';
  $enlaces['apostrofes/02-apostrofe-solucion.php'] = 'Solución';
  $enlaces['apostrofes/03-construir-consulta.php'] = 'Construir una consulta';
  $enlaces['<6>'] = 'Ejemplos de integración en los formularios';
  $enlaces['formularios/01-lista-selec.php?prueba=1'] = 'Lista de selección (MySQL)';
  $enlaces['formularios/01-lista-selec.php?prueba=2'] = 'Lista de selección (Oracle)';
  $enlaces['formularios/01-lista-selec.php?prueba=3'] = 'Lista de selección (SQLite)';
  $enlaces['formularios/02-lista-articulos.php?prueba=1'] = 'Presentación de una lista (MySQL)';
  $enlaces['formularios/02-lista-articulos.php?prueba=2'] = 'Presentación de una lista (Oracle)';
  $enlaces['formularios/02-lista-articulos.php?prueba=3'] = 'Presentación de una lista (SQLite)';
  $enlaces['formularios/03-gestion-articulos.php?prueba=1'] = 'Formulario de publicación en lista (MySQL)';
  $enlaces['formularios/03-gestion-articulos.php?prueba=2'] = 'Formulario de publicación en lista (Oracle)';
  $enlaces['formularios/03-gestion-articulos.php?prueba=3'] = 'Formulario de publicación en lista (SQLite)';
  $enlaces['formularios/04-entrada-articulo.php?prueba=1'] = 'Formulario de publicación (MySQL)';
  $enlaces['formularios/04-entrada-articulo.php?prueba=2'] = 'Formulario de publicación (Oracle)';
  $enlaces['formularios/04-entrada-articulo.php?prueba=3'] = 'Formulario de publicación (SQLite)';
}
// Incluir el archivo que mostrará la página.
include('../include/indice-capitulo.inc.php');
?>
