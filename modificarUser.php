<?php
include('config.php');
include('header.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modificar Usuario</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/script.js"></script>

</head>
<style>
    form {
        padding-top: 60px;
    }
</style>

<body class="text-center">
    <div class="centered">
        <br>
        <form action="modificarUsuario.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;" enctype="multipart/form-data">
            <label>Usuario: </label>
            <input type="text" id="usuario" name="usuario" value=""><br>

            <label>Contraseña: </label>
            <input type="password" id="contrasenya" name="contrasenya" value=""><br>

            <label>Email: </label>
            <input type="text" id="email" name="email" value=""> </input><br>
            <div class="errorMsg"><?php if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                    ?></div>
            <div id="botones">
                <input id="registro" type="submit" value="Modificar" name="registro" class="btn btn-dark">

                <a href="principal.php" class="btn btn-dark" id="botonVolver">Volver</a>
            </div>

        </form>
    </div>

    </div>
    </div>
    </div>
    <script>

    </script>

</html>