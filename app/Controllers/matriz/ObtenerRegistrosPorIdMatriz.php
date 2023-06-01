<?php

require_once '../../../util/db.php';
$conn = Database::getConnection();

$query = "SELECT * FROM registros WHERE matriz_riesgo_id = $matriz_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $registros = [];
    while ($row = $result->fetch_assoc()) {
        $registro = [
            'id' => $row['id'],
            'fecha_identificacion' => $row['fecha_identificacion'],
            'riesgo' => $row['riesgo'],
            'definicion_descripcion' => $row['definicion_descripcion'],
            'causas' => $row['causas'],
            'afecta_infraestructura_critica' => $row['afecta_infraestructura_critica'],
            'activos_informacion_asociados' => $row['activos_informacion_asociados'],
            'tipo_activo_vinculado' => $row['tipo_activo_vinculado'],
            'criticidad_activo' => $row['criticidad_activo'],
            'tipo_riesgo' => $row['tipo_riesgo'],
            'posibilidad_ocurrencia' => $row['posibilidad_ocurrencia'],
            'impacto' => $row['impacto'],
            'proceso_correctivo' => $row['proceso_correctivo'],
            'matriz_riesgo_id' => $row['matriz_riesgo_id'],
        ];
        $registros[] = $registro;
    }
    $result->free_result();
} else {
    $registros = [];
}

?>
