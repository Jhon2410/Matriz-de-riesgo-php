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
                    <form action="../../../Controllers/RegistrarUsuariosController.php" method="POST">
                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreInput" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="emailInput" name="email" >
                        </div>
                        <div class="mb-3">
                            <label for="contraseñaInput" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contraseñaInput" name="contraseña" >
                        </div>
                        <div class="mb-3">
                            <label for="rolSelect" class="form-label">Rol</label>
                            <select class="form-select" id="rolSelect" name="rol" >
                                <option selected>Selecciona un rol</option>
                                <option value="administrador">Administrador</option>
                                <option value="empresa">Empresa</option>
                                <option value="gestor_empresa">Gestor empresa</option>
                                <option value="integrante_empresa">Integrante empresa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="estadoSelect" class="form-label">Estado</label>
                            <select class="form-select" id="estadoSelect" name="estado">
                                <option selected>Selecciona un estado</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
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
</div>

<script>
    const crearModal = new bootstrap.Modal(document.getElementById('crearModal'));

    function openModal() {
        crearModal.show();
    }
</script>