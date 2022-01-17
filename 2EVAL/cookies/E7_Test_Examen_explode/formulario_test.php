<?php
if (isset($_POST['enviar']))
		{
		if (isset($_POST['test']))
			if ($_POST["test"]=="realizado")
					{
					$datos=explode("-",$_COOKIE['actividades']);
					$datos[0]="realizado";
					$valorcookie=implode("-",$datos);
					setcookie("actividades", $valorcookie, time() + 300);	
					}
		die("fin de la aplicación");
		}	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="cache-control" content="no-cache">
	<title>Uso de cookies en PHP</title>
</head>

<body>
	<h1>El examen ya le has realizado</h1>
	<br>
	<form action="" method="POST">
		Aqui puedes seleccionar si has realizado o no el test:
		<br><br>
		<label><input type="radio" name="test" value="realizado">Realizado </label><br>
		<label><input type="radio" name="test" value="norealizado">No realizado</label><br>
		<br><br>
		<input type="submit" name="enviar">
	</form> 	
</body> 
</html>