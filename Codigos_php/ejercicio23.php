<?php
//Generar un número entre 1 y 6 simulando el lanzamiento de un dado
//Mostrar un mensaje de ¡Enhorabuena! si se obtiene un 6

//función convencional de usuario
/*
function función_aleatoria() 
{
$n=rand(1,6);	
if ($n==6)
	echo "¡Enhorabuena! el valor obtenido es $n";
else
	echo "El valor obtenido es $n.Intentalo de nuevo ejecutando otra vez el script";
};

función_aleatoria();
*/

//función anónima y callback
$función_aleatoria=function() 
{
$n=rand(1,6);	
if ($n==6)
	echo "¡Enhorabuena! el valor obtenido es $n";
else
	echo "El valor obtenido es $n.Intentalo de nuevo ejecutando otra vez el script";
};

function jugar($función_aleatoria)
{
	$función_aleatoria();
}		
jugar($función_aleatoria);


/*
//variable de función

function función_aleatoria() 
{
$n=rand(1,6);	
if ($n==6)
	echo "¡Enhorabuena! el valor obtenido es $n";
else
	echo "El valor obtenido es $n.Intentalo de nuevo ejecutando otra vez el script";
};

function función_mensaje()

{
	echo "<br>HOLA";
}	

$juego='función_aleatoria';
$juego();
$juego='función_mensaje';
$juego();

*/




















?>






