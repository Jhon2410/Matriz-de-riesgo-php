<!-- app/Views/layouts/admin-layout.php -->
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // El usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
      header('Location: ../../login.php');
      exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $pageTitle; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../../../../resources/css/styles.css">
    <link rel="stylesheet" href="./../../../../resources/css/theme.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="bg-primary d-flex text-primary" style="color: purple">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
            aria-controls="staticBackdrop">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <span class="text-white h6 w-25 mt-2">Matriz de riesgo</span>
        <span class="dropdown w-75 text-end">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="bi bi-person-circle"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../../../Controllers/Logout.php">Salir</a></li>
            </ul>
        </span>
    </div>



    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
        aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">Matriz de riesgo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="../home/main.php" class="menu-link">
                <i class="bi bi-grid-fill me-2"></i>
                <span>Matriz de riesgo</span>
            </a>
            <a href="../manage/index.php" class="menu-link">
                <i class="bi bi-kanban-fill"></i>
                <span>Administrar matrices de riesgo</span>
            </a>
            <a href="../users/index.php" class="menu-link">
                <i class="bi bi-people-fill me-2"></i>
                <span>Administrar usuarios</span>
            </a>
            <a href="../info/index.php" class="menu-link">
            <i class="bi bi-info-square-fill"></i>
                <span>Información</span>
            </a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>

</html>