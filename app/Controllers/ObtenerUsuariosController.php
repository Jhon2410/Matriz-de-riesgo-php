<?php
require_once '../../../util/db.php';
$conn = Database::getConnection();

// Realizar la consulta SQL para obtener los usuarios
$query = "SELECT * FROM usuarios";
$result = $conn->query($query);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los usuarios
    $users = [];

    // Recorrer los resultados y almacenar los usuarios en el array
    while ($row = $result->fetch_assoc()) {
        $user = [
            'id' => $row['id'],
            'name' => $row['nombre'],
            'email' => $row['email'],
            'role' => $row['tipo'],
            'status' => $row['estado']
        ];
        $users[] = $user;
    }

    // Liberar los resultados
    $result->free_result();
} else {
    // No se encontraron usuarios en la base de datos
    $users = [];
}

?>