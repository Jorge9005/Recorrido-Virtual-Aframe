<?php 
    require 'includes/config/database.php';
    $db=conectarDB(); 
    $id=$_GET['usuario'];
    $id=filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: anuncios.php');
    }
    //Consultar
    $limiteb = 2;
    $query = "SELECT * FROM blog LIMIT ${limiteb}";
    //Obtener resultado blog
    $resultadob = mysqli_query($db, $query); 
    //Consultar
    $limite = 500;
    $query = "SELECT * FROM productos LIMIT ${limite}";
    //Obtener resultado
    $resultado = mysqli_query($db, $query);
    $query = "SELECT * FROM clientes WHERE id = ${id}";
    $resultadoConsulta = mysqli_query($db, $query);
    $usuario= mysqli_fetch_assoc($resultadoConsulta);
    //Creacion de Header
    require 'includes/funciones.php';//busca el archivo
    incluirTemplates('header', $inicio=true);//incluye el template
?>
        
       
    <section class="seccion contenedor">
        <h2>Ropa en Venta</h2>
        <?php     
            include 'includes/templates/anuncio.php';
        ?>
        <div class="alinear-derecha">
            <a href="anuncios.php?usuario=<?php echo $_SESSION['id']; ?>" class="boton-verde">Ver Todo</a>
        </div>
    </section>

    

<?php 
    //Cerrar Conexion
    mysqli_close($db);
    incluirTemplates('footer');
?>