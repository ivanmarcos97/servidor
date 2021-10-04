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
$centimos=12343;
$b100=0;
$b50=0;
$b20=0;
$b10=0;
$b5=0;
$m50=0;
$m20=0;
$m10=0;
$m5=0;
$m2=0;
$m1=0;
$r=$centimos;
if($centimos>=10000){
$b100=intval($centimos/10000);
$r=$centimos%10000;
}
if($r>=5000){
    $b50=intval($r/5000);
    $r=$r%5000;
}
if($r>=2000){
        $b20=intval($r/2000);
        $r=$r%2000;
}
if($r>=1000){
            $b10=intval($r/1000);
            $r=$r%1000;
        }
if($r>=500){
                $b5=intval($r/500);
                $r=$r%500;
            }
if($r>=50){
                    $m50=intval($r/50);
                    $r=$r%50;
                }
if($r>=20){
                        $m20=intval($r/20);
                        $r=$r%20;
                    }
if($r>=10){
                            $m10=intval($r/10);
                            $r=$r%10;
                        }
if($r>=5){
                                $m5=intval($r/5);
                                $r=$r%5;
                            }
if($r>=2){
                                    $m2=intval($r/2);
                                    $r=$r%2;
                                }
if($r>=1){
                                        $m1=intval($r/1);
                                        $r=$r%1;
                                        };
echo "Con los $centimos tienes:<br/>
 $b100 billetes de 100€ <br/>
 $b50 billetes de 50€ <br/>
 $b20 billetes de 20€ <br/>
 $b10 billetes de 10€ <br/>
 $b5 billetes de 5€ <br/>
 $m50 monedas de 50 céntimos <br/>
 $m20 monedas de 20 céntimos <br/>
 $m10 monedas de 10 céntimos <br/>
 $m5 monedas de 5 céntimos <br/>
 $m2 monedas de 2 céntimos <br/>
 $m1 monedas de 1 céntimos <br/>";
    ?>
</body>
</html>