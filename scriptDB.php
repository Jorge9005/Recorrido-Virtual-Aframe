<?php
function conexion()
{
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
}

function reporteVentas() /*ESTA FUNCION NO SE USA*/  
{
    echo"ESTA FUNCION NO SE USA";
    $address = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "virtual-route";
    $mysqli = new mysqli("$address", "$user", "", "$database");
    /*if ($mysqli->connect_errno) 
    {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    else
    {
        echo "<br> Base de datos funciona <br>"; 
    }*/
    $query = "SELECT * FROM Consolidado";


echo '<table border="0" cellspacing="2" cellpadding="2"> 
    <tr> 
    <td> <font face="Arial">Value1</font> </td> 
    <td> <font face="Arial">Value2</font> </td> 
    <td> <font face="Arial">Value3</font> </td> 
    </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Producto/Servicio"];
        $field2name = $row["Cantidad"];
        $field3name = $row["Precio"];


        echo '<tr> 
        <td>'.$field1name.'</td> 
        <td>'.$field2name.'</td> 
        <td>'.$field3name.'</td> 
        </tr>';
    }
    $result->free();
} 
}

function reporteMateria() /*ESTA FUNCION NO SE USA*/  
{

    echo"ESTA FUNCION NO SE USA";
    $address = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "virtual-route";
    $mysqli = new mysqli("$address", "$user", "", "$database");
    /*if ($mysqli->connect_errno) 
    {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    else
    {
        echo "<br> Base de datos funciona <br>"; 
    }*/
    $query = "SELECT *
    FROM consolidado
    INNER JOIN productos
    ON consolidado.productoFK = productos.PKproductos;";
    

echo '<table border="0" cellspacing="2" cellpadding="2"> 
    <tr> 
    <td> <font face="Arial">Value1</font> </td> 
    <td> <font face="Arial">Value2</font> </td> 
    <td> <font face="Arial">Value3</font> </td> 
    </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ProductoServicio"];
        $field2name = $row["Cantidad"];
        $field3name = $row["Precio"];


        echo '<tr> 
        <td>'.$field1name.'</td> 
        <td>'.$field2name.'</td> 
        <td>'.$field3name.'</td> 
        </tr>';
    }
    $result->free();
} 
}

function login()
{
    if(isset($_POST['btn_validar']))
{
    $address = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "virtual-route";
    $mysqli = new mysqli("$address", "$user", "", "$database");

    //echo "<br> Pulsar boton <br>";
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
        echo "el usuario y la pwd son correctas <br>";
        header('Location: Main-Menu.php');
    } 
    else 
    {
        script();
    }
}
}


function rad() /*ESTA FUNCION NO SE USA*/  
{
    echo"ESTA FUNCION NO SE USA";
    $address = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "virtual-route";
    $mysqli = new mysqli("$address", "$user", "", "$database");

    for ($i=0; $i<5; $i++) {
        $d=rand(1,5);
        $f=rand(1,5);
        $g=rand(1,5);
        $h=rand(1,5);
        echo $d;
}
$query = "INSERT INTO movimientos (PKmovimiento, Tipo) VALUES ('NULL', 'o')";
$mysqli->query($query);

if($mysqli->connect_errno)
{
    echo "No funciona query (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{
    echo"query";
}
}

function gfecha()
{
    $a= date("Y");
    $m= date("m");
    $d= date("d");
    $d = $d-1;

    $fecha= $a ."-". $m ."-". $d;
    $fechaux= $d ."-". $m ."-". $a;
echo"fecha formato para el usuario: ";
echo "$fechaux";
echo"<br>";
echo"fecha formato para base de datos: ";
echo "$fecha";
echo"<br>";
echo"FAVOR DE COMUNICARSE AL SIGUIENTE CORREO PARA SOLICITAR ASISTENCIA: " ;
echo"<br>";
echo"ADMIN@GMAIL.COM" ;
}

function script()
{
    echo'<html>
    <head></head>
    <style>
    body{
        background-color: black;
        color: white;
    }
    </style>
    <body>
    <form action="scriptDB.php" method="POST">
    <input type="submit" value="regresar a login" name="bbb">
    <h2>Consola:</h2>
    <br>
    <p>login():</p>
    <p>Datos incorrectos o datos que no existen.</p>
    <p>gfecha():</p>
    ';
    gfecha();
    echo'</body> 
    </form>
    </html>';
}
/*RUN:*/
if (isset($_POST['btn_validar'])) {
    login();
    }

    if (isset($_POST['bb'])) {
        script();
    }

    if (isset($_POST['bbb'])) {
        header('Location: ../iniciar.php');
    }

    if (isset($_POST['btn_registrarse']))
    {
        header('Location: registro.php');
    }

    if (isset($_POST['btn_continuar']))
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
            /*Generando fecha INICIO*/
            $a= date("Y");
            $m= date("m");
            $d= date("d");
            $d = $d-1;
        
            $fecha= $a ."-". $m ."-". $d;
            $fechaux= $d ."-". $m ."-". $a;
            /*Generando fecha fin*/
            
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
            $address = "127.0.0.1";
            $user = "root";
            $pass = "";
            $database = "virtual-route";
            $mysqli = new mysqli("$address", "$user", "", "$database");

            $query = "INSERT INTO user (pkuser, fktype, nameuser, emailuser,date,fksemester,passuser) VALUES ('NULL', '2','$p_nameuser','$p_emailuser','$fecha','$p_listanumber','$p_passuser')";
            $mysqli->query($query);
            if($mysqli->connect_errno)
            {
                echo "No funciona query (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            else{
                echo"query";
                header('Location: ../iniciar.php');
            }
        }
    }
    ?>