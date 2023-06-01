<?php
require_once '../util/db.php';

// app/Controllers/LoginController.php

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Establecer la conexión a la base de datos
    $conn = Database::getConnection();

    // Escapar los valores para evitar inyección de SQL
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Construir la consulta para verificar las credenciales
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND contraseña = '$password'";
    $result = $conn->query($query);

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($result->num_rows === 1) {
        // Valor que deseas guardar en la cookie
        $valor = $query;

        // Duración de la cookie en segundos (por ejemplo, 1 hora)
        $duracion = time() + 3600;

        // Configurar la cookie utilizando setcookie()
        setcookie("mi_cookie", $valor, $duracion, "/");
        // Redirigir al usuario a la página de inicio después de iniciar sesión exitosamente
        header('Location: ../Views/admin/home/main.php');
        exit;
    } else {
        $error = 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
        // Redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
        header('Location: ../Views/login.php?error=' . urlencode($error));
        exit;
    }
}

// Redirigir de vuelta al formulario de inicio de sesión si no se enviaron las credenciales
header('Location: ../Views/login.php');
?>