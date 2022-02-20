<?php
if (isset($_COOKIE['usuarios'])) {
    $usuario = "";
    $acess = "";
    $usu = explode(";", $_COOKIE["usuarios"]);
    foreach ($usu as $user) {
        $u = explode(",", $user);
        echo "Bienvenido : " . $u[0] . "<br>";
        echo "Acesso: " . $u[1];
        $u1 = $u[0];
        $u2 = $u[1];
    }
    $usuarioautorizado = $u1 . "," . $u2 . ";";
    setcookie('usuariosautorizados', $usuarioautorizado, time() + 60);
} else {
    $usuario = "";
    $acess = "";
    $usu = explode(";", $_COOKIE["usuariosautorizados"]);
    foreach ($usu as $user) {
        $u = explode(",", $user);
        echo "Bienvenido de nuevo : " . $u[0] . "<br>";
        echo "Acesso: " . $u[1];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin-left: auto;
            margin-right: auto;
            text-align: center;


            background-color: lightgoldenrodyellow;


        }

        table {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
            border-collapse: collapse;


        }

        td {
            border: 6px solid black;
            padding: 3px;
            font-size: 50px;

            background-color: lightcyan;
        }

        a {
            font-size: 2em;
            background-color: lightblue;
            border: 3px dotted black;
            border-radius: 10px;
            padding: 5px;
            text-decoration: none;
            color: black;

        }

        a:hover {
            border: 4px solid blue;
            background-color: lightcyan;
            position: relative;
            width: 5.5rem;
            height: 5.5rem;
            margin: 1rem;
            border-radius: 20%;
        }

        h1 {
            font-family: cursive;
            font-style: italic;
        }
    </style>
</head>

<body>

</body>

</html>