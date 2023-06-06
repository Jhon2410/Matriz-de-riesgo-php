<?php
require_once '../../../util/db.php';
$conn = Database::getConnection();
$query = "SELECT * FROM matriz_de_riesgo ";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $matriz_de_riesgo = [];
    while ($row = $result->fetch_assoc()) {
        $query = "SELECT * FROM registros WHERE matriz_riesgo_id = " . $row['id'];
        $registros = $conn->query($query);
        $registros = $registros->fetch_all(MYSQLI_ASSOC);
        $matriz = [
            'id' => $row['id'],
            'codigo' => $row['codigo'],
            'registros' => $registros,
        ];
        $matriz_de_riesgo[] = $matriz;
    }
    $result->free_result();
} else {
    $matriz_de_riesgo = [];
}

?>