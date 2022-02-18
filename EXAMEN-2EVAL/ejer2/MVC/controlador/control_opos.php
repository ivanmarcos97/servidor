<?php

require_once("../modelo/model_class_opos.php");
require_once("../vista/insertaropo.php");
$opo = new Opo();
$opo->query_insertar($c, $_POST["cod_op"], $_POST["notap"], $_POST["notat"]);
