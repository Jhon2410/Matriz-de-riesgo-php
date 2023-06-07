<?php
// app/Controllers/LogoutController.php

// Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir al formulario de inicio de sesión
header('Location: ../Views/login.php');
exit;

?>