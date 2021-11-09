
    <?php
    require_once("./alumno2.php");
    require_once("./primero.php");
    require_once("./segundo.php");

    $primero1 = new Primero("Iván", 23, 6.4);
    echo $primero1->supera_curso();
    $segundo1 = new Segundo("Iván", 24, 6.6, 7.8, "apto");
    echo $segundo1->supera_curso();
    ?>
