<?php
if (isset($_COOKIE["ciclo"])) {
    switch ($_COOKIE["ciclo"]) {
        case "Asir":
            header("location:Asir.php");
            break;
        case "Dam":
            header("location:Dam.php");
            break;
        case "Daw":
            header("location:Daw.php");
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
</head>

<body>
    <table>
        <caption>Ciclos</caption>
        <tr>
            <th>Asir</th>
            <td><a href="Asir.php">Acceso a Asir</a></td>
        </tr>
        <tr>
            <th>Dam</th>
            <td><a href="Dam.php">Acceso a Dam</a></td>
        </tr>
        <tr>
            <th>Daw</th>
            <td><a href="Daw.php">Acceso a Daw</a></td>
        </tr>
    </table>
</body>

</html>