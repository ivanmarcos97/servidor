<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>
<body>
    <?php
        function macarronico (&$f){
            $a_frase = explode(" ",$f);
            $f_macarronico="";
            for($cp=0;$cp<count($a_frase);$cp++){
                $palabraNueva="";
                for($i=1;$i<strlen($a_frase[$cp]);$i++){
                    $palabraNueva.=$a_frase[$cp][$i];
                }
                $palabraNueva.=$a_frase[$cp][0].'um ';
                $f_macarronico.=$palabraNueva;
            }
        return $f_macarronico;
        }
        $frase="una imagen vale más que mil palabras";
        echo $frase,"<br>";
        echo "En macarronico: <br>".macarronico($frase);
    ?>
</body>
</html>