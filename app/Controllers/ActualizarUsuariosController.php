<?php
// app/Controllers/UsuarioController.php

require_once '../util/db.php';

class UsuarioController {
    public function actualizarUsuario($id, $nombre, $email, $tipo, $estado) {
        // Verificar si se ha enviado el ID y los datos del usuario
        if (!empty($id) && !empty($nombre) && !empty($email)) {
            // Conectar a la base de datos
            $db = Database::getConnection();
            
            // Escapar los datos del usuario para evitar inyección de SQL
            $id = mysqli_real_escape_string($db, $id);
            $nombre = mysqli_real_escape_string($db, $nombre);
            $email = mysqli_real_escape_string($db, $email);
            
            // Construir la consulta SQL para actualizar el usuario
            $query = "UPDATE usuarios SET nombre = '$nombre', email = '$email' WHERE id = $id";
            
            // Ejecutar la consulta
            if (mysqli_query($db, $query)) {
                // Redirigir a la página de administración de usuarios con un mensaje de éxito
                header('Location: ../Views/admin/users/index.php?mensaje=Usuario actualizado correctamente.');
                exit;
            } else {
                // Redirigir a la página de administración de usuarios con un mensaje de error
                header('Location: ../Views/admin/users/index.php?error=Error al actualizar el usuario. Por favor, inténtalo de nuevo.');
                exit;
            }
        } else {
            // Redirigir a la página de administración de usuarios con un mensaje de error
            header('Location: ../Views/admin/users/index.php?error=Faltan datos del usuario. Por favor, inténtalo de nuevo.');
            exit;
        }
    }
}

// Crear una instancia del controlador
$usuarioController = new UsuarioController();

// Verificar si se ha enviado el ID y los datos del usuario para actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['email'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    $usuarioController->actualizarUsuario($id, $nombre, $email, $tipo, $estado);
}
?>
