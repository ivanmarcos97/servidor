<?php
if (isset($_COOKIE["ncovid"])) {
    setcookie("ncovid", "", time() - 60);
    echo " vuelva a la pagina anterior y seleccione idioma";
} else
    echo "no existe la cookie";
