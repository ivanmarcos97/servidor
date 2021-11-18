<?php
//Buscamos un elemento en el array

$elemento=10;
if(array_search($elemento, $numeros)){
	echo "<h3>El número $elemento se encuentra en el array</h3>";
}else{
	echo "<h3>El número que deseas buscar no se encuentra en el array</h3>";
}
?>