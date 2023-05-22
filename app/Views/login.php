<?php
$pageTitle = 'Login';
$error = isset($_GET['error']) ? $_GET['error'] : null;
ob_start();
?>
<div class="container">
  <h1 class="text-center w-100">Inicio se sesión</h1>
  <form method="POST" action="../Controllers/LoginController.php">
    <div class="form-group">
      <input type="email" class="form-control" id="email" name="email" placeholder="Correo electronico*" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña*" required>
    </div>
    <?php if (isset($error)): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
  </form>
</div>
<?php
$content = ob_get_clean();
require './layouts/layout.php';
?>