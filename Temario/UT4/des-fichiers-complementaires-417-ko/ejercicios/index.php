<?php
// ¿Es la página que se llama con el argumento "fuente" en la URL?
$mostrar_fuente = isset($_GET['fuente']);
if ($mostrar_fuente) {
  // Sí.
  // Hay que mostrar el código fuente de una página.
  $titulo_pagina = "Fuente de {$_GET['fuente']}";  
  $fuente = $_GET['fuente'];
} else {
  // No.
  // Hay que mostrar una lista de enlaces
  $titulo_pagina = 'Ejercicios';
  // Lista de enlaces.
  $enlaces['<01>'] = 'Ejercicio 01 : mi primer script PHP';
  $enlaces['01/inicio.php'] = 'inicio.php';
  $enlaces['<02>'] = 'Ejercicio 02 : variables y estructuras de control';
  $enlaces['02/inicio-1.php'] = 'inicio-1.php';
  $enlaces['02/inicio-2.php'] = 'inicio-2.php';
  $enlaces['02/inicio-3.php'] = 'inicio-3.php';
  $enlaces['02/inicio-4.php'] = 'inicio-4.php';
  $enlaces['02/inicio.php'] = 'inicio.php';
  $enlaces['02/commun.inc.php'] = 'commun.inc.php';
  $enlaces['<03>'] = 'Ejercicio 03 : manipular los datos';
  $enlaces['03/inicio-1.php'] = 'inicio-1.php';
  $enlaces['03/inicio-2.php'] = 'inicio-2.php';
  $enlaces['03/inicio-3.php'] = 'inicio-3.php';
  $enlaces['03/inicio-4.php'] = 'inicio-4.php';
  $enlaces['03/inicio.php'] = 'inicio.php';
  $enlaces['03/commun.inc.php'] = 'commun.inc.php';
  $enlaces['<04>'] = 'Ejercicio 04 : Escribir y leer un archivo en el servidor';
  $enlaces['04/inicio.php'] = 'inicio.php';
  $enlaces['04/commun.inc.php'] = 'commun.inc.php';
  $enlaces['04/guardar_autores.php'] = 'guardar_autores.php';
  $enlaces['<05>'] = 'Ejercicio 05 : Escribir una función';
  $enlaces['05/inicio.php'] = 'inicio.php';
  $enlaces['05/commun.inc.php'] = 'commun.inc.php';
  $enlaces['<06>'] = 'Ejercicio 06 : Escribir una clase';
  $enlaces['06/inicio.php'] = 'inicio.php';
  $enlaces['06/clase.Autor.php'] = 'clase.Autor.php';
  $enlaces['<07>'] = 'Ejercicio 07 : gestionar errores';
  $enlaces['07/inicio-1.php'] = 'inicio-1.php';
  $enlaces['07/inicio.php'] = 'inicio.php';
  $enlaces['<08>'] = 'Ejercicio 08 : recuperar datos pasados por la URL';
  $enlaces['08/inicio.php'] = 'inicio.php';
  $enlaces['08/autor.php'] = 'autor.php';
  $enlaces['08/commun.inc.php'] = 'commun.inc.php';
  $enlaces['<09>'] = 'Ejercicio 09 : recuperar datos escritos en un formulario';
  $enlaces['09/introducir.php'] = 'introducir.php';
  $enlaces['<10>'] = 'Ejercicio 10 : controlar los datos pasados por la URL';
  $enlaces['10/inicio.php'] = 'inicio.php';
  $enlaces['10/autor.php'] = 'autor.php';
  $enlaces['10/commun.inc.php'] = 'commun.inc.php';
  $enlaces['<11>'] = 'Ejercicio 11 : controlar los datos introducidos en un formulario';
  $enlaces['11/introducir.php'] = 'introducir.php';
  $enlaces['<12>'] = 'Ejercicio 12 : utilizar MySQL';
  $enlaces['12/inicio.php'] = 'inicio.php';
  $enlaces['12/introducir.php'] = 'introducir.php';
  $enlaces['<13>'] = 'Ejercicio 13 : utilizar Oracle';
  $enlaces['13/inicio.php'] = 'inicio.php';
  $enlaces['13/introducir.php'] = 'introducir.php';
  $enlaces['<14>'] = 'Ejercicio 14 : utilizar SQLite';
  $enlaces['14/inicio.php'] = 'inicio.php';
  $enlaces['14/introducir.php'] = 'introducir.php';
  $enlaces['<15>'] = 'Ejercicio 15 : gestionar las sesiones';
  $enlaces['15/inicio.php'] = 'inicio.php';
  $enlaces['15/autor.php'] = 'autor.php';
  $enlaces['15/commun.inc.php'] = 'commun.inc.php';
  $enlaces['<16>'] = 'Ejercicio 16 : enviar un correo electrónico';
  $enlaces['16/mail.php'] = 'mail.php';
}
// Incluir el archivo que va a mostrar la página.
include('../include/index-capitulo.inc.php');
?>
