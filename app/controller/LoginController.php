<?php
// app/Controllers/LoginController.php

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aquí puedes realizar la lógica de autenticación
    if ($username === 'admin' && $password === 'password') {
        // Redirigir al usuario a la página de inicio después de iniciar sesión exitosamente
        header('Location: home.php');
        exit;
    } else {
        $error = 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
    }
}

// Cargar la vista del formulario de inicio de sesión
require '../app/Views/login.php';
?>
