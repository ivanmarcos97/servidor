<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Manipular las fechas</title>
    <style type="text/css">
      h1 { font-family: "Courier New",Courier,monospace ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>checkdate()</h1>
    <?php
    $día = 26; $mes = 8 ; $año = 1966;
    echo "$día/$mes/$año => ",
          var_dump(checkdate($mes,$día,$año)),'<br />';
    $día = 29; $mes = 2 ; $año = 2000;
    echo "$día/$mes/$año => ",
          var_dump(checkdate($mes,$día,$año)),'<br />';
    $día = 29; $mes = 2 ; $año = 2001;
    echo "$día/$mes/$año => ",
          var_dump(checkdate($mes,$día,$año)),'<br />';
    ?>
    
    <h1>date()</h1>
    <?php
    // sin segundo parámetro = utilización de la marca de tiempo actual
    echo 'Fecha en formato DD/MM/AAAA: ', date('d/m/Y'),'<br />'; 
    echo 'Hora: ', date('H:i:s'),'<br />'; 
    echo 'Unix celebró su millonésimo segundo el ',
          date('d/m/Y a las H:i:s',1000000000),'<br />'; 
    ?>

    <h1>strftime()</h1>
    <?php
    echo 'Fecha/Hora: ',
          strftime('%d/%m/%Y - %H:%M:%S '),'<br />'; 
    setlocale(LC_ALL,'es_ES');
    echo 'Formato largo (español): ',
          utf8_encode(strftime('%A %d %B %Y')),'<br />'; 
    setlocale(LC_ALL,'en_US');
    echo 'Formato largo (inglés): ',
          strftime('%A %d %B %Y'),'<br />'; 
    ?>

    <h1>getdate()</h1>
    <?php
    $fecha = getdate(); // ahora
    foreach($fecha as $clave => $valor) {
      echo "$clave => $valor<br />";
    }
    ?>
    
    <h1>date_parse_from_format()</h1>
    <?php
    $fecha = date_parse_from_format('d/m/Y','26/08/1966');
    foreach($fecha as $clave => $valor) {
      echo '$clave => $valor<br />';
    }
    ?>

    <h1>time()</h1>
    <?php
    $ts = time();
    echo "marca de tiempo Unix actual = $ts";
    ?>
    
    <h1>mktime()</h1>
    <?php
    $ts = mktime(0,0,0,8,26,1966);
    echo 'mktime(0,0,0,8,26,1966) = ',
          date('d/m/Y - H:i:s',$ts),'<br />';
    $ts = mktime(0,0,0,8,26+20000,1966);
    echo '20000 días después del 26/08/1966 = ',
          date('d/m/Y',$ts),'<br />';
    ?>
    
    <h1>microtime()</h1>
    <?php
    // Muestra el microtime en forma de una cadena.
    echo microtime().'<br />';
    // Muestra el microtime en forma de tiempo real.
    echo microtime(TRUE).'<br />';
    // Para conservar únicamente los microsegundos, lo más
    // fácil es transformar la cadena en tiempo real.
    echo (float) microtime().'<br />';
    ?>
    
    <h1>idate()</h1>
    <?php
    // Visualización de la fecha/hora actual para su control
    echo strftime('%d/%m/%Y - %H:%M:%S'),'<br />'; 
    // Extracción de diferentes componentes
    $componentes = str_split('YmdHistwW');
    foreach($componentes as $componente) {
      echo '$componente = ',idate($componente),'<BR>';
    }
    ?>
            
    </div>
  </body>
</html>
