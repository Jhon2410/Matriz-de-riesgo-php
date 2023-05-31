<!-- app/Views/dashboard.php -->
<?php
$pageTitle = 'Administrar matrices de riesgo';
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

<h4>Administrar matrices de riesgo</h4>
    <?php require_once './components/options.php'; ?>

    <table id="miTabla" class="display custom-table table">
        <thead>
            <tr>
                <th>Codigo de riesgo</th>
                <th>Riesgo</th>
                <th>Definición y Descripción del riesgo</th>
                <th>Zona de riesgo</th>
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
                        <button type="button" class="btn btn-sm btn-info">
                            <i class="bi bi-plus-circle-fill"></i>
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