<?php 

require '../../includes/funciones.php';

    session_start();
    if (isset($_SESSION["usuario"])) {
        if ($_SESSION["login"] == 1) {
        } else {
            header("Location: ../index.php");
        }
    } else {
        header("Location: index.php");
    }

    //Validar la url por id valido
    $id=$_GET['id'];
    $id=filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: ../../admin/index.php');
    }

    //conexion Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB(); 

    //Obtener los datos del Articulo
    $consulta =  "SELECT * FROM articulos WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $articulos= mysqli_fetch_assoc($resultado);

    //Cosnulta de vendedores
    $consulta =  "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errores = [];

    $titulo = $articulos['titulo'];
    $precio = $articulos['precio'];
    $descripcion = $articulos['descripcion'];
    $talla = $articulos['talla'];
    $descuento = $articulos['descuento'];
    $entrega = $articulos['entrega'];
    $vendedorId = $articulos['vendedorId'];
    $imagenArticulo = $articulos['imagen'];

    //Ejecutar el codigo despues de que se llena el formulario
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo"<pre>";
        var_dump($_POST);
        echo"</pre>";

        
        //echo"<pre>";
        //var_dump($_FILES);
        //echo"</pre>";
     
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']) ;
        $precio = mysqli_real_escape_string($db, $_POST['precio']) ;
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $talla = mysqli_real_escape_string($db, $_POST['talla']);
        $descuento = mysqli_real_escape_string($db , $_POST['descuento']);
        $entrega = mysqli_real_escape_string($db, $_POST['entrega']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
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
            $errores[]='La descripcion es obligatoria y debe tener almenos 50 caracteres';
        }
        if(!$talla){
            $errores[]='El numero de habitaciones es Obligatorio';
        }
        if(!$descuento){
            $errores[]='El numero de baños es Obligatorio';
        }
        if(!$entrega){
            $errores[]='El numero de estacioanmientos es Obligatorio';
        }
        if(!$vendedorId){
            $errores[]='Elige un vendedor';
        }
        
        
        //echo"<pre>";
        //var_dump($errores);
        //echo"</pre>";
        
        //Revisar que el arreglo este vacio
        if(empty($errores)){
            //crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            } 
            $nombreImagen = '';

        //SUBIDA DE ARCHIVOS

        if ($imagen['name']) {
            //Eliminar imagen previa
            unlink($carpetaImagenes . $articulos['imagen']);

            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        }else{
            $nombreImagen = $articulos['imagen'];
        }
            

            //Insertar en la Base de Datos
            $query = " UPDATE articulos SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', 
            talla = '${talla}', descuento = ${descuento}, entrega = '${entrega}', vendedorId = ${vendedorId} WHERE 
            id = ${id}";

            /* echo $query; 
            exit;  */

        
            $insertar = mysqli_query($db,$query);

            if($resultado){
                header('Location: ../../admin/index.php?resultado=2');
            }
            /*else{
                echo mysqli_error($db);
                echo "Insercion correcta";
            }*/
        }
     
        
    }
    
    //Creacion del Haeder
    incluirTemplates('header');
?>

<!--Interfaz Admin Crear-->
    <main class="contenedor seccion"> <!--Main-->
        <h1>Actualizar Articulo</h1>

        <a href="../../admin/index.php" class="botno boton-verde">Volver</a><!--Boton volver-->

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach ?>

<!--Crear Formulario-->
        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Articulo" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Articulo" value="<?php echo $precio; ?>"">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/png, image/jpeg" name="imagen">

                <img src="../../imagenes/<?php echo $imagenArticulo ?>" class="imagen-small" >
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion" ><?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Informacion Articulo</legend>
                <label for="talla">Talla:</label>
                <input type="text" id="talla" name="talla" placeholder="Ej: S, M , L" value="<?php echo $talla; ?>"">

                <label for="descuento">Descuento:</label>
                <input type="number" id="descuento" name="descuento" placeholder="Ej: 90" min="1" max="99" value="<?php echo $descuento; ?>"">

                <label for="entrega">Entrega:</label>
                <input type="text" id="entrega" name="entrega" placeholder="Ej: Si , No"  value="<?php echo $entrega; ?>"">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor">
                    <option value="">--Selecione--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedorId == $vendedor['idVendedor'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['idVendedor']; ?>"> <?php echo $vendedor ['nombre'] . " " . $vendedor['apellidos']; ?></option>

                    <?php endwhile; ?>
                </select>
            </fieldset>
            <input type="submit" value="Actualizar Articulo" class="boton boton-verde">
        </form>
    </main>


<?php 
    //Creacion de Footer
    incluirTemplates('footer');
?>