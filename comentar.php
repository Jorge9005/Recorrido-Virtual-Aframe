<?php
include('verif.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Comentarios</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body>
    <h1>Comentarios</h1>
    <form action="scriptDB.php" method="POST">
      <label for="comentario">Comentario:</label><br>
      <textarea id="comentario" name="comentario"></textarea><br><br>
      <button type="submit" name="btn_comentar">Enviar</button>
    </form>
    <a href="./index.html">Regresar</a>

    <?php
    session_start();
    echo 'Bienvenido, ' . $_SESSION['nombre_usuario'] . '!';
/*Generando fecha INICIO*/
$a= date("Y");
$m= date("m");
$d= date("d");
$d = $d;

$fecha= $a ."-". $m ."-". $d;
$fechaux= $d ."-". $m ."-". $a;
//echo"$fechaux";
/*ALTER TABLE tabla AUTO_INCREMENT = 1;*/
$address = "127.0.0.1";
$user = "root";
$pass = "";
$database = "virtual-route";
$mysqli = new mysqli("$address", "$user", "", "$database");
$mysqli = new mysqli("$address", "$user", "", "$database");

$query = "SELECT comentarios.fecha, user.nameuser, comentarios.contenido 
FROM comentarios
INNER JOIN user ON comentarios.`pk-usuario` = user.pkuser";
$resultado = $mysqli->query($query);

// Crear la tabla HTML
echo "<table>";
echo "<tr><th>Fecha</th><th>Nombre de usuario</th><th>Comentario</th></tr>";

// Recorrer los comentarios y mostrarlos en la tabla
while ($row = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['fecha'] . "</td>";
    echo "<td>" . $row['nameuser'] . "</td>";
    echo "<td>" . $row['contenido'] . "</td>";
    echo "</tr>";
}

echo "</table>";

?>

  </body>
</html>
