<?php
// app/Controllers/MatrizController.php

require_once './../../util/db.php';

class MatrizController {
    public function crearMatriz($codigo) {
        // Verificar si se ha enviado el código de la matriz
        if (!empty($codigo)) {
            // Conectar a la base de datos
            $db = Database::getConnection();
            
            // Escapar el código de la matriz para evitar inyección de SQL
            $codigo = mysqli_real_escape_string($db, $codigo);
            
            // Construir la consulta SQL para crear la matriz
            $query = "INSERT INTO matriz_de_riesgo (codigo, fecha_creacion) VALUES ('$codigo', NOW())";
            
            // Ejecutar la consulta
            if (mysqli_query($db, $query)) {
                // Redirigir a la página de administración de matrices con un mensaje de éxito
                header('Location: ../../Views/admin/manage/index.php?mensaje=Matriz creada correctamente.');
                exit;
            } else {
                // Redirigir a la página de administración de matrices con un mensaje de error
                header('Location: ../../Views/admin/manage/index.php?error=Error al crear la matriz. Por favor, inténtalo de nuevo.');
                exit;
            }
        } else {
            // Redirigir a la página de administración de matrices con un mensaje de error
            header('Location: ../../Views/admin/manage/index.php?error=Falta el código de la matriz. Por favor, inténtalo de nuevo.');
            exit;
        }
    }
    
    public function actualizarMatriz($id, $codigo) {
        // Verificar si se ha enviado el ID y el código de la matriz
        if (!empty($id) && !empty($codigo)) {
            // Conectar a la base de datos
            $db = Database::getConnection();
            
            // Escapar el ID y el código de la matriz para evitar inyección de SQL
            $id = mysqli_real_escape_string($db, $id);
            $codigo = mysqli_real_escape_string($db, $codigo);
            
            // Construir la consulta SQL para actualizar la matriz
            $query = "UPDATE matriz_de_riesgo SET codigo = '$codigo' WHERE id = $id";
            
            // Ejecutar la consulta
            if (mysqli_query($db, $query)) {
                // Redirigir a la página de administración de matrices con un mensaje de éxito
                header('Location: ../../Views/admin/manage/index.php?mensaje=Matriz actualizada correctamente.');
                exit;
            } else {
                // Redirigir a la página de administración de matrices con un mensaje de error
                header('Location: ../../Views/admin/manage/index.php?error=Error al actualizar la matriz. Por favor, inténtalo de nuevo.');
                exit;
            }
        } else {
            // Redirigir a la página de administración de matrices con un mensaje de error
            header('Location: ../../Views/admin/manage/index.php?error=Faltan datos de la matriz. Por favor, inténtalo de nuevo.');
            exit;
        }
    }
    
    public function eliminarMatriz($id) {
        // Verificar si se ha enviado el ID de la matriz
        if (!empty($id)) {
            // Conectar a la base de datos
            $db = Database::getConnection();
            
            // Escapar el ID de la matriz para evitar inyección de SQL
            $id = mysqli_real_escape_string($db, $id);
            
            // Construir la consulta SQL para eliminar la matriz
            $query = "DELETE FROM matriz_de_riesgo WHERE id = $id";
            
            // Ejecutar la consulta
            if (mysqli_query($db, $query)) {
                // Redirigir a la página de administración de matrices con un mensaje de éxito
                header('Location: ../../Views/admin/manage/index.php?mensaje=Matriz eliminada correctamente.');
                exit;
            } else {
                // Redirigir a la página de administración de matrices con un mensaje de error
                header('Location: ../../Views/admin/manage/index.php?error=Error al eliminar la matriz. Por favor, inténtalo de nuevo.');
                exit;
            }
        } else {
            // Redirigir a la página de administración de matrices con un mensaje de error
            header('Location: ../../Views/admin/manage/index.php?error=Falta el ID de la matriz. Por favor, inténtalo de nuevo.');
            exit;
        }
    }
}

// Crear una instancia del controlador
$matrizController = new MatrizController();

// Verificar el action y realizar la operación correspondiente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        
        // Crear una nueva matriz
        if ($action === 'crear') {
            $codigo = $_POST['codigo'];
            $matrizController->crearMatriz($codigo);
        }
        
        // Actualizar una matriz existente
        if ($action === 'actualizar') {
            $id = $_POST['id'];
            $codigo = $_POST['codigo'];
            $matrizController->actualizarMatriz($id, $codigo);
        }
        
        // Eliminar una matriz
        if ($action === 'eliminar') {
            $id = $_POST['id'];
            $matrizController->eliminarMatriz($id);
        }
    }
}
?>
