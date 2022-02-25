<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: auto;
            border: 1px solid black;
            width: 30%;
            height: 100px;
            text-align: center;
        }

        input {
            background-color: lightblue;
            display: flex;
            margin: auto;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <p>Primer Script</p>
    <a href="Segunda.php"><input type="submit" value="Seguir"></a>

    <?php
    if (!isset($_COOKIE['resultado'])) {
        $num = rand(1, 100);

        setcookie('resultado', $num, time() + 60);
    } else {
        header("location: final.php");
    }

    ?>
</body>

</html>