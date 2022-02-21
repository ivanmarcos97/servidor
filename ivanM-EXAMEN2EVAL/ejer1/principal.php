<?php
if (isset($_COOKIE['luis']) || (isset($_COOKIE['maria']))) {

    if (isset($_COOKIE['luis'])) {

        $usu = explode(",", $_COOKIE["luis"]);
        if ($usu[1] == 0) {
            echo "Bienvenido : " . $usu[0] . "<br>";
        } else {
            echo "Bienvenido de nuevo : " . $usu[0] . "<br>";
            echo "Acesso : " . $usu[1] . "<br>";
        }


        $usuarioautorizado = $usu[0] . "," . $usu[1] . ";";
        setcookie('luis', $usuarioautorizado, time() + 60);
    } else if (isset($_COOKIE['maria'])) {
        $usu = explode(",", $_COOKIE["maria"]);
        if ($usu[1] == 0) {
            echo "Bienvenido : " . $usu[0] . "<br>";
        } else {
            echo "Bienvenido de nuevo : " . $usu[0] . "<br>";
            echo "Acesso : " . $usu[1] . "<br>";
        }
        $usuarioautorizado = $usu[0] . "," . $usu[1] . ";";
        setcookie('maria', $usuarioautorizado, time() + 60);
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