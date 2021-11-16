<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Ej5 </title>
</head>
<body>
<h1><center>Ejercicio 5</center></h1>
<br>
<br>
<?php
	$matriz = array(
        array(2, 3, 5),
        array(1, 4, 7),
        array(0, 1, 6)
    );
    echo ("a)<br>");
//a  
    foreach($matriz as $fila){
        foreach($fila as $valor){
            echo $valor;
        }
        echo "<br>";
    }
    echo ("<br><br>b)<br>");
//b
    if($matriz[0][1]==$matriz[1][0] &&
       $matriz[0][2]==$matriz[2][0] &&
       $matriz[1][2]==$matriz[2][1]){
        echo "Es simetrico";
    }else{
        echo "No es simetrico <br><br>c)<br>";
    }
    echo ("<br><br>c)<br>");
//c
    $suma=[];
    foreach($matriz as $fila){
        $calculo = 0;
        foreach($fila as $valor){
            $calculo += $valor;
        } 
        $suma[] = $calculo;  
    }
    foreach($suma as $valor){
        echo $valor;
        echo "<br>";
    }
    echo ("<br><br>d)<br>");
//d
    $numero= 1;
    for($i = 0 ; $i < count($matriz) ; $i++){
        for($j = 0 ; $j < count($matriz[$i]) ; $j++){
            if($numero == $matriz[$i][$j]){
                echo "Posición: "."[$i]"."[$j]<br>";
            }
        } 
          
    }
?>
<br>
</html>