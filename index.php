<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\estilo.css">
    <link rel="stylesheet" href="assets\css\estilo1.css">
    <title>Login</title>
</head>
<body>
  <div class="login-page">
    <div>
      <p>
        <span>
          Recorrido Virtuaaaaal
        </span>
      </p>
    </div>
    <div class="form">
      <form action ="scriptDB.php" method="POST">
        <h1>Inicio de sesión</h1>
        <input type="text" placeholder="Nombre de usuario" name="h_user" required="required"/>
        <input type="password" placeholder="Ingresa tu contraseña" name="h_pass" required="required"/><br>
        <button name="btn_validar">Iniciar Sesión</button>
        <p class="message">¿No estás registrado? <a href="registro.php">Registrate aquí</a></p>
      </form>
    </div>
  </div>
  <script src="assets\js\components\js.js"></script>
</body>
</html>