<?php 
    require 'includes/config/database.php';
    $db = conectarDB();
    //Autenticar el usuario
    $errores = [];
    $resultado = $_GET['resultado'] ?? null;
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email=mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password= mysqli_real_escape_string($db, $_POST['password']);
        if(!$email){
            $errores[]="El email es Obligatorio o no es correcto";
        }
        if(!$password){
            $errores[]="La contraseña es obligatoria";
        }
        if(empty($errores)){
            //Revisar existencia  
            $query= "SELECT * FROM clientes WHERE Correo= '${email}'";
            $resultado= mysqli_query($db, $query);
            /*echo"<pre>";
            var_dump($query);
            echo"</pre>";*/ 
            //var_dump($resultado);
            if( $resultado->num_rows){
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
                
                $auth= password_verify($password, $usuario['password']);
                
                if($auth){
                    //El usuario es correcto
                    session_start();
                    //Llenar el arreglo de la sesion 
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nombre'] = $usuario['nombre_Cliente'];
                    $_SESSION['usuario'] = $usuario['correo'];
                    $_SESSION['login'] = $usuario['tipo_Usuario']; 
                    

                    header('location: admin/index.php');                   
                }else{
                    $errores[]="La contraseñaes incorrecto";
                }
            }else{
                $errores[]="El Email o la contraseña son incorrectos, verifiquelos";
            } 
        }
    }
//Creacion de Header 
    require 'includes/funciones.php';
    incluirTemplates('header');
?>

<!--Interfaz ___ -->
    <main class="contenedor seccion contenido-centrado">
        <!--Contenido Principal-->
        <h1>Iniciar Sesión</h1>
        <a href="login.php" class="boton-verde">login</a>
        <a href="registrarse.php" class="boton-amarillo">Registrarse</a>

       <!-- <?php if(intval($resultado) == 1):?>
            <p class="alerta exito">Cliente Registrado Correctamente</p>
        <?php endif ?> -->

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach ?>
        <form method="POST" action="" class="formulario">
        <fieldset>
                <legend>Emial y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu email" id="email" >

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Tu Contraseña" id="password" >
            </fieldset>
            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>


<?php 
//Creacion de Footer
    incluirTemplates('footer');
?>