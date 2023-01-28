<?php 
    require 'includes/funciones.php';
    //conexion Base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    $consulta =  "SELECT * FROM clientes";
    $resultado = mysqli_query($db, $consulta);
    //Arreglo con mensajes de errores
    $errores = [];
        $nombre = '';
        $telefono = '';
        $correo = '';
        $password = '';
    //Ejecutar el codigo despues de que se llena el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //echo"<pre>";
        //var_dump($_POST);
        //echo"</pre>";
        //echo"<pre>";
        //var_dump($_FILES);
        //echo"</pre>";

        $nombre = mysqli_real_escape_string($db, $_POST['nombre']) ;
        $telefono = mysqli_real_escape_string($db, $_POST['telefono']) ;
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $rol ="2";

        if(!$nombre){
            $errores[]='El nombre es obligatorio';
        }

        if(!$telefono){
            $errores[]='El telefono es obligatorio';
        }
        
        if(!$email){
            $errores[]='El email es obligatorio';
        }
        if(!$password){
            $errores[]='la contraseña es obligatoria';
        }
        //echo"<pre>";
        //var_dump($errores);
        //echo"</pre>";
        //Revisar que el arreglo este vacio
        if(empty($errores)){
            $consultaCorreo = "SELECT * FROM clientes WHERE correo = '$email'";
            $res = mysqli_query($db, $consultaCorreo);

            if(!$res->num_rows){
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);

                //Insertar en la Base de Datos
                $query = " INSERT INTO clientes(nombre_Cliente, telefono_Cliente, correo, password, tipo_Usuario) VALUES 
                ( '$nombre', '$telefono', '$email', '$passwordHash','$rol') ";
            
                $insertar = mysqli_query($db,$query);

                if($resultado){
                    echo'<script type="text/javascript"> alert("Registro Realizado Exitosamente")</script>';
                    $host = $_SERVER['HTTP_HOST'];
                    header("Location: login.php");
                }else{
                    echo mysqli_error($db);
                    echo "Registro NO exitoso";
                }
            } else {
                echo'<script type="text/javascript"> alert("No puede registrarse, el correo ya está dado de alta...")</script>';
            }
  
        } 
    }
    
    //Creacion del Haeder
    incluirTemplates('header');
?>


<!--Interfaz ___ -->
    <main class="contenedor seccion contenido-centrado">
        <!--Contenido Principal-->
        <h1>Registrate</h1>
        <a href="login.php" class="boton-amarillo">login</a>
        <a href="registrarse.php" class="boton-verde">Registrarse</a>
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach ?>

        <form class="formulario" method="POST" action="" enctype="multipart/form-data">
        <fieldset>
                <legend>Escribe Tus Datos </legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="nombre">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono" name="telefono">

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu email" id="email" name="email">

                <label for="paswword">Password</label>
                <input type="password" name="password" placeholder="Tu password" id="password" name="password">

            </fieldset>

            <input type="submit" value="Registrarse" class="boton boton-verde">
        </form>

    </main>


<?php 
//Creacion de Footer
    incluirTemplates('footer');
?>