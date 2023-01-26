<?php 
//Importar conexion
require '../includes/config/database.php';
$db = conectarDB(); 

    require '../includes/funciones.php';
        session_start();
    if(isset($_SESSION["usuario"])){
        if($_SESSION["login"] == 1){

        }else{
            header("Location: /RecorridoVirtualAframe/index.html");
        }
    }else{
        header("Location: anuncios.php");
    }
    //Escribir query
    $query = "SELECT * FROM productos";
    //Consultar base
    $resultadoConsulta = mysqli_query($db, $query);
    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    

    $errores = [];

        $titulo = '';
        $precio = '';
        $descripcion = '';
        $talla = '';
        $marca = '';
        $imagen= '';

    //Ejecutar el codigo despues de que se llena el formulario
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //echo"<pre>";
        //var_dump($_POST);
        //echo"</pre>";

        //echo"<pre>";
        //var_dump($_FILES);
        //echo"</pre>";
     
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']) ;
        $precio = mysqli_real_escape_string($db, $_POST['precio']) ;
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $talla = mysqli_real_escape_string($db, $_POST['talla']);
        $marca = mysqli_real_escape_string($db , $_POST['marca']);
        $creado = date('Y/m/d');

        //Asignar archivoas a una variable
        $imagen = $_FILES['imagen'];

        

        if(!$titulo){
            $errores[]='Debes añadir un titulo';
        }

        if(!$precio){
            $errores[]='El precio es Obligatorio';
        }
        if(strlen($descripcion)<10){
            $errores[]='La descripcion es obligatoria y debe tener almenos 10 caracteres';
        }
        if(!$talla){
            $errores[]='La talla es Obligatoria';
        }
        if(!$marca){
            $errores[]='La marca es obligatoria';
        }
        if(!$imagen['name']){
            $errores[]='La imagen es obligatoria';
        }
        
        //echo"<pre>";
        //var_dump($errores);
        //echo"</pre>";
        
        //Revisar que el arreglo este vacio
        if(empty($errores)){
 
            /*SUBIDA DE ARCHIVOS*/
            $carpetaImagenes = '../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


            //Insertar en la Base de Datos
            $query = " INSERT INTO productos(nombre_Producto, imagen_Producto, marca, talla, descripcion, precio, fechaCreacion) VALUES 
            ( '$titulo', '$nombreImagen', '$marca', '$talla','$descripcion', '$precio', '$creado') ";
        
            $insertar = mysqli_query($db,$query);

            if($insertar){
                header('Location: ../admin/index.php?resultado=1');
            }
        

            
           
               /* header('Location: ../../admin/index.php?resultado=1');
            /*else{
                echo mysqli_error($db);
                echo "Insercion correcta";
            }*/
    }
    
}


    //Creacion de Header
    incluirTemplates('header');
?>
<!--Interfaz Admin-->
<div class="contenedor seccion seccion-inferior">
<main class="contenedor seccion"><!--Contenido principal-->
<h1>Administrador del Recorrido</h1>

<h3>Gestionar Productos</h3>

        <?php if(intval($resultado) === 1):?>
            <p class="alerta exito">Producto Publicado Correctamente</p>
        <?php endif ?>

        <!--Boton de enlace a crear.php para crear propiedades-->
        <br>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                </tr>
            </thead>

            <tbody><!--Mostrar los resultados-->
                <?php while($productos = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td><?php echo $productos['clave_Producto']; ?></td>
                    <td><?php echo $productos['nombre_Producto']; ?></td>
                    <td><img src="../imagenes/<?php echo $productos['imagen_Producto']; ?>" class="imagen-tabla" class="imagen-tabla"></td>
                    <td>$ <?php echo $productos['precio']; ?></td>
                    
                </tr>
                <?php endwhile; ?>
            </tbody>
        
        </table>


    </main>
        <section class="testimoniales contenedor">
<br><br><br><br><br><br><br><br><br><br><br>
<?php foreach($errores as $error): ?>
<div class="alerta error">
    <?php echo $error; ?>
</div>
<?php endforeach ?>

<!--Crear Formulario-->
<form class="formulario" method="POST" action="../../recorridovirtual/admin/index.php" enctype="multipart/form-data">
    <fieldset>
        <legend>Informacion General</legend>

        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo Articulo" value="<?php echo $titulo; ?>">

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" placeholder="Precio Articulo" value="<?php echo $precio; ?>"">

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" accept="image/png, image/jpeg" name="imagen">

        <label for="descripcion">Descripcion</label>
        <textarea id="descripcion" name="descripcion" ><?php echo $descripcion; ?></textarea>

    </fieldset>

    <fieldset>
        <legend>Informacion Articulo</legend>
        <label for="talla">Talla:</label>
        <input type="text" id="talla" name="talla" placeholder="Ej: S, M , L" value="<?php echo $talla; ?>"">

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" placeholder="Ej: GAP" value="<?php echo $marca; ?>"">

        
    </fieldset>

    <input type="submit" value="Crear Articulo" class="boton boton-verde">
</form>



            </div>
        </section>
    </div>




<?php 
    //Cerrar conexion
    mysqli_close($db);
//Creacion de Footer
    incluirTemplates('footer');
?>