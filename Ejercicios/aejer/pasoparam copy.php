<?php
//isset comprueba que existe el dato pasado por la URL
if(isset($_GET['numero1']) && isset($_GET['numero2'])){
	$numero1=$_GET['numero1'];
	$numero2=$_GET['numero2'];
	
	if($numero1 <$numero2) {
		for($j=$numero1;$j<=$numero2;$j++){
			if($j%2 ==0)	echo "<h1>$j</h1>";
		}
	}
	else echo "<h1>El número 1 debe ser menor al número 2</h1>";
}else{
	echo "<h1>No has pasado los parámetros por GET</h1>";
}
?>