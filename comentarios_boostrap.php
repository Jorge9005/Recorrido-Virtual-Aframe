<?php
include('verif.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Comentarios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Comentarios</h1>
        <form action="scriptDB.php" method="POST">
            <div class="form-group">
                <label for="comentario">Comentario:</label>
                <textarea class="form-control" id="comentario" name="comentario"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="btn_comentar">Enviar</button>
        </form>
        <br>
        <br>
        <?php
        echo 'Bienvenido, ' . $_SESSION['nombre_usuario'] . '!';
            /*Generando fecha INICIO*/
            $a = date("Y");
            $m = date("m");
            $d = date("d");
            $d = $d;

            $fecha = $a . "-" . $m . "-" . $d;
            $fechaux = $d . "-" . $m . "-" . $a;
            //echo"$fechaux";
            /*ALTER TABLE tabla AUTO_INCREMENT = 1;*/
            $address = "127.0.0.1";
            $user = "root";
            $pass = "";
            $database = "virtual-route";
            $mysqli = new mysqli("$address", "$user", "", "$database");

            // Consulta para obtener los comentarios
            $query = "SELECT * FROM comentarios";
            $resultado = $mysqli->query($query);

            // Crear la tabla HTML
            echo "<table class='table table-striped'>";
            echo "<thead>";
            echo "<tr><th>Fecha</th><th>Nombre de usuario</th><th>Comentario</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            echo '<a href="./index.html">Regresar</a>';

            // Recorrer los comentarios y mostrarlos en la tabla
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['fecha'] . "</td>";
                $pkuser = $row['pk-usuario'];
                $query2 = "SELECT * FROM user WHERE pkuser='$pkuser'";
                $resultado2 = $mysqli->query($query2);
                if ($row2 = $resultado2->fetch_assoc()) {
                    echo "<td>" . $row2['nameuser'] . "</td>";
                }
                echo "<td>" . $row['contenido'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        ?>
    </div>
</body>
</html>
