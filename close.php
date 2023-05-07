<?php 
session_start();
echo 'Bienvenido, ' . $_SESSION['nombre_usuario'] . '!';
// Eliminar la variable de sesión del nombre de usuario
unset($_SESSION['nombre_usuario']);

// Destruir la sesión
session_destroy();
echo 'Bienvenido, ' . $_SESSION['nombre_usuario'] . '!';
header('Location: index.php');
?>