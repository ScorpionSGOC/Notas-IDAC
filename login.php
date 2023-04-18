<form method="post" action="guardar.php">
  <label>Nombre:</label>
  <input type="text" name="nombre">

  <label>Email:</label>
  <input type="email" name="email">

  <button type="submit">Guardar</button>
</form>
//

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];

  // Guardar los datos en una variable o en una base de datos

  // Redirigir a otra página para mostrar la información guardada
  header('Location: mostrar.php');
}
?>
PHP:



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];

  // Guardar los datos en una variable o en una base de datos

  // Redirigir a otra página para mostrar la información guardada
  header('Location: mostrar.php');
}
?>