<?php
require_once '../../../util/db.php';
$conn = Database::getConnection();
$query = "SELECT * FROM matriz_de_riesgo";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $matriz_de_riesgo = [];
    while ($row = $result->fetch_assoc()) {
        $matriz = [
            'id' => $row['id'],
            'codigo' => $row['codigo'],
        ];
        $matriz_de_riesgo[] = $matriz;
    }
    $result->free_result();
} else {
    $matriz_de_riesgo = [];
}

?>