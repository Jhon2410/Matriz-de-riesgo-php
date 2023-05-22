<!-- app/Views/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Agrega los estilos CSS -->
  <link rel="stylesheet" href="../resources/css/styles.css">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form method="POST" action="../app/Controllers/LoginController.php">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $error; ?>
        </div>
      <?php endif; ?>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <!-- Agrega los scripts JS -->
  <script src="../resources/js/script.js"></script>
</body>
</html>
