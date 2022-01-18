<?php

include_once('./productos.inc');
$productos_carrito = explode('-', $_COOKIE['producto_selec']);
$total = 0;
$precio = 0;

for ($i = 0; $i < count($productos_carrito); $i++) {
    if ($i % 2 == 0) {
        foreach ($productos as $clave => $valor) {
           
            if ($productos_carrito[$i] == $clave) {
                
                $precio = (float)$valor[1];
                
            }
        }
    }else{
       $total +=  ($precio * (int)$productos_carrito[$i]);
    }
}

echo "El total de su compra es de ".$total."€";
setcookie('producto_selec',"",time()-1);
?>