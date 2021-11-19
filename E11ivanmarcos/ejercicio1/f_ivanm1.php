<?php

function ahorro($provincias){
    $ahorroA=0;
    $ahorroL=0;
    $ahorroO=0;
    $ahorroP=0;
    foreach($provincias as $nombre => $valor){
        if($nombre == "A coruña"){
            
                $ahorroA=$valor[0]-$valor[1];
            }
        }if($nombre == "Lugo"){
            
                $ahorroL=$valor[0]-$valor[1];
            }if($nombre == "Ourense"){
                
                    $ahorroO=$valor[0]-$valor[1];
                }if($nombre == "Pontevedra"){
                    
                        $ahorroP=$valor[0]-$valor[1];
                    }

    }


ahorro($provincias);
?>