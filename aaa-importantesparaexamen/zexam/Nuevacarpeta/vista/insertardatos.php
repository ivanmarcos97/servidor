<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            color: #318aac !important;
            font-size: 20px;
            font-weight: 500;
            padding: 0.5em 1.2em;
            background: rgba(0, 0, 0, 0);
            border: 2px solid;
            border-color: #318aac;
            transition: all 1s ease;
            position: relative;
        }

        input:hover {
            background: #318aac;
            color: #fff !important;
        }
    </style>
</head>

<body>


    <form action="../controlador/controlador_insert.php" method="post">
        codigo: <input type="number" name="cod_op">
        <br>
        nota p: <input type="text" name="notap">
        <br>
        nota t: <input type="number" name="notat">
        <br>

        <input type="submit" name="enviar">
    </form>



</body>

</html>