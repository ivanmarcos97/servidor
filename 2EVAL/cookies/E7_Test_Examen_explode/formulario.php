<?php
if (isset($_POST['enviar']))
	{
	 if (isset($_POST["test"]))
		if ($_POST["test"]=="realizado")
			$datos[0]="realizado";
		else
		    $datos[0]="norealizado";
		if (isset($_POST["examen"]))	
			if ($_POST["examen"]=="realizado")
			$datos[1]="realizado";
		else
			$datos[1]="norealizado";
		$valorcookie=implode("-",$datos);
		setcookie("actividades", $valorcookie, time() + 300);
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
	<h1>Selecciona la actividad realizada</h1>
	<form action="" method="POST">
		Aqui puedes seleccionar si has realizado o no el test:
		<br><br>
		<label><input type="radio" name="test" value="realizado">Realizado </label><br>
		<label><input type="radio" name="test" value="norealizado">No realizado</label><br>
		<br><br>
		Aqui puedes seleccionar si has realizado o no el Examen:
		<br><br>
		<label><input type="radio" name="examen" value="realizado">Realizado<label><br>
		<label><input type="radio" name="examen" value="norealizado">No realizado<label><br>
		<br><br>
		<input type="submit" name="enviar" >
	</form> 	
</body> 
</html>