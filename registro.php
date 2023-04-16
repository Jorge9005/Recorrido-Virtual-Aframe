<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="assets/js/components/registro.js"></script>
<script type="text/javascript" src="assets/js/components/jquery.js"></script>
<script src="assets/js/components/js.js"></script>
    <LINK REL=StyleSheet HREF="assets/css/estilo.css" TYPE="text/css" MEDIA=screen>
    <link rel="stylesheet" href="assets/css/estilo1.css" TYPE="text/css">
    <link rel="stylesheet" href="assets/css/test.css" type="text/css">


    
    <title>Login</title>
</head>

<body>
<div class="login-page">
<form action ="scriptDB.php" method="POST">
    
    <div class="login-page">
            <div class="form">
            <h1>Registro</h1>
         
            <input type="text" placeholder="escribe tu nombre" name="h_nameuser" required>
            <input type="email" placeholder="escribe tu e-mail" name="h_emailuser" required>
            <input type="password" placeholder="Escribe tu contraseña" name="h_passuser" onInput="pass()" required>
            <input type="password" placeholder="Confirmar contraseña" name="h_passuserbool" required onInput="passbool()">
            <h5 id="test" hidden>TextoTemporal</h5>
            <!--Fecha de registro automatico-->
            <input type="text" placeholder="Selecciona tu semestre" list="lista" name="h_lista" required><br>
            <button name="btn_continuar">Registrarse</button>
    </form>
        <datalist id="lista">
                <option value="Postgrado">
                <option value="No soy estudiante">
                <option value="Primero">
                <option value="Segundo">
                <option value="Tercero">
                <option value="Cuarto">
                <option value="Quinto">
                <option value="Sexto">
                <option value="Septimo">
                <option value="Octavo">
                <option value="Noveno">
                <option value="Decimo">
            </datalist>
            <p class="message">¿Ya tienes cuenta? <a href="index.php">Inicia sesión</a></p>
    </div>
    </div>
</div>
</body>
</html>