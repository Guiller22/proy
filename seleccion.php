<?php
include('config.php');
include('header.php');

$usuario = $userClass->usuarioDatos($session_uid);
$nombre = $usuario->usuario;
$tipo = $usuario->tipo_usuario;

$usuario = $userClass->usuarioDatos($session_uid);
$nombre = $usuario->usuario;
$db = getDB();
$fecha = date("Y-m-d");
$sentencia = $db->query("INSERT IGNORE INTO puntos(usuario, puntos1, fechaRecord)
SELECT '$nombre', '0' , '$fecha' WHERE NOT EXISTS(SELECT 1 FROM puntos WHERE usuario = '$nombre')");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Disfruta de los mejores juegos clásicos en esta página
  acompañada de un estilo retro para rememorar con nostalgia el pasado">
    <meta name="author" content="Guillermo">
    <title>Document</title>
</head>



<title>Inicio</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/output.css" rel="stylesheet">
<script src="js/script.js"></script>

</head>
<style>

</style>

<body class="text-center" id="fondo">

    <main role="main" class="inner cover">
        <div class="centered">
            <a href="tetris.php" id="imagenUrl"><img src="img/fondo.webp" alt="imagen ejemplo tetris" id="img"></a>
            <h4>Tetris</h4>
            <a href="principal.php" class="animated flash boton">Volver atrás</a>
        </div>


        </div>

        </div>

</body>

</html>