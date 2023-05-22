<?php
// app/Controllers/LoginController.php

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Aquí puedes realizar la lógica de autenticación
    if ($email === 'apxanderson02@gmail.com' && $password === 'a') {
        // Redirigir al usuario a la página de inicio después de iniciar sesión exitosamente
        header('Location: ../Views/admin/main.php');
        exit;
    } else {
        $error = 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
    }
}

// Cargar la vista del formulario de inicio de sesión
header('Location: ../Views/login.php?error=Credenciales no validas. Por favor, inténtalo de nuevo.');
?>
