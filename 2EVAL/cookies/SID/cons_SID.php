<?php
session_start();
require_once("./codigo_pag_580.php");
$_SESSION['nombre']="Ivan";
header('location:'.url('cons_SID2.php'));
?>