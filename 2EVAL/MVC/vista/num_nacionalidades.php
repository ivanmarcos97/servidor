<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Número Nacionalizados
    </h1>

    <?php
    $nacionalidad = $_POST['nacionalidad'];
    if ($result == 1) {
        echo "Hay " . $result . " actor de nacionalidad $nacionalidad." . '<br>';
    } else {
        echo "Hay " . $result . " actores de nacionalidad $nacionalidad." . '<br>';
    }

    ?>
</body>

</html>