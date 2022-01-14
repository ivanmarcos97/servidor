<?php
include("./usuario.php");
if (isset($_COOKIE['login'])) {
	//$usu=$_COOKIE['login'];
	$usu = unserialize($_COOKIE['login']);
	$date = $_POST["fecha"];
	echo "Usuario Correcto " . $usu->nom . " Ya se logeo exitóxamente en otro momento" . "<br>";
	echo $date;
	exit;
} else	
	if (isset($_POST['enviar'])) {
	if ($_POST['usuario'] == 'admin' && $_POST['clave'] == 'mjuan') {
		echo "Bienvenido";
		$date = $_POST["fecha"];
		echo $date;
		$usu = new Usuario($_POST['usuario'], $_POST['clave'], $_POST['fecha']);
		$usu = serialize($usu);
		setcookie('login', $usu, time() + 60);
	} else
		echo "Acceso denegado. Las credenciales no son correctas";
	exit;
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title> SERIALIZACIÓN DE OBJETOS </title>
</Head>

<body>
	<h3> Ejercicio 10 UT 5. Administración de sesiones </h3>
	<br>
	<!--FORMULARIO -->
	<p align="center">
	<h2> credenciales del usuario </h2>
	<form action="" method="post">
		Usuario: <input type="text" name="usuario">
		Contraseña: <input type="password" name="clave">
		<input type="submit" name="enviar" value="LOGIN">
		<input type="hidden" value="<?php echo date('H:i:s'); ?>" name="fecha" />
	</form>
	</p>

</body>

</html>