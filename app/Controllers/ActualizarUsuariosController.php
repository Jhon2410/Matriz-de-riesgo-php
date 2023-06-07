<?php
// app/Controllers/UsuarioController.php

require_once '../util/db.php';

class UsuarioController
{
    public function actualizarUsuario($id, $nombre, $email, $tipo, $estado, $password)
    {
        // Verificar si se ha enviado el ID y los datos del usuario
        if (!empty($id) && !empty($nombre) && !empty($email) && !empty($tipo) && !empty($estado)) {
            // Conectar a la base de datos
            $db = Database::getConnection();

            // Escapar los datos del usuario para evitar inyección de SQL
            $id = mysqli_real_escape_string($db, $id);
            $nombre = mysqli_real_escape_string($db, $nombre);
            $email = mysqli_real_escape_string($db, $email);

            // Verificar si se proporcionó una nueva contraseña
            if (!empty($password)) {
                // Obtener el hash de la contraseña almacenada en la base de datos
                $query = "SELECT contraseña FROM usuarios WHERE id = $id";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_assoc($result);
                $storedPasswordHash = $row['contraseña'];

                // Verificar si la contraseña proporcionada es diferente al hash almacenado
                if (!password_verify($password, $storedPasswordHash)) {
                    // Generar el hash de la nueva contraseña
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    // Agregar la columna de contraseña en la consulta SQL
                    $query = "UPDATE usuarios SET nombre = '$nombre', email = '$email', contraseña = '$hashedPassword', tipo = '$tipo', estado = '$estado' WHERE id = $id";
                } else {
                    // Redirigir a la página de administración de usuarios con un mensaje de error
                    header('Location: ../Views/admin/users/index.php?error=La contraseña proporcionada no es válida. Por favor, inténtalo de nuevo.');
                    exit;
                }

            } else {
                // Construir la consulta SQL para actualizar el usuario sin cambiar la contraseña
                $query = "UPDATE usuarios SET nombre = '$nombre', email = '$email', tipo = '$tipo', estado = '$estado' WHERE id = $id";
            }

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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['tipo']) && isset($_POST['estado'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['contraseña'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    $usuarioController->actualizarUsuario($id, $nombre, $email, $tipo, $estado, $password);
    echo 'Usuario actualizado correctamente';
}
?>