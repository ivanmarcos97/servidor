<?php
function calculadora()
{
    if (isset($_POST['enviar'])) {
        $r = 0;
        $signo = $_POST['operador'];
        $op1 = $_POST['ope1'];
        $op2 = $_POST['ope2'];
        switch ($signo) {
            case '+':
                $r = $op1 + $op2;
                validarnum($r);
                break;
            case '-':
                $r = $op1 - $op2;
                break;
            case '*':
                $r = $op1 * $op2;
                break;
            case '/':
                $r = $op1 / $op2;
                break;
        }
        return "el resultado es: " . $r;
    }
}
function contiene()
{
    if (isset($_POST['enviar'])) {
        $str = $_POST['frase'];
        $char = $_POST['caracter'];
        $esta = false;
        if (strpos($str, $char)) {
            return $char . "<br> está en<br> " . $str;
            exit;
        } else {
            return $char . " no está en " . $str;
            exit;
        }
    }
}

function login()
{
    if (isset($_POST['enviar'])) {
        if ($_POST['usu'] == "admin" && $_POST['pass'] == "mjuan") {
            return "Bienvenido";
            exit;
        } else {
            return "Error";
        }
    }
}
function validarnum($num)
{

    $options = array(
        'options' => array(
            'min_range' => 0,
            'max_range' => 100,
        )
    );
    if (filter_var($num, FILTER_VALIDATE_INT, $options) == FALSE) {
        echo "Este entero no es válido (entre 0 y 100).\n";
    }
}
