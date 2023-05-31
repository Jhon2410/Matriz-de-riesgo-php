<?php
// app/Controllers/UsuarioController.php
require_once '../util/db.php';
class UsuarioController {
    public function eliminarUsuario($id) {
        // Verificar si se ha enviado el ID del usuario
        if (!empty($id)) {
            // Conectar a la base de datos
            $db = Database::getConnection();
            
            // Escapar el ID del usuario para evitar inyección de SQL
            $id = mysqli_real_escape_string($db, $id);
            
            // Construir la consulta SQL para eliminar el usuario
            $query = "DELETE FROM usuarios WHERE id = $id";
            
            // Ejecutar la consulta
            if (mysqli_query($db, $query)) {
                // Redirigir a la página de administración de usuarios con un mensaje de éxito
                header('Location: ../Views/admin/users/index.php?mensaje=Usuario eliminado correctamente.');
                exit;
            } else {
                // Redirigir a la página de administración de usuarios con un mensaje de error
                header('Location: ../Views/admin/users/index.php?error=Error al eliminar el usuario. Por favor, inténtalo de nuevo.');
                exit;
            }
        } else {
            // Redirigir a la página de administración de usuarios con un mensaje de error
            header('Location: ../Views/admin/users/index.php?error=ID de usuario inválido. Por favor, inténtalo de nuevo.');
            exit;
        }
    }
}

// Crear una instancia del controlador
$usuarioController = new UsuarioController();

// Verificar si se ha enviado el ID del usuario para eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $usuarioController->eliminarUsuario($id);
}
?>
