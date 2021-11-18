<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Manipular los tipos de datos</title>
    <style type="text/css">
      h1 { font-family: "Courier New",Courier,monospace ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>conversión implícita </h1>
    <?php
    $número = 123;
    $cadena = "456abc";
    echo '$número + $cadena = ';
    var_dump($número + $cadena);
    echo '<br />';
    echo '$número . $cadena = ';
    var_dump($número . $cadena);
    echo '<br />';
    echo '$número = ';
    var_dump($número);
    echo '<br />';
    echo '$cadena = ';
    var_dump($cadena);
    ?>
    
    <h1>(type)valor</h1>
    <?php
    echo '(float)"1abc" = ',var_dump((float)"1abc"),'<br />';
    echo '(float)"1.5abc" = ',var_dump((float)"1.5abc"),'<br />';
    echo '(float)"abc1" = ',var_dump((float)"abc1"),'<br />';
    echo '(int)1.7 = ',var_dump((int)1.7),'<br />';
    echo '(int)TRUE = ',var_dump((int)TRUE),'<br />';
    echo '(int)FALSE = ',var_dump((int)FALSE),'<br />';
    echo '(bool)-1 = ',var_dump((bool)-1),'<br />';
    echo '(bool)0 = ',var_dump((bool)0),'<br />';
    echo '(bool)1 = ',var_dump((bool)1),'<br />';
    echo '(bool)"" = ',var_dump((bool)""),'<br />';
    echo '(bool)"0" = ',var_dump((bool)"0"),'<br />';
    echo '(bool)"1" = ',var_dump((bool)"1"),'<br />';
    echo '(bool)"a" = ',var_dump((bool)"a"),'<br />';
    ?>

    <h1>settype()</h1>
    <?php
    $x = '1abc';
    settype($x,'integer');
    echo '\'1abc\' convertido en entero = ',var_dump($x),'<br />';
    $x = 1.7;
    settype($x,'integer');
    echo '1.7 convertido en entero = ',var_dump($x),'<br />';
    $x = TRUE;
    settype($x,'string');
    echo 'TRUE convertido en cadena = ',var_dump($x),'<br />';
    $x = '0';
    settype($x,'boolean');
    echo '\'0\' convertido en booleano = ',var_dump($x),'<br />';
    $x = -1;
    settype($x,'boolean');
    echo '-1 convertido en booleano = ',var_dump($x),'<br />';
    ?>
    
    <h1>is_*()</h1>
    <?php
    unset($x);
    if (is_null($x)) {
      echo 'De momento, $x es del tipo NULL.<br />';
    }
    $x = (1 < 2);
    if (is_bool($x)) {
      echo '$x = (1 < 2) es del tipo booleano.<br />';
    }
    $x = '123abc';
    if (is_string($x)) {
      echo '$x = "123abc" es del tipo cadena ...<br />';
    }
    if (! is_numeric($x)) {
      echo '... pero no del "tipo" <i>numérico</i>.<br />';
    }
    $x = '1.23e45';
    if (is_numeric($x)) {
      echo 'Sin embargo, $x ="1.23e45" es de « tipo » <i>numeric</i>.<br />';
    }
    ?>
    
    <h1>strval()</h1>
    <?php
    $x = TRUE;
    echo var_dump($x),' => ',var_dump(strval($x)),'<br />';
    $x = 1.2345;
    echo var_dump($x),' => ',var_dump(strval($x)),'<br />';
    ?>
    
    <h1>floatval()</h1>
    <?php
    $x = TRUE;
    echo var_dump($x)," => ",var_dump(floatval($x)),'<br />';
    $x = 123;
    echo var_dump($x)," => ",var_dump(floatval($x)),'<br />';
    $x = "1.23e45";
    echo var_dump($x)," => ",var_dump(floatval($x)),'<br />';
    $x = "123abc";
    echo var_dump($x)," => ",var_dump(floatval($x)),'<br />';
    $x = "\n\t\r 123.45abc";
    echo var_dump($x)," => ",var_dump(floatval($x)),'<br />';
    ?>
    
    <h1>intval()</h1>
    <?php
    $x = TRUE;
    echo var_dump($x),' => ',var_dump(intval($x)),'<br />';
    $x = 123.9;
    echo var_dump($x),' => ',var_dump(intval($x)),'<br />';
    $x = "1.23e45";
    echo var_dump($x),' => ',var_dump(intval($x)),'<br />';
    $x = "123abc";
    echo var_dump($x)," => ",var_dump(intval($x)),'<br />';
    $x = "\n\t\r 123.45abc";
    echo var_dump($x)," => ",var_dump(intval($x)),'<br />';
    ?>
    
    <h1>round()</h1>
    <?php
    $x = 123.9;
    echo "round($x) => ",var_dump(round($x)),'<br />';
    echo "intval(round($x))) => ",
      var_dump(intval(round($x))),'<br />';
    echo "(int) round($x) => ",
      var_dump((int) round($x)),'<br />';
    ?>

    <h1>boolval()</h1>
    <?php
    $x = -1;
    echo var_dump($x),' => ',var_dump(boolval($x)),'<br />';
    $x = 0;
    echo var_dump($x),' => ',var_dump(boolval($x)),'<br />';
    $x = 1;
    echo var_dump($x),' => ',var_dump(boolval($x)),'<br />';
    $x = "";
    echo var_dump($x)," => ",var_dump(boolval($x)),'<br />';
    $x = "0";
    echo var_dump($x)," => ",var_dump(boolval($x)),'<br />';
    $x = "1";
    echo var_dump($x)," => ",var_dump(boolval($x)),'<br />';
    $x = "a";
    echo var_dump($x)," => ",var_dump(boolval($x)),'<br />';
    ?>
    
    </div>
  </body>
</html>
