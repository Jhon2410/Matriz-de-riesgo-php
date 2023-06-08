<?php
require_once '../util/db.php';

// Iniciar la sesión
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Establecer la conexión a la base de datos
    $conn = Database::getConnection();

    // Escapar los valores para evitar inyección de SQL
    $email = $conn->real_escape_string($email);

    // Construir la consulta para obtener el hash de contraseña del usuario
    $query = "SELECT contraseña, tipo FROM usuarios WHERE email = '$email' AND estado = 'activo'";
    $result = $conn->query($query);

    // Verificar si se encontró un usuario con el correo proporcionado
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['contraseña'];

        // Verificar la contraseña utilizando password_verify()
        if (password_verify($password, $hashedPassword)) {
            // Guardar el estado de inicio de sesión en la sesión
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['tipo'] = $row['tipo'];

            // Redirigir al usuario a la página de inicio después de iniciar sesión exitosamente
            header('Location: ../Views/admin/home/main.php');
            exit;
        }
    }

    // Si las credenciales son inválidas o el usuario está inactivo, redirigir al formulario de inicio de sesión con un mensaje de error
    $error = 'Credenciales inválidas o usuario inactivo. Por favor, inténtalo de nuevo.';
    header('Location: ../Views/login.php?error=' . urlencode($error));
    exit;
}

// Redirigir de vuelta al formulario de inicio de sesión si no se enviaron las credenciales
header('Location: ../Views/login.php');
?>
