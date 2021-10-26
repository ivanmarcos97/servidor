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
        $alumnos=array(array('m1',9,9),
                        array('m2',8,9),
                        array('m3',9.5,10),
                        array('m4',9,8),
                        array('m5',10,10));
    $media=0;
    $maxmedia=0;
    $maxmatricula="";

    for($i=0;$i<count($alumnos);$i++){
        $media=($alumnos[$i][1]+$alumnos[$i][2])/2;
        echo"{$alumnos[$i][0]} $media <br>";
        if($media>$maxmedia){
            $maxmedia=$media;
            $maxmatricula=$alumnos[$i][0];
        }  
    }
    echo "la media maxima es $maxmedia y corresponde con el alumno $maxmatricula <br></br>";
    ?>
</body>
</html>