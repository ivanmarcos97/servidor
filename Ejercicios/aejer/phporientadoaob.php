Ejemplo 1. PHP Orientado a Objetos
<?php
	class Libro {
		public $titulo	= "El nombre de la rosa";
		public $autor	= "Umberto Eco";
		public $editorial	= "Debolsillo";
	}

?>

<html>
<head>
<title>Ejercicio php_objetos_01</title>
</head>

<body>
	<?php
		$libro1 = new Libro();
	?>
	
	<h1 align="center"> <?php echo $libro1->titulo; ?>
	</h1>
	
</body>
</html>