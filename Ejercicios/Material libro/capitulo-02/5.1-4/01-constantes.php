<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Constantes</title>
  </head>
  <body>
  <div>
  
  <?php
  // Definir una constante (cuyo nombre es por defecto 
  // sensible a mayúsculas y minúsculas).
  define('CONSTANTE','valor de CONSTANTE');
  // Mostrar el valor de CONSTANTE (=> OK).
  echo 'CONSTANTE = ',CONSTANTE,'<br />';
  // Mostrar el valor de constante (=> vacío)
  echo 'constante = ',CONSTANTE;
  echo ' => interpretado de forma literal<br />';
  // Utilización de la palabra clave const (desde la versión 5.3)
  const OTRA_CONSTANTE = 'PHP 7.0';
  echo 'OTRA_CONSTANTE = ', OTRA_CONSTANTE,'<br />';
  // Utilización de una expresión compleja para definir el valor
  // de una constante con la función define.
  define('DE_NUEVO_UNA_CONSTANTE',md5(uniqid(rand())));
  echo 'DE_NUEVO_UNA_CONSTANTE = ', DE_NUEVO_UNA_CONSTANTE,'<br />';
  // Utilización de una expresión simple para definir el valor
  // de una constante con la palabra clave const (desde la versión 5.6).
  const UNA_ULTIMA_CONSTANTE = OTRA_CONSTANTE . ' (nuevo)';
  echo 'UNA_ULTIMA_CONSTANTE = ', UNA_ULTIMA_CONSTANTE;
  ?>

  </div>
  </body>
</html>
