<?php
$arr = array(
    'LUIS',
    'MARIA',
);
function acceso($arr, $usuario)
{
    if ($usuario == $arr[0] || $usuario == $arr[1]) {
        return true;
    } else {
        return false;
    }
}
