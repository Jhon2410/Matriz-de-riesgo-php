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
                    <h5 class="modal-title" id="crearModalLabel">Crear matriz de riesgo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del formulario -->
                    <form>
                    <div class="mb-3">
                            <label for="nombreInput" class="form-label">Fecha de identificación riesgo</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Código del riesgo</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Riesgo</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Definición y Descripción del riesgo</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Causas</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Riesgo afecta infraestructua crítica</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Activos de Información Asociados</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Tipo de activo vinculado</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Criticidad del activo</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Criticidad del activo</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Tipo de Riesgo</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Posibilidad de Ocurrencia</label>
                            <input type="email" class="form-control" id="emailInput">
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Impacto</label>
                            <input type="email" class="form-control" id="emailInput">
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Proceso correctivo</label>
                            <input type="email" class="form-control" id="emailInput">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    const crearModal = new bootstrap.Modal(document.getElementById('crearModal'));

    function openModal() {
        crearModal.show();
    }
</script>