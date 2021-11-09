<?php
// ¿Se llama a la página con el parámetro "fuente" 
// en la URL?
$mostrar_fuente = isset($_GET['fuente']);
if ($mostrar_fuente) {
  // Sí.
  // Se debe mostrar el código fuente de una página.
  $título_página = "Fuente de {$_GET['fuente']}";  
  $fuente = $_GET['fuente'];
} else {
  // No.
  // Se debe mostrar una lista de enlaces.
  $título_página = 'Capítulo 4';
  // Lista de enlaces.
  $enlaces['<1>'] = 'Funciones';
  $enlaces['./funciones/01-ejemplos-funciones.php'] = 'Ejemplos de funciones';
  $enlaces['./funciones/02-tipo-retorno.php'] = 'Declaración del tipo de datos de retorno';
  $enlaces['./funciones/03-tipo-retorno-strict.php'] = 'Declaración del tipo de datos de retorno (tipo strict)';
  $enlaces['./funciones/04-funcion-variable.php'] = 'Función variable';
  $enlaces['./funciones/05-parametro-por-defecto.php'] = 'Parámetros: valor por defecto';
  $enlaces['./funciones/06-parametro-tipo.php'] = 'Parámetros: declaración del tipo de datos';
  $enlaces['./funciones/07-parametro-tipo-strict.php'] = 'Parámetros: declaración del tipo de datos (tipo strict)';
  $enlaces['./funciones/08-parametro-referencia.php'] = 'Parámetros: pase por referencia';
  $enlaces['./funciones/09-parametro-variable.php'] = 'Parámetros: lista variable de parámetros';
  $enlaces['./funciones/10-variable-global.php'] = 'Variable local / global';
  $enlaces['./funciones/11-variable-estatica.php'] = 'Variable estática';
  $enlaces['./funciones/12-constante.php'] = 'Las constantes y las funciones';
  $enlaces['./funciones/13-funcion-recursiva.php'] = 'Ejemplo de función recursiva';
  $enlaces['./funciones/14-funcion-anonima.php'] = 'Función anónima';
  $enlaces['./funciones/15-funcion-generadora.php'] = 'Función generadora';
  $enlaces['<2>'] = 'Clases';
  $enlaces['./clases/01-utilizar-clase.php'] = 'Ejemplo de clase';
  $enlaces['./clases/02-clase-herencia.php'] = 'Herencia de clase';
  $enlaces['./clases/03-clase-abstracta.php'] = 'Clase o método abstracto';
  $enlaces['./clases/04-clase-interfaz.php'] = 'Interfaz';
  $enlaces['./clases/05-atributo-metodo-estatico.php'] = 'Atributo o método estático - Constante de clase';
  $enlaces['./clases/06-traits.php'] = 'Traits';
  $enlaces['./clases/07-clase-anonima.php'] = 'Clase anónima';
  $enlaces['./clases/08-excepciones.php'] = 'Excepciones';
  $enlaces['./clases/09-namespace.php'] = 'Espacio de nombres';
}
// Incluir el archivo que mostrará la página.
include('../include/indice-capitulo.inc.php');
?>

