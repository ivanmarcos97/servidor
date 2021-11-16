    <?php
    $letra = array("T","R","W","A","G","M",
                    "Y","F","P","D","X","B",
                    "N","J","Z","S","Q","V",
                    "H","L","C","K","E");
    $dni="71483694";
    $num=(int)$dni;
    $operacion1=(int)($num/23);
    $operacion2=$operacion1*23;
    $operacion3=$num-$operacion2;
    $dni.=$letra[$operacion3];
    echo $dni;
    ?>