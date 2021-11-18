Ejemplo 12. Arrays asociativos
<?php

$personas=array(
	"nombre"=>"Jesús",
	"apellidos"=> "Fernández Toledo",
	"Ciudad"=>"Casas de Fernando Alonso"
);
echo $personas["apellidos"]; //Mostramos la segunda posición del array
var_dump($personas); //Vemos todas las posiciones del array
?>
Ejemplo 13. Arrays asociativos multidimensionales – Ejercicio 1
<?php

$personas=array(
	array(
		"nombre"=>"Jesús",
		"apellidos"=> "Fernández Toledo",
		"Ciudad"=>"Casas de Fernando Alonso"
	),
	array(	
		"nombre"=>"Miriam",
		"apellidos"=> "Ortega López",
		"Ciudad"=>"San Clemente"
	),
	array(
		"nombre"=>"Diego",
		"apellidos"=> "Fernández Ortega",
		"Ciudad"=>"Albacete"
	)
);
echo $personas[0]["apellidos"]; //Mostramos la segunda posición del primer elemento del array
echo "<br>";
var_dump($personas); //Vemos todos los elementos del array
echo "<br>";
echo "<br>";
//Recorremos el array
foreach ($personas as $key =>$persona){
	var_dump($persona);
}
?>