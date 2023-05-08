<?php

function script()
{
    echo'
    <html>
    <head></head>
    <body></body>
    <script>
    alert("datos incorrectos o que no existen");
    window.location.href = "index.php";
    </script>
    </html>';
}
    /*Generando fecha INICIO*/
    $a= date("Y");
    $m= date("m");
    $d= date("d");
    $d = $d;

    $fecha= $a ."-". $m ."-". $d;
    $fechaux= $d ."-". $m ."-". $a;
    echo"$fechaux";
    /*ALTER TABLE tabla AUTO_INCREMENT = 1;*/
    $address = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "virtual-route";
    $mysqli = new mysqli("$address", "$user", "", "$database");

    if ($mysqli->connect_errno) 
    {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    else
    {
        echo "<br> Base de datos funciona <br>"; 
    }

    if(isset($_POST['btn_validar']))
{
    $p_user = $_POST['h_user'];
    $p_pass = $_POST['h_pass'];
    $consulta = mysqli_query ($mysqli, "SELECT * FROM user WHERE nameuser = '$p_user' AND passuser = '$p_pass'");

    if(!$consulta)
    {      
        echo mysqli_error($mysqli);
        exit;
    }

    if($user = mysqli_fetch_assoc($consulta)) 
    {
        // Iniciar la sesión
        session_start();

        // Crear una variable de sesión para el nombre de usuario
        $_SESSION['nombre_usuario'] = $p_user;

        echo "el usuario y la pwd son correctas <br>";
        header('Location: index.html');
    } 
    else 
    {
        script();
    }
}


    if (isset($_POST['btn_registrarse']))
    {
        header('Location: registro.php');
    }

    if (isset($_POST['btn_continuar']))
    {
        $p_name = $_POST['h_nameuser'];
        //validar
        $consulta = mysqli_query ($mysqli, "SELECT * FROM `user` WHERE `nameuser` = '$p_name'");
        if(!$consulta)
        {      
            echo mysqli_error($mysqli);
            exit;
        }

        $p_email = $_POST['h_emailuser'];
        $consulta_email = mysqli_query ($mysqli, "SELECT * FROM `user` WHERE `emailuser` = '$p_email'");
        if(!$consulta_email)
        {      
            echo mysqli_error($mysqli);
            exit;
        }

        if(!mysqli_fetch_assoc($consulta_email)) 
        {
        if(mysqli_fetch_assoc($consulta)) 
        {
            echo "<br> el usuario ya existe <br>";
        }
        else
        {
        $p_pass = $_POST['h_passuser'];
        $p_passbool = $_POST['h_passuserbool'];
        if ($p_passbool != $p_pass) {
            header('Location: alertregistro.php');
         } else {
            $p_nameuser= $_POST['h_nameuser'];
            $p_emailuser = $_POST['h_emailuser'];
            $p_passuser = $_POST['h_passuser'];
            $p_lista = $_POST['h_lista'];
            
            echo"$p_nameuser";
            echo'<br>';
            echo"$p_emailuser";
            echo'<br>';
            echo"$p_passuser";
            echo'<br>';
            echo"$p_lista";
            echo'<br>';
            echo"$fecha";
            echo'<br>';

            /*numero ID lista*/
            switch ($p_lista) 
            {
                case "Postgrado":
                    echo "$p_lista";
                    $p_listanumber = 1;
                    echo "$p_lista";
                    echo'<br>';
                    echo "$p_listanumber";
                    break;
                    case "No soy estudiante":
                        echo "$p_lista";
                        $p_listanumber = 3;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Primero":
                        echo "$p_lista";
                        $p_listanumber = 4;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Segundo":
                        echo "$p_lista";
                        $p_listanumber = 4;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Tercero":
                        echo "$p_lista";
                        $p_listanumber = 6;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Cuarto":
                        echo "$p_lista";
                        $p_listanumber = 7;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Quinto":
                        echo "$p_lista";
                        $p_listanumber = 8;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Sexto":
                        echo "$p_lista";
                        $p_listanumber = 9;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Septimo":
                        echo "$p_lista";
                        $p_listanumber = 10;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Octavo":
                        echo "$p_lista";
                        $p_listanumber = 11;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Noveno":
                        echo "$p_lista";
                        $p_listanumber = 12;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                    case "Decimo":
                        echo "$p_lista";
                        $p_listanumber = 13;
                        echo "$p_lista";
                        echo'<br>';
                        echo "$p_listanumber";
                    break;
                default:
                break;
            }

            echo"$p_listanumber";
            echo'<br>';


            $query = "INSERT INTO user (pkuser, fktype, nameuser, emailuser,date,fksemester,passuser) VALUES ('NULL', '2','$p_nameuser','$p_emailuser','$fecha','$p_listanumber','$p_passuser')";
            $mysqli->query($query);
            if($mysqli->connect_errno)
            {
                echo "No funciona query (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            else{
                echo"query";
                header('Location: index.php');
            }
        }
    }
}
else
{
    echo "EMAIL YA EXISTE";
}
}

    if (isset($_POST['btn_comentar'])) {
        session_start();
        $p_name = $_SESSION['nombre_usuario'];
        $p_cmmt = $_POST['comentario'];
    
        $consulta = mysqli_query($mysqli, "SELECT * FROM `user` WHERE `nameuser` = '$p_name'");
        if (!$consulta) {      
            echo mysqli_error($mysqli);
            exit;
        }
        if ($user = mysqli_fetch_assoc($consulta)) {
            $consulta2 = mysqli_query($mysqli, "SELECT `pkuser` FROM `user` WHERE `nameuser` = '$p_name'");
            if (!$consulta2) {
                echo mysqli_error($mysqli);
                exit;
            }
            if ($fila = mysqli_fetch_assoc($consulta2)) {
                $n = $fila['pkuser'];
                echo "<br> Insertando...<br>";
                $query = "INSERT INTO `comentarios` (`pk-comentar`, `pk-usuario`, `fecha`, `contenido`) VALUES (NULL, '$n', '$fecha', '$p_cmmt')";
                $mysqli->query($query);
                if ($mysqli->connect_errno) {
                    echo "<br> No funciona query (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                } else {
                    echo "<br> funciono query";
                }
            } else {
                echo "El usuario no fue encontrado";
            }
        } else {
            echo "El usuario no fue encontrado";
        }
    }
    
    ?>