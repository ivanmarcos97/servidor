<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
<meta charset="utf-8">
	<title>Mostrar Cáculo</title>
</head>

<body>
  <?php 
  
    //el trim comprueba si la variable viene vacía
    if ((trim($_POST['nombre'])!="") && (trim($_POST['apellidos'])!="") && (trim($_POST['edad'])!="") && (trim($_POST['salario'])!=""))
	{
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$edad=$_POST['edad'];
		$salario=$_POST['salario'];
		if($salario<1000)
		{
			if($edad<30) $salario=1100;
			elseif($edad<=45) $salario=$salario*1.3;
			else $salario=$salario*1.1;
		}
		elseif($salario<=2000)
		{
			if($edad>45) $salario*=1.03;
			else $salario*=1.1;
		}
		echo "$nombre $apellidos, tu nuevo salario será de $salario €";
	}
	else echo "<p class='error'>Faltan Datos</p>";
		
	
?>
<p><a href="index.php">Volver</a></p>
</body>
</html>
