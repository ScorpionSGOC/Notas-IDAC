<form action="mostrar.php" method="POST">
  Nombre: <input type="text" name="nombre"><br>
  Email: <input type="email" name="email"><br>
  Mensaje: <textarea name="mensaje"></textarea><br>
  <input type="submit" value="Guardar">
</form>

///
<?php
// Validar y sanitizar los datos recibidos por POST
$nombre = $_POST['nombre'] ?? '';
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) ?? '';
$mensaje = $_POST['mensaje'] ?? '';

// Guardar los datos en un archivo
$file = fopen('datos.txt', 'a');
fwrite($file, "$nombre | $email | $mensaje\n");
fclose($file);
?>
/////
<table>
  <tr>
    <th>Nombre</th>
    <th>Email</th>
    <th>Mensaje</th>
  </tr>
  <?php
  // Leer el archivo de datos
  $file = fopen('datos.txt', 'r');
  while (($line = fgets($file)) !== false) {
    $data = explode(' | ', trim($line));
    echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td></tr>";
  }
  fclose($file);
  ?>
</table>