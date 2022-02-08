<html>

<head></head>

<body>
    <?php

    $db_host = "localhost";
    $db_usuario = "root";
    $db_clave = "";
    $db_nombre = "obras_arte";

    $conexion = @mysqli_connect($db_host, $db_usuario, $db_clave);
    if (mysqli_connect_errno()) {
        echo "Fallo en la conexi&#243n <br>";
        exit();
    } else {
        echo "Conexi&#243n establecida <br>";
    }

    mysqli_select_db($conexion, $db_nombre) or die("No se encontro la base de datos");

    $deno = $_POST['texto_id'];
    $insertar = "insert into obras (deno,foto) values (?,?)";
    $stmt = mysqli_prepare($conexion, $insertar);
    mysqli_stmt_bind_param($stmt, 'ss', $deno, $nomf);
    mysqli_stmt_execute($stmt);

    $consulta = "select foto from obras";
    $resultados = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_array($resultados);
    $ruta_foto = $fila[0];
    echo $ruta_foto;
    mysqli_close($conexion);
    ?>
    <div>
        <img src="./uploads/<?php echo $ruta_foto; ?>" alt="Imagen obra de arte" width="25%">
    </div>
</body>

</html>