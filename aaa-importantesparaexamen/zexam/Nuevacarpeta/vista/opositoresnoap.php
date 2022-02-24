<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>opositores no aptos.
    </h1>
    <?php
    for ($i = 0; $i < count($datos); $i++) {
        if ($i % 3 == 0) {
            echo '<br>' . $datos[$i];
        } else {
            echo '|' . $datos[$i];
        }
    }
    ?>
</body>

</html>