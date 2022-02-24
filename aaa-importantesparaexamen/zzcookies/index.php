<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Login </title>
    <style>
        body {
            margin-left: auto;
            margin-right: auto;
            text-align: center;


            background-color: lightgoldenrodyellow;


        }

        h1 {
            border-bottom: dashed 2px darkgoldenrod;
            padding: 10px;
        }

        form {
            font-size: 1.5em;
        }

        #login {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <main>
        <br>
        <!--FORMULARIO -->
        <p align="center">
        <h1> Acesso resultado pruebas </h1>
        <form action="./bienvenido.php" method="post">
            Usuario: <input type="text" name="usuario" placeholder="Introduzca su Usuario" required> <br>
            <input id="login" type="submit" name="enviar" value="LOGIN">
        </form>
        </p>
    </main>
</body>

</html>