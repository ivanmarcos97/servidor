<?php
class Libro
{
    private $tit;
    private $pre;
    private $fecha;
    function __construct($tit, $pre, $fecha)
    {
        $this->tit = $tit;
        $this->pre = $pre;
        $this->fecha = $fecha;
    }
    function calculodescuento()
    {
        $descuento =0;
        if( $this->fecha=="nav"){
$descuento=15;
        }else{
            $descuento=25;
        }
        
        return  $descuento ;
    }
    function condescuento($descuento){
        $preciocondescuento=$this->pre-($this->pre*$descuento/100);
        echo "el titulo es ".$this->fecha." y el precio con descuento es $preciocondescuento";
    }
}
