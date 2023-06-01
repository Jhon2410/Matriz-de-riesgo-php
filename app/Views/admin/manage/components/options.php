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
                <form name="form" action="../../../Controllers/matriz/MatrizController.php?action=crear"
                    method="POST">
                    <div class="mb-3 d-none">
                        <label for="idInput" class="form-label">id</label>
                        <input type="text" class="form-control" id="idInput" name="id">
                    </div>
                    <div class="modal-body">
                        <!-- Contenido del formulario -->
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Codigo matriz de riesgo</label>
                            <input type="text" class="form-control" name="codigo" id="codigoInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="reset" id="btnReset" class="btn btn-secondary" data-bs-dismiss="modal">limpiar</button>
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
        document.getElementById('btnReset').click();
        form[0].action = '../../../Controllers/matriz/MatrizController.php?action=crear';
    });
    function openModal() {
        crearModal.show();
    }
</script>