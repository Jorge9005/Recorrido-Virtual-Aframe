<!-- Comprobacion de inicio de sesión -->
<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth=$_SESSION['login'] ?? false;
    $cliente = $_SESSION['id'] ?? false;

?>
<!-- Si no se inicia sesion -->
<?php if(!$cliente){ ?>

<!--Header-->
<!DOCTYPE html>
<html lang="en">
<head><!--Informacion basica de HTML5-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recorrido Virtual</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <!--Cabecera de la pagina web-->
    <header class="header <?php echo $inicio ? 'inicio' :'';?>">
    <!--Barra con el contenido del header-->
        <div class="contenedor contenido-header">
            <div class="barra">
                <!--Logotipo
                <img class="logo" src="../../../recorridovirtual/build/img/loogo.svg">
                -->
                <a href="../../../recorridovirtual/anuncios.php">
                    
                </a>
                <!--Modo Oscuro-->
                <div class="mobile-menu">
                    <img src="../../../recorridovirtual/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <!--Navegacion Header-->
                <div class="derecha">
                    <img src="../../../recorridovirtual/build/img/dark-mode.svg" class="dark-mode-boton">
                    <nav class="navegacion">
                        <?php if($auth == 2): ?>
                            <a href="../../../recorridovirtual/cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif; ?>
                        <?php if($auth == 1): ?>
                            <a href="../../../recorridovirtual/admin/index.php">Admin</a>
                            <a href="../../../recorridovirtual/cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif; ?>
                        <?php if($auth==null): ?>
                            <a href="../../../recorridovirtual/login.php">login</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div><!--Cierre de .barra-->

            <?php echo $inicio ? '<h1>AQUÍ DEBE IR EL RECORRIDO VIRTUAL</h1>' : '' ?>
        </div>
    </header>
<!-- Si se inicia sesion -->
    <?php } else{ ?> 

<!--Header-->
<!DOCTYPE html>
<html lang="en">
<head><!--Informacion basica de HTML5-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recorrido Virtual</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <!--Cabecera de la pagina web-->
    <header class="header <?php echo $inicio ? 'inicio' :'';?>">
    <!--Barra con el contenido del header-->
        <div class="contenedor contenido-header">
            <div class="barra">
                <!--Logotipo -->
                <?php if ($auth == 2) : ?>
                        <a href="../../../recorridovirtual/anuncios.php?usuario=<?php echo $_SESSION['id']; ?>">
                        
                        </a>
                    <?php endif; ?>
                    <?php if ($auth == 1) : ?>
                        <a href="../../../recorridovirtual/admin/index.php">
                            <img class="logo" src="../../../recorridovirtual/build/img/loogo.svg">
                        </a>
                    <?php endif; ?>
                    <?php if ($auth == null) : ?>
                        <a href="../../../recorridovirtual/anuncios.php">
                            <img class="logo" src="../../../recorridovirtual/build/img/loogo.svg">
                        </a>
                    <?php endif; ?>
                <!--Modo Oscuro-->
                <div class="mobile-menu">
                    <img src="../../../recorridovirtual/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <!--Navegacion Header-->
                <div class="derecha">
                    <img src="../../../recorridovirtual/build/img/dark-mode.svg" class="dark-mode-boton">
                    <nav class="navegacion">
                       
                        <?php if($auth == 2): ?>
                            
                            <a href="../../../recorridovirtual/cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif; ?>
                        
                        <?php if($auth == 1): ?>
                            <a href="../../../recorridovirtual/admin/index.php">Admin</a>
                            <a href="../../../recorridovirtual/cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif; ?>
                        <?php if($auth==null): ?>
                            <a href="../../../recorridovirtual/login.php">login</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div><!--Cierre de .barra-->

            <?php echo $inicio ? '<h1>AQUÍ DEBE IR EL RECORRIDO VIRTUAL</h1>' : '' ?>
        </div>
    </header>
        <?php }?>