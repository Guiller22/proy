<?php
session_start();

?>
<!doctype html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Inicia sesión o registrate para disfrutar de los mejores juegos clásicos en esta página
        acompañada de un estilo retro para rememorar con nostalgia el pasado">
        <title>Inicio/Registro juegos retro</title>

        <link rel="preload" href="css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link rel="stylesheet" href="css/bootstrap.min.css">
        </noscript>
        <link rel="preload" href="css/output.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link rel="stylesheet" href="output.css">
        </noscript>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

    </head>


<body class="text-center">


    <h3 class="masthead-brand" id="monoton">Juegos retro</h3>

    </header>
    <form method="post" action="loginRegistro.php" class="form" id="loginForm">
        <div>
            <label for="usuario">Email/usuario</label>
            <input name="usuarioL" type="text" placeholder="usuario">
        </div>
        <div>
            <label for="contraseña">Contraseña</label>
            <input name="contraseña" type="password" placeholder="contraseña">
        </div>
        <div class="errorMsg"><?php if (isset($_SESSION['errorLogin'])) {
                                    echo $_SESSION['errorLogin'];
                                    unset($_SESSION['errorLogin']);
                                }
                                ?></div>
        <input id="registro" class="animated boton" type="submit" value="login" name="loginSubmit">

    </form>
    <form method="post" action="loginRegistro.php" class="form" id="registroForm">
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" autocomplete="off" placeholder="email" />
        </div>
        <div>
            <label for="usuario registro">Contraseña</label>
            <input type="password" name="contraseñaR" autocomplete="off" placeholder="contraseña" />
        </div>

        <div>
            <label for="usuario registro">Usuario</label>
            <input type="text" name="usuario" autocomplete="off" placeholder="usuario" />
        </div>
        <div class="errorMsg"><?php
                                if (isset($_SESSION['errorRegistro'])) {
                                    echo $_SESSION['errorRegistro'];
                                    unset($_SESSION['errorRegistro']);
                                }
                                ?></div>
        <input id="login" class="animated boton" type="submit" value="registro" name="registro">

    </form>
    </div>
</body>