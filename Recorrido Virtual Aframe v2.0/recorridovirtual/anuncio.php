<?php

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

    $cliente = $_GET['usuario'];
    $cliente = filter_var($cliente, FILTER_VALIDATE_INT);

if (!$id&& !$cliente) {
    header('location: anuncios.php');
    
}



//Importar base de datos
require 'includes/config/database.php';
$db = conectarDB();

//Consultar Articulos por id
$query = "SELECT * FROM productos WHERE clave_Producto = ${id}";

//Obtener resultado
$resultado = mysqli_query($db, $query);
if(!$resultado->num_rows){
    header('location: anuncios.php');
    
}

$productos = mysqli_fetch_assoc($resultado);

// Fin de la consulta de articulos


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $query = "SELECT * FROM clientes WHERE id = ${cliente}";
    $resultadoCliente = mysqli_query($db, $query);

    
    
    $cliente = mysqli_fetch_assoc($resultadoCliente);


    $fecha = date('Y/m/d');
    $id_Cliente=$cliente['id'];
    $nombre_Cliente=$cliente['nombre_Cliente'];
    $clave = $productos['clave_Producto'];
    $nombre = $productos['nombre_Producto'];
    $precio = $productos['precio'];
    $imagen= $productos['imagen_Producto'];
    
    //Revisar que el arreglo este vacio

        /*SUBIDA DE ARCHIVOS*/


        //Insertar en la Base de Datos
        $query = " INSERT INTO pedidos(fecha_Pedido, id_Cliente, nombre_Cliente, clave_Producto, nombre_Producto, precio, imagen) VALUES 
        ( '$fecha', '$id_Cliente', '$nombre_Cliente', '$clave', '$nombre', '$precio', '$imagen') ";

 
    
        $insertar = mysqli_query($db,$query);
        //Eliminar articulo
        $query = "DELETE FROM productos WHERE clave_Producto = ${id}";
        
        $resultado = mysqli_query($db, $query);
        
        

        if($resultado){
            header("Location: pedidos.php?resultado=1&usuario=".$cliente['id']);
            
        }
        
        /*else{
            echo mysqli_error($db);
            echo "Insercion correcta";
        }*/
    
 
    
}






//Creacion de Header
    require 'includes/funciones.php';
    incluirTemplates('header');
?>
<!--Interfaz Anuncio-->
    <main class="contenedor seccion contenido-centrado"><!--Contenido Principal-->
        <h1><?php echo $productos['nombre_Producto']; ?></h1>

        <!--Imagen Principal-->
        <img loading="lazy" src="imagenes/<?php echo $productos['imagen_Producto']; ?>" alt="imagen de la propiedad">

        <!--Informacion sobre el anuncio-->
        <div class="resumen-propiedad">
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_talla.svg" alt="icono talla">
                    <p><?php echo $productos['talla']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_sale.svg" alt="icono Entrega">
                    <p><?php echo $productos['marca']; ?></p>
                </li>
            </ul>
            <p class="precio">$<?php echo $productos['precio']; ?></p>
            <p>
            <?php echo $productos['descripcion']; ?>
            </p>

            <form class="formulario" method="POST" >
                <input type="submit" value="Separar" class="boton-amarillo-block">
            </form>
        </div>
    </main>

<?php 

//Cerrar conexion
mysqli_close($db);

//Creacion de Footer
    incluirTemplates('footer');
?>