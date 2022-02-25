<?php
$num = $_COOKIE["resultado"];
echo "El valor obtenido es $num";
setcookie('resultado', "", time() - 60);
exit();
