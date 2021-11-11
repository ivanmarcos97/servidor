<?php
function calcu()
{
    if (isset($_POST['enviar'])) {
        $r = 0;
        $signo = $_POST['operador'];
        $op1 = $_POST['ope1'];
        $op2 = $_POST['ope2'];
        switch ($signo) {
            case '+':
                $r = $op1 + $op2;
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
