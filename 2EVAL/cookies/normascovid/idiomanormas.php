<?php
if (isset($_COOKIE["ncovid"])) {
    switch ($_COOKIE["ncovid"]) {
        case "Español":
            header("location:Español.php");
            break;
        case "Frances":
            header("location:Frances.php");
            break;
        case "Ingles":
            header("location:Ingles.php");
            break;
        case "Catalan":
            header("location:Catalan.php");
            break;
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
        img {
            width: 20px;
        }

        th {
            text-align: left;
        }
    </style>
</head>

<body>
    <table>
        <caption>Idiomas</caption>
        <tr>
            <th><img src="./img/espa.jpg ">Español</th>
            <td><a href="Español.php"> Normas covid en Español</a></td>
        </tr>
        <tr>
            <th><img src="./img/fran.png ">Frances</th>
            <td><a href="Frances.php"> Normas covid en Frances</a></td>
        </tr>
        <tr>
            <th><img src="./img/ing.png ">Ingles</th>
            <td><a href="Ingles.php"> Normas covid en Ingles</a></td>
        </tr>
        <tr>
            <th><img src="./img/cata.png ">Catalan</th>
            <td><a href="Catalan.php"> Normas covid en catalan</a></td>
        </tr>
    </table>
</body>

</html>