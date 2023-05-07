<?php 
// Iniciar la sesión
session_start();
// Verificar si la variable de sesión existe
if (isset($_SESSION['nombre_usuario'])) {
    // Mostrar el nombre de usuario si la sesión está iniciada
    echo 'Bienvenido, ' . $_SESSION['nombre_usuario'] . '!';
} else {
    // Eliminar la variable de sesión del nombre de usuario
unset($_SESSION['nombre_usuario']);

// Destruir la sesión
session_destroy();
header('Location: index.php');
    exit;
}
?>
