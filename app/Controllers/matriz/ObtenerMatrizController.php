<?php
require_once '../../../util/db.php';
$conn = Database::getConnection();
$query = "
    SELECT m.id, m.codigo, r.*
    FROM matriz_de_riesgo m
    LEFT JOIN registros r ON m.id = r.matriz_riesgo_id";
$result = $conn->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        $matriz_de_riesgo = [];
        while ($row = $result->fetch_assoc()) {
            $matrizIndex = array_search($row['id'], array_column($matriz_de_riesgo, 'id'));
            if ($matrizIndex !== false) {
                $matriz_de_riesgo[$matrizIndex]['registros'][] = $row;
            } else {
                $matriz = [
                    'id' => $row['id'],
                    'codigo' => $row['codigo'],
                    'registros' => [$row] 
                ];
                $matriz_de_riesgo[] = $matriz;
            }
        }
        $result->free_result();
    } else {
        $matriz_de_riesgo = [];
    }
} else {
    $matriz_de_riesgo = [];
}
?>
