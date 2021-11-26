<?php
session_start();
include("config.php");
include("usuarios.php");
$session_uid = $_SESSION['uid'] ? $_SESSION["uid"] : '';
if (isset($session_uid)) {
    $url = 'principal.php';
    header("Location: " . $url);
}

if (isset($_SESSION['tipo'])) {
    switch ($_SESSION['tipo']) {
        case 1:
            header('location: admin.php');
            break;
        case 2:
            header('location: principal.php');
            break;
        default:
    }
}
$userClass = new usuarios();
$errorRegistro = '';
$errorLogin = '';
if (!empty($_POST['loginSubmit'])) {
    $usuarioL = $_POST['usuarioL'];
    $contraseñaL = $_POST['contraseña'];
    if (strlen(trim($usuarioL)) > 1 && strlen(trim($contraseñaL)) > 1) {
        $uid = $userClass->login($usuarioL, $contraseñaL);
        if ($uid) {

            $url = 'principal.php';
            header("Location: " . $url);
        } else {
            $_SESSION["errorLogin"] = "El login ha fallado";
            header("Location: login.php");
        }
    }
}

if (!empty($_POST['registro'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseñaR'];
    $email = $_POST['email'];



    $check_usuario = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $usuario);
    $check_email = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
    $check_contraseña = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $contraseña);
    if (!(preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email))) {
        $_SESSION["errorRegistro"] = "El email no es válido";
        header("Location: login.php");
    }
    if (!(preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $contraseña))) {
        $_SESSION["errorRegistro"] = "La contraseña no cumple los parametros";
        header("Location: login.php");
    }
    if ($check_usuario && $check_email && $check_contraseña > 0) {
        $uid = $userClass->registro($usuario, $contraseña, $email);
        if ($uid) {
            $url = BASE_URL . 'principal.php';
            header("Location: $url"); // Page redirecting to home.php 
        } else {
            $_SESSION["errorRegistro"]  = "Usuario ya existe";
            header("Location: login.php");
        }
    }
}
