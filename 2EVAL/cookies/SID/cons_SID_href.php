<?php
session_start();
require_once("./codigo_pag_580.php");
$_SESSION['nombre']="Ivan";
?>
<a href="<?=url('cons_SID2_href.php')?>">Pagina2</a>;