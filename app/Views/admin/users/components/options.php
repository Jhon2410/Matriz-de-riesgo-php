<?php
$pageTitle = 'Administrar usuarios';
ob_start();
$content = ob_get_clean();
?>
<!-- Contenido específico de la vista -->

<div class="container-fluid my-3 d-flex justify-content-end">
    <button id="crearBtn" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#crearModal">
        Crear Usuario
    </button>

    <div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del formulario -->
                    <form>
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreInput">
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="emailInput">
                        </div>
                        <!-- Agrega más campos de formulario según sea necesario -->
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