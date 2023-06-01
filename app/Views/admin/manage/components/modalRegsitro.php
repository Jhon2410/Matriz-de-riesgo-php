<?php
$pageTitle = 'Administrar usuarios';
ob_start();
$content = ob_get_clean();
?>
<!-- Contenido específico de la vista -->

<div class="container-fluid my-3 d-flex justify-content-end">
    <button id="crearBtn" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#crearModal">
        Crear matriz
    </button>

    <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear registro a la matriz de riesgo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form name="form" action="./../../../Controllers/registros/RegistrosMatrizController.php?action=crear&matriz_id=<?php echo $_GET['matriz_id']; ?>"
                    method="POST">

                    <div class="modal-body">
                        <!-- Contenido del formulario -->
                        <div class="mb-3 d-none">
                            <label for="idInput" class="form-label">id</label>
                            <input type="text" class="form-control" id="idInput" name="id">
                        </div>
                        <div class="mb-3">
                            <label for="codigoInput" class="form-label">Código de matriz de riesgo</label>
                            <input type="text" class="form-control" name="codigo" id="codigoInput">
                        </div>
                        <div class="mb-3">
                            <label for="fechaInput" class="form-label">Fecha de identificación de riesgo</label>
                            <input type="date" class="form-control" name="fecha_identificacion" id="fechaInput">
                        </div>
                        <div class="mb-3">
                            <label for="codigoRiesgoInput" class="form-label">Código del riesgo</label>
                            <input type="text" class="form-control" name="codigo_riesgo" id="codigoRiesgoInput">
                        </div>
                        <div class="mb-3">
                            <label for="riesgoInput" class="form-label">Riesgo</label>
                            <input type="text" class="form-control" name="riesgo" id="riesgoInput">
                        </div>
                        <div class="mb-3">
                            <label for="descripcionInput" class="form-label">Definición y Descripción del riesgo</label>
                            <textarea class="form-control" name="definicion_descripcion"
                                id="descripcionInput"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="causasInput" class="form-label">Causas</label>
                            <textarea class="form-control" name="causas" id="causasInput"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="afectaInput" class="form-label">Riesgo afecta infraestructura crítica</label>
                            <select class="form-control" name="afecta_infraestructura_critica" id="afectaInput">
                                <option value="Sí">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="activosInput" class="form-label">Activos de Información Asociados</label>
                            <textarea class="form-control" name="activos_informacion_asociados"
                                id="activosInput"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="activoVinculadoInput" class="form-label">Tipo de activo vinculado</label>
                            <input type="text" class="form-control" name="tipo_activo_vinculado"
                                id="activoVinculadoInput">
                        </div>
                        <div class="mb-3">
                            <label for="criticidadActivoInput" class="form-label">Criticidad del activo</label>
                            <input type="text" class="form-control" name="criticidad_activo" id="criticidadActivoInput">
                        </div>
                        <div class="mb-3">
                            <label for="tipoRiesgoInput" class="form-label">Tipo de Riesgo</label>
                            <input type="text" class="form-control" name="tipo_riesgo" id="tipoRiesgoInput">
                        </div>
                        <div class="mb-3">
                            <label for="posibilidadInput" class="form-label">Posibilidad de Ocurrencia</label>
                            <select class="form-control" name="posibilidad_ocurrencia" id="posibilidadInput">
                                <option value="Muy baja">Muy baja</option>
                                <option value="Baja">Baja</option>
                                <option value="Media">Media</option>
                                <option value="Alta">Alta</option>
                                <option value="Muy alta">Muy alta</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="impactoInput" class="form-label">Impacto</label>
                            <select class="form-control" name="impacto" id="impactoInput">
                                <option value="Muy bajo">Muy bajo</option>
                                <option value="Bajo">Bajo</option>
                                <option value="Medio">Medio</option>
                                <option value="Alto">Alto</option>
                                <option value="Muy alto">Muy alto</option>
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label for="procesoInput" class="form-label">Proceso correctivo</label>
                            <input type="text" class="form-control" name="proceso_correctivo" id="procesoInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<script>
    const crearModal = new bootstrap.Modal(document.getElementById('crearModal'));
    const crearBtn = document.getElementById('crearBtn');
    const form = document.getElementsByName('form');

    crearBtn.addEventListener('click', function () {
        form[0].action = '../../../Controllers/registros/RegistrosMatrizController.php?action=crear&matriz_id=<?php echo $_GET['matriz_id']; ?>
    });
    function openModal() {
        crearModal.show();
    }
</script>