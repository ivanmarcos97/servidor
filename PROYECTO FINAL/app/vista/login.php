<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/login.css" />
  <title>Login</title>
</head>

<body>
  <header>
    <ul>
      <li id="logo">
        <a href="../index.html"><img alt="logo" src="../imagenes/logoi+gen.png" /></a>
      </li>
      <li id="leng">
        <select name="idioma" id="idioma">
          <option value="Español">Español</option>
          <option value="Ingles">Ingles</option>
        </select>
      </li>
    </ul>
  </header>

  <main>
    <div id="centro">

      <h1>LOGIN</h1>
      <div> <?php echo $datos; ?></div>
      <form method="post" action="../controlador/control_buscar_usuarios.php">
        <div class="contenedor">
          <label for="n">Nombre de usuario : </label>
          <input id="n" type="text" placeholder="Introduce el usuario" name="usuario" required />
          <br />
          <label for="c">Contraseña : </label>
          <input id="c" type="password" placeholder="Introduce la Contraseña" name="contra" required /><br />
          <button type="submit" name="LOGIN">Login</button><br />
          <input type="checkbox" checked="checked" /> Recordar usuario<br />

          Olvidaste tu <a href="#"> Contraseña? </a><br />

          ¿Todavia no tienes cuenta?<a href="../vista/registro.html">
            Registrarse
          </a>
        </div>
      </form>
    </div>
  </main>

  <footer>
    <ul>
      <li id="contac"><a href="#">Contactos</a></li>
      <li id="ayu"><a href="#">Ayuda</a></li>
      <li id="patro"><a href="#">Patrocinadores</a></li>
      <li id="redes">
        <a href="#" class="wp"> </a>
        <a href="#" class="ig"> </a>
        <a href="#" class="fb"> </a>
      </li>
    </ul>
    <p>&copy; Iván Marcos</p>
  </footer>
</body>

</html>