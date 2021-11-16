<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //a
        $palabras = array('ivan','urban','saiz','maria');
        buscar($palabras, "an");
       // buscar($palabras);
        function buscar($array,$str="ma"){
            $contador=0;
            $ok=false;
            $n=func_num_args();
            for($i=0;$i<count($array); $i++){
                if(stripos($array[$i],$str) !== false){
                    $contador++;
                }
            }
            if($ok){
                  echo $str." esta ".$contador." veces.<br>";             
            }else{
                echo "ma esta ".$contador." veces.<br>";
            }
        }



        //b
        $var_func='funcion_clasica';
        $var_func($palabras);
        echo "<br>";
        $var_func($palabras,"n");


        //c


    ?>
</body>
</html>