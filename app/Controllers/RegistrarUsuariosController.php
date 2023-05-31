<?php
require_once '../util/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contraseña']) && isset($_POST['rol']) && isset($_POST['estado'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];

    // Establecer la conexión a la base de datos
    $conn = Database::getConnection();

    // Escapar los valores para evitar inyección de SQL
    $nombre = $conn->real_escape_string($nombre);
    $email = $conn->real_escape_string($email);
    $contraseña = $conn->real_escape_string($contraseña);
    $rol = $conn->real_escape_string($rol);
    $estado = $conn->real_escape_string($estado);

    // Construir la consulta para insertar el nuevo usuario en la base de datos
    $query = "INSERT INTO usuarios (nombre, email, contraseña, tipo, estado) VALUES ('$nombre', '$email', '$contraseña', '$rol', '$estado')";

    // Ejecutar la consulta
    if ($conn->query($query) === TRUE) {
        // Redirigir a la página de éxito o mostrar un mensaje de éxito
        header('Location: ../Views/admin/users/index.php?mensaje=Usuario creado exitosamente');
        exit;
    } else {
        // Redirigir a la página de error o mostrar un mensaje de error
        header('Location: ../Views/admin/users/index.php?error=Error al crear el usuario');
        exit;
    }
}

// Redirigir de vuelta al formulario si no se enviaron los datos correctamente
header('Location: ../Views/admin/home/main.php');
exit;
?>
