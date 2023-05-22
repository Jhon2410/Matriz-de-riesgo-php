<!-- app/Views/dashboard.php -->
<?php
$pageTitle = 'Administrar usuarios';
ob_start();
$content = ob_get_clean();
require '../../layouts/admin.php';
$users = [
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
    [
        'name' => 'John Doe',
        'email' => 'asd'
    ],
];
?>

<!-- Contenido específico de la vista -->

<div class="container-fluid my-3">

    <h4>Administrar usuarios</h4>
    <?php require_once './components/options.php'; ?>

    <table id="miTabla" class="display custom-table table">
        <thead>
            <tr>
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
                    <td>John Doe</td>
                    <td>john.doe@example.com</td>
                    <td>Admin</td>
                    <td>Admin</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="./../../../../resources/js/script.js"></script>


</div>