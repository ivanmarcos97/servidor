
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
        $m=array(0=>array(2,3,5),
        1=>array(3,5,7),
        2=>array(5,5,6));
        $sime=false;
        for($i=0;$i<count($m);$i++){
            for($j=0;$j<count($m[$i]);$j++){
            echo $m[$i][$j]." ";
            if(($m[0][1])==($m[1][0])&&
                ($m[0][2])==($m[2][0])&&
                ($m[1][2])==($m[2][1])){
                    $texto="Es una matriz simetrica"; 
            }else{$texto="";}
            
        }
        echo "<br/>";
            }
            echo $texto;
        
        foreach($m as $fila){
            $sumfila=0;
            foreach($fila as $componente){
            $sumfila+=$componente;}
            $vectorfilas[]=$sumfila;}
            for ($x=0;$x<count($vectorfilas);$x++){
                echo $vectorfilas[$x]," ";
            }
        
    
    ?>
</body>
</html>