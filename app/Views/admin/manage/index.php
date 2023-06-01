<!-- app/Views/dashboard.php -->
<?php
$pageTitle = 'Administrar matrices de riesgo';
ob_start();
$content = ob_get_clean();
require '../../layouts/admin.php';
$error = isset($_GET['error']) ? $_GET['error'] : null;
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : null;
require '../../../Controllers/matriz/ObtenerMatrizController.php';
?>

<!-- Contenido específico de la vista -->
<div class="container-fluid my-3">

    <h4>Administrar matrices de riesgo</h4>
    <?php require_once './components/options.php'; ?>
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
                <th>Codigo de matriz de riesgo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matriz_de_riesgo as $matriz): ?>
                <tr>
                    <td>
                        <?php echo $matriz['id'] ?>
                    </td>
                    <td>
                        <?php echo $matriz['codigo'] ?>
                    </td>
                    <td> <button class="btn btn-primary btn-sm" onclick='setMatrizToEdit(<?php echo json_encode($matriz); ?>)'
                            data-user-id="<?php echo $matriz['id']; ?>">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                        <form action="../../../Controllers/matriz/MatrizController.php?action=eliminar" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $matriz['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                            
                        </form>
                        <a href="./registros.php?matriz_id=<?php echo $matriz['id'] ?>" class="btn btn-sm btn-info">
                                <i class="bi bi-plus-circle-fill"></i>
                            </a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="./../../../../resources/js/script.js"></script>
    <script>
        const setMatrizToEdit = (matriz) => {
            if (!matriz) {
                return;
            }
            
            const userIdInput = document.getElementById('idInput');
            const codigoInput = document.getElementById('codigoInput');
            const form = document.getElementsByName('form');

            form[0].action = '../../../Controllers/matriz/MatrizController.php?action=actualizar';

            userIdInput.value = matriz.id;
            codigoInput.value = matriz.codigo;

            $('#crearModal').modal('show');
        }

    </script>
</div>