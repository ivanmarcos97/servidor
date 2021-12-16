<?php
//ini_set("display_errors", 0);
try {
    //$a = 1;
    if (!isset($a)) {

        throw new Exception(" Variable no declarada ");
    } else {
        echo $a;
    }
} catch (Exception $e) {
    echo   $e->getMessage() . "<br>";
}
try {
    if (!file_exists("./nomevasaencontrar.php")) {

        throw new Exception("No se encuentra el archivo ");
    } else {
        include_once("./nomevasaencontrar.php");
    }
} catch (Exception $e) {
    echo  $e->getMessage() . "<br>";
}
