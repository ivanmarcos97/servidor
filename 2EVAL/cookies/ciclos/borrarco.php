<?php
if (isset($_COOKIE["ciclo"])) {
    setcookie("ciclo", "", time() - 60);
    echo " cookie borrada";
} else
    echo "no existe la cookie";
