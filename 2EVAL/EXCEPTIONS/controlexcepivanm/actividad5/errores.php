<?php
ini_set("display_errors", 0);
require_once("./controlador.php");

//echo "<br> y seguimos...<br>";
set_exception_handler("micontro1");

declare(strict_types=1);
function suma($a, $b): string
{
    $suma = $a + $b;
    return $suma;
}
echo "la suma es " . suma(2, 4);

function numeros($a, $b)
{
    echo $a;
    echo $b;
}

numeros(3);
