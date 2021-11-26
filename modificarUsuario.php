<?php
include('config.php');
include('header.php');
$id = $_SESSION['uid'];
$consulta = ConsultarUser($id);
function ConsultarUser($id)
{
    $db = getDB();

    $sentencia = "SELECT * FROM usuarios WHERE uid='" . $id . "' ";
    $resultado = $db->query($sentencia) or die("Error al consultar usuario");
    $fila = $resultado->fetch(PDO::FETCH_ASSOC);
    return [
        $fila['uid'],
        $fila['usuario'],
        $fila['contraseña'],
        $fila['email'],
    ];
    
}
$error = '';
if (!empty($_POST['registro'])) {
    $usuario = trim($_POST['usuario']);
    $contraseña = trim($_POST['contrasenya']);
    $email = trim($_POST['email']);
    header("Location: modificarUser.php");


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = "Email no valido";
        header("Location: modificarUser.php");
    }
    if ($contraseña != "") {
        if (!(preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $contraseña))) {
            $_SESSION["error"] = "La contraseña no tiene 6 caracteres";
            header("Location: modificarUser.php");
        }
        $db = getDB();
        $contrasenya_cifrada = hash('sha256', $contraseña);
        $sentencia = "UPDATE usuarios SET usuario='" . $usuario . "', contraseña='" . $contrasenya_cifrada . "', email='" . $email . "' WHERE uid='" . $id . "' ";
        $db->query($sentencia) or die("Error al actualizar datos");
        $consulta = ConsultarUser($id);
        header("Location: modificarUser.php");

    } else {
        $db = getDB();
        $sentencia = "UPDATE usuarios SET usuario='" . $usuario . "', email='" . $email . "' WHERE uid='" . $id . "' ";
        $db->query($sentencia) or die("Error al actualizar datos");
        if (isset($_GET['id'])) {
            header("Location: modificarUser.php");
        } else {
            $consulta = ConsultarUser($id);
        }
    }




    $check_usuario = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $usuario);
    $check_email = preg_match('~^[a-zA-Z0-20._-]+@[a-zA-Z0-10._-]+\.([a-zA-Z]{2,4})$~i', $email);
    $check_contraseña = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $contraseña);


    if ($check_usuario && $check_email && $check_contraseña > 0) {
    }
}
