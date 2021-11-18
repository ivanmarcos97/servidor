<?php
// Tratamiento del formulario.
if (isset($_POST['ok'])) {
  // Recuperación de la información introducida (que hay que comprobar).
  $a = $_POST['a'];
  $de = $_POST['de'];
  $asunto = $_POST['asunto'];
  $texto = $_POST['texto'];
  // Encabezados adicionales. 
  $encabezados['From'] = $de; 
  $encabezados['Reply-To'] = $de; 
  $encabezados['Content-Type'] = 'text/plain; charset=utf-8'; 
  $encabezados['X-Priority'] = '1'; 
  // Envío del mensaje.
  $ok = mail($a,$asunto,$texto,$encabezados); 
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Nuevo mensaje</title>
    <style>
    label { display: block; width: 60px; float: left; }
    </style>
  </head>
  <body>
    <!-- Mostrar formulario --> 
    <form action="mail.php" method="post"> 
    <div>
      <label>A</label>
      <input type="text" name="a" size="40" maxlength="40" /> 
      <br /><label>De</label>
      <input type="text" name="de" size="40" maxlength="40" /> 
      <br /><label>Objet</label>
      <input type="text" name="asunto" size="40" maxlength="40" /> 
      <br /><label>Texte</label> 
      <textarea name="texto" rows="20" cols="80"></textarea>
      <br /> 
      <input type="submit" name="ok" value="Enviar" /> 
    </div> 
    </form>
  </body>
</html>