<?php
//ini_set("display_errors", 0);
try {
    //throw new Exception("<br> Variable no declarada<br> ");
    echo $a;
} catch (Exception $e) {
    echo   $e->getMessage();
}
try {
    throw new Exception("<br> no se encuentra el archivo<br> ");
    include_once("./nomevasaencontrar.php");
} catch (Exception $e) {
    echo  $e->getMessage();
}
