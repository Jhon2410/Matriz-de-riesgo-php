<!-- app/Views/dashboard.php -->
<?php
$pageTitle = 'Administrar usuarios';
$error = isset($_GET['error']) ? $_GET['error'] : null;
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : null;
ob_start();
$content = ob_get_clean();
require '../../../Controllers/ObtenerUsuariosController.php';
require '../../layouts/admin.php';
$isEdit = false;
?>

<!-- Contenido específico de la vista -->

<div class="container-fluid my-3">
    <h4>Administrar usuarios</h4>
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
    <?php require_once './components/options.php'; ?>

    <table id="miTabla" class="display custom-table table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Correo electrónico</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?php echo $user['id']; ?>
                    </td>
                    <td>
                        <?php echo $user['name']; ?>
                    </td>
                    <td>
                        <?php echo $user['email']; ?>
                    </td>
                    <td>
                        <?php echo $user['role']; ?>
                    </td>
                    <td>
                        <?php echo $user['status']; ?>
                    </td>
                    <td>
                        <form action="../../../Controllers/EliminarUsuarioController.php" method="POST"
                            style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                        <button class="btn btn-primary btn-sm" onclick='setUserToEdit(<?php echo json_encode($user); ?>)'
                            data-user-id="<?php echo $user['id']; ?>">
                            <i class="bi bi-pencil-fill"></i>
                        </button>



                        <button class="btn btn-primary btn-sm d-none" data-bs-toggle="modal" data-bs-target="#crearModal"
                            data-user-id="<?php echo $user['id']; ?>">
                            <i class="bi bi-pencil-fill"></i>
                        </button>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="./../../../../resources/js/script.js"></script>
    <script>
        const setUserToEdit = (user) => {
            if (!user) {
                return;
            }
            
            const userIdInput = document.getElementById('idInput');
            const nombreInput = document.getElementById('nombreInput');
            const emailInput = document.getElementById('emailInput');
            const contraseñaInput = document.getElementById('contraseñaInput');
            const rolSelect = document.getElementById('rolSelect');
            const estadoSelect = document.getElementById('estadoSelect');
            const formUser = document.getElementsByName('formUser');

            formUser[0].action = '../../../Controllers/ActualizarUsuariosController.php';
            userIdInput.value = user.id;
            nombreInput.value = user.name;
            emailInput.value = user.email;
            contraseñaInput.value = user.password;
            rolSelect.value = user.role;
            estadoSelect.value = user.status;

            $('#crearModal').modal('show');
        }

    </script>
</div>