<?php
include('sesion.php');

$usuario = $userClass->usuarioDatos($session_uid);
$nombre = $usuario->usuario;
$tipo = $usuario->tipo_usuario;
if ($tipo == "admin") {
    echo "
    <head>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        </head>
            <div class='cover-container d-flex h-100 p-3 mx-auto flex-column'>
        <header>
            <h3 class='masthead-brand' id='monoton'>Juegos retro</h3>
            <nav class='contenedor nav nav-masthead justify-content-center'>
                <div class='menu' id='menu'>
                    <a class='nav-link' href='principal.php'>Home</a>
                    <a class='nav-link' href='puntos.php'>Clasificación</a>
                    <a class='nav-link' href='seleccion.php'>Seleccion</a>
                    <a class='nav-link' href='modificarUser.php'>Modificar usuario</a>
                    <a class='nav-link' href='admin.php'>Zona admin</a>
                    <a class='nav-link' href='logout.php'>Cerrar sesión</a>
                    <a href='javascript:void(0);' class='icon' onclick='menuDesplegable()'>
                        <i class='fa fa-bars'></i>
                    </a>
                </div>
            </nav>
        </header>";
} elseif ($tipo == "") {
    echo "
    <head>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        </head>
            <div class='cover-container d-flex h-100 p-3 mx-auto flex-column'>
        <header>
            <h3 class='masthead-brand' id='monoton'>Juegos retro</h3>
            <nav class='contenedor nav nav-masthead justify-content-center'>
                <div class='menu' id='menu'>
                    <a class='nav-link' href='principal.php'>Home</a>
                    <a class='nav-link' href='puntos.php'>Clasificación</a>
                    <a class='nav-link' href='seleccion.php'>Seleccion</a>
                    <a class='nav-link' href='modificarUser.php'>Modificar usuario</a>
                    <a class='nav-link' href='logout.php'>Cerrar sesión</a>
                    <a href='javascript:void(0);' class='icon' onclick='menuDesplegable()'>
                        <i class='fa fa-bars'></i>
                    </a>
                </div>
            </nav>
        </header>";
}
