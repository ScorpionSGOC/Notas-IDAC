<form action="guardar.php" method="post">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre"><br><br>
  
  <label for="apellido">Apellido:</label>
  <input type="text" id="apellido" name="apellido"><br><br>
  
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  
  <button type="submit" name="guardar">Guardar</button>
</form>

///////
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];

$archivo = fopen("datos.txt", "a");
fwrite($archivo, $nombre . " " . $apellido . " - " . $email . "\n");
fclose($archivo);
///////
header("Location: otra_pagina.php");
exit;
////////

$contenido = file_get_contents("datos.txt");
$lineas = explode("\n", $contenido);

echo "<table>";
foreach ($lineas as $linea) {
    if (!empty($linea)) {
        list($nombre, $apellido, $email) = explode(" - ", $linea);
        echo "<tr><td>$nombre</td><td>$apellido</td><td>$email</td></tr>";
    }
}
echo "</table>";