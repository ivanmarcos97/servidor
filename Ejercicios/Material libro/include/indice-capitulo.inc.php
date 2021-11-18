<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php echo $título_página; ?></title>
  </head>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  <body>
    <div>
    <?php
    if ($mostrar_fuente) {
      // Visualización del código fuente de una página.
      highlight_file($fuente);
    } else {
      // Código JavaScript para la visualización del enlace en otra ventana.
      $onclick="window.open(this.href,'_blank'); return false;";
      // Mostrar una lista de enlaces.
      foreach ($enlaces as $enlace => $título) {
        if (preg_match('/<[0-9]+>/',$enlace) > 0) { // título separador
          echo "<h1>$título</h1>\n";
        } else {
          printf // enlace hacia la página
            (
            "<a href=\"%s\" onclick=\"%s\">%s</a>&nbsp;&nbsp;&nbsp;&nbsp;",
            $enlace,
            $onclick,
            htmlentities($título,ENT_QUOTES,'UTF-8')
            );
          printf // enlace hacia el código fuente de la página
            (
            "<a href=\"index.php?fuente=%s\" onclick=\"%s\">(fuente)</a><br />\n",
            $enlace,
            $onclick
            );
        }
      }
    }
    ?>
    </div>
  </body>
</html>
