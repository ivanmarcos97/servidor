<?php
session_start();
if($_SESSION["numero"]%2==0 && $_POST["palabra"]=="Navidad" && strlen($_POST["palabra"])){
    echo "PREMIO";
}else{
    echo "Lo sentimos , otra vez sera";
}
