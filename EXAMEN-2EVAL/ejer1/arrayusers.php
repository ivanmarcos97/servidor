
<?php

$usuarios = array(
    'LUIS',
    'MARIA',
);
function acceso($u, $a)
{
    if ($u == $a[0] || $u == $a[1]) {
        return true;
    }
}
