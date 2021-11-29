<?php

$usuario = $userClass->usuarioDatos($session_uid);
$nombre = $usuario->usuario;
$tipo = $usuario->tipo_usuario;

$usuario = $userClass->usuarioDatos($session_uid);
$nombre = $usuario->usuario;
$db = getDB();
$fecha = date("Y-m-d");
$sentencia = $db->query("INSERT IGNORE INTO puntos (`usuario`,`puntos1`,`fechaRecord`)
VALUES ('$nombre',0,'$fecha')");
?>