<!-- app/Views/dashboard.php -->
<?php
$pageTitle = 'Administrar matrices de riesgo';
ob_start();
$content = ob_get_clean();
require '../../layouts/admin.php';
$matrices = [
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ]
];
$error = isset($_GET['error']) ? $_GET['error'] : null;
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : null;
$matriz_id = isset($_GET['matriz_id']) ? $_GET['matriz_id'] : null;
require '../../../Controllers/matriz/ObtenerRegistrosPorIdMatriz.php';
?>

<!-- Contenido específico de la vista -->
<div class="container-fluid my-3">
    <h4>Administrar los registros de las matrices de riesgo</h4>
    <?php require_once './components/modalRegsitro.php'; ?>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <?php if (isset($mensaje)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    <table id="miTabla" class="display custom-table table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha de Identificación</th>
                <th>Riesgo</th>
                <th>Definición y Descripción del Riesgo</th>
                <th>Causas</th>
                <th>Afecta Infraestructura Crítica</th>
                <th>Tipo de Riesgo</th>
                <th>Posibilidad de Ocurrencia</th>
                <th>Impacto</th>
                <th>Proceso Correctivo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $registro): ?>
                <tr>
                    <td><?php echo $registro['id'] ?></td>
                    <td><?php echo $registro['fecha_identificacion'] ?></td>
                    <td><?php echo $registro['riesgo'] ?></td>
                    <td><?php echo $registro['definicion_descripcion'] ?></td>
                    <td><?php echo $registro['causas'] ?></td>
                    <td><?php echo $registro['afecta_infraestructura_critica'] ?></td>
                    <td><?php echo $registro['tipo_riesgo'] ?></td>
                    <td><?php echo $registro['posibilidad_ocurrencia'] ?></td>
                    <td><?php echo $registro['impacto'] ?></td>
                    <td><?php echo $registro['proceso_correctivo'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm"
                            onclick='setRegistroToEdit(<?php echo json_encode($registro); ?>)'
                           >
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <form action="../../../Controllers/registros/RegistrosMatrizController.php?action=eliminar&matriz_id=<?php echo $matriz_id ?>"
                            method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="./../../../../resources/js/script.js"></script>

    <script>
        const setRegistroToEdit = (matriz) => {
            if (!matriz) {
                return;
            }

            const idInput = document.getElementById('idInput');
            const fechaInput = document.getElementById('fechaInput');
            const codigoRiesgoInput = document.getElementById('codigoRiesgoInput');
            const riesgoInput = document.getElementById('riesgoInput');
            const descripcionInput = document.getElementById('descripcionInput');
            const causasInput = document.getElementById('causasInput');
            const afectaInput = document.getElementById('afectaInput');
            const activosInput = document.getElementById('activosInput');
            const activoVinculadoInput = document.getElementById('activoVinculadoInput');
            const criticidadActivoInput = document.getElementById('criticidadActivoInput');
            const tipoRiesgoInput = document.getElementById('tipoRiesgoInput');
            const posibilidadInput = document.getElementById('posibilidadInput');
            const impactoInput = document.getElementById('impactoInput');
            const procesoInput = document.getElementById('procesoInput');

            const form = document.getElementsByName('form');
            form[0].action = '../../../Controllers/registros/RegistrosMatrizController.php?action=actualizar&matriz_id=' + <?php echo $matriz_id ?> + '';

            idInput.value = matriz.id;
            fechaInput.value = matriz.fecha_identificacion;
            riesgoInput.value = matriz.riesgo;
            descripcionInput.value = matriz.definicion_descripcion;
            causasInput.value = matriz.causas;
            afectaInput.value = matriz.afecta_infraestructura_critica;
            activosInput.value = matriz.activos_informacion_asociados;
            activoVinculadoInput.value = matriz.tipo_activo_vinculado;
            criticidadActivoInput.value = matriz.criticidad_activo;
            tipoRiesgoInput.value = matriz.tipo_riesgo;
            posibilidadInput.value = matriz.posibilidad_ocurrencia;
            impactoInput.value = matriz.impacto;
            procesoInput.value = matriz.proceso_correctivo;

            $('#crearModal').modal('show');
        }
    </script>
</div>
