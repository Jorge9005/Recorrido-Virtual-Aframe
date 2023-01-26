<?php 

require 'includes/config/database.php';
$db=conectarDB();  



//Creacion de header
    require 'includes/funciones.php';
    incluirTemplates('header' , $inicio=true);
?>


   

<?php 
//Creacion de footer
    incluirTemplates('footer');
?>