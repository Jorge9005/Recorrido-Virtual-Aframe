<?php 

    require '../includes/funciones.php';
    
    session_start();
    if(isset($_SESSION["usuario"])){
        if($_SESSION["login"] == 1){

        }else{
            header("Location: ../index.php");
        }
    }else{
        header("Location: anuncios.php");
    }

    //Importar conexion
    require '../includes/config/database.php';
    $db = conectarDB(); 

    //Escribir query
    $query = "SELECT * FROM pedidos";

    //Consultar base
    $resultadoConsulta = mysqli_query($db, $query);
    

    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;




    

    //Creacion de Header
    incluirTemplates('header');
?>
<!--Interfaz Nosotros-->
    <main class="contenedor seccion">
        <!--Contenido principal-->
        <h2>Administrador del recorrido</h2>


        <h3>Lista de Pedidos</h3>  

        <form class="formulario" action="../../recorridovirtual/admin/pedidos.php" method="GET">
            <input type="number" id="busqueda" name="busqueda" placeholder="Buscar ID Cliente">
            <input type="submit" value="Buscar" class="boton boton-verde">

        </form>
        <?php 
        $busqueda=" ";

        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $busqueda = mysqli_real_escape_string($db, $_GET['busqueda']) ;
            

            $query = "SELECT * FROM pedidos WHERE id_Cliente LIKE '%$busqueda%'";
            $consulta= mysqli_query($db, $query);
            //if (!mysqli_query($db, $query)) {
                //print_r(mysqli_error($db));
            //}
            
            
           
            
            //echo"<pre>";
            //var_dump($consulta);
            //echo"</pre>";
        }
        
        ?>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>Numero de Apartado</th>
                    <th>Fecha de Pedido</th>
                    <th>Cliente</th>
                    <th>ID Cliente</th>
                    <th>Imagen</th>
                    <th>Clave del Producto</th>
                    <th>Nombre del Producto</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody><!--Mostrar los resultados-->
            <?php if(($busqueda=="0")||($busqueda==" ")): ?>
                <?php while($pedido = mysqli_fetch_assoc($resultadoConsulta)):?>
                <tr>
                    <td><?php echo $pedido['numero_Apartado']; ?></td>
                    <td><?php echo $pedido['fecha_Pedido']; ?></td>
                    <td><?php echo $pedido['nombre_Cliente']; ?></td>
                    <td><?php echo $pedido['id_Cliente']; ?></td>
                    <td><img src="../imagenes/<?php echo $pedido['imagen']; ?>" class="imagen-tabla"></td>
                    <td><?php echo $pedido['clave_Producto']; ?></td>
                    <td><?php echo $pedido['nombre_Producto']; ?></td>
                    <td>$ <?php echo $pedido['precio']; ?></td>


                </tr>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php if(($busqueda!=="0")||($busqueda!==" ")): ?>
                <?php while($clientes = mysqli_fetch_assoc($consulta)):?>
                <tr>
                    <td><?php echo $clientes['numero_Apartado']; ?></td>
                    <td><?php echo $clientes['fecha_Pedido']; ?></td>
                    <td><?php echo $clientes['nombre_Cliente']; ?></td>
                    <td><?php echo $clientes['id_Cliente']; ?></td>
                    <td><img src="../imagenes/<?php echo $clientes['imagen']; ?>" class="imagen-tabla"></td>
                    <td><?php echo $clientes['clave_Producto']; ?></td>
                    <td><?php echo $clientes['nombre_Producto']; ?></td>
                    <td>$ <?php echo $clientes['precio']; ?></td>


                </tr>
                <?php endwhile; ?>
            <?php endif; ?>
            </tbody>
        </table>


       
    </main>
<?php 
    //Cerrar conexion
    mysqli_close($db);
//Creacion de Footer
    incluirTemplates('footer');
?>