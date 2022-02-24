<?php
class Opositor{

    public function __construct()
    {
    }

    public function query_con_plaza($conec){
        $sql="SELECT * FROM resultados WHERE notap >= 5 and notat >=5";
        $r=$conec->query($sql);
        $result="";
        if(!$r===FALSE){
            while($fila=$r->fetch_array())
                $result.=$fila[0].';'.$fila[1].';'.$fila[2].'<br>;';
        }else{
            $result="Error. NO hay registros asociados.";
        }
        return($result);
    }  

    public function query_bolsa ($conec){
        $sql="SELECT * FROM resultados WHERE (notap >= 5 and notat < 5) or (notap < 5 and notat >= 5)";
        $r=$conec->query($sql);
        $result="";
        if(!$r===FALSE){
            while($fila=$r->fetch_array())
                $result.=$fila[0].';'.$fila[1].';'.$fila[2].'<br>;';
        }else{
            $result="Error. NO hay registros asociados.";
        }
        return($result);
    }

    public function query_no_aptos ($conec){
        $sql="SELECT  count(*) FROM resultados WHERE notap < 5 and notat < 5";
        $r=$conec->query($sql);
        $result=0;
        if(!$r===FALSE){
            $fila=$r->fetch_array();
            $result=$fila[0];
        }else{
            $result="Error. NO hay registros asociados.";
        }
        return($result);
    }

    public function query_insertar ($conec){
        $cod = ($_POST["cod_op"]);
        $nota1 = ($_POST["notap"]);
        $nota2 = ($_POST["notat"]);
        $sql="INSERT INTO resultados(cod_op,notap,notat) values ('$cod', '$nota1', '$nota2')";
        $r=$conec->query($sql);
        if(!$r===FALSE){
            echo "<p>Hecho ✓</p>";
        }else{
            $result="Error. No se ha podido insertar.";
        }
    }

    public function query_borrar ($conec){
        $cod = ($_POST["cod_op"]);
        $sql = $conec->prepare("DELETE * FROM resultados WHERE cod_op=?");
        $sql->bind_param("i", $cod);
        $result = "";
        if ($sql->execute()) {
            while ($sql->fetch()){
                $result .= "Hecho";
            }
        }
        return ($result);
        }
/*
        $sql="DELETE * FROM resultados WHERE cod_op=$cod";
        $r=$conec->query($sql);
        if(!$r===FALSE){
            echo "<p>Hecho ✓</p>";
        }else{
            $result="Error. No se ha podido insertar.";
        }
        
    }
*/

}
