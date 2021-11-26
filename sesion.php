<?php
if (!empty($_SESSION['uid'])) {
  $session_uid = $_SESSION['uid'];

  include('usuarios.php');
  $userClass = new usuarios();
}
if (!empty($_SESSION['tipo'])) {
  $tipo = $_SESSION['tipo'];
}

if (empty($session_uid)) {
  $url = 'login.php';
  header("Location: $url");
}
