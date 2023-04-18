<form method="post" action="mostrar.php">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre"><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br>

  <button type="submit" id="enviar">Enviar</button>
</form>
///
document.getElementById('enviar').addEventListener('click', function(event) {
  event.preventDefault(); // Prevenir que se envíe el formulario de forma tradicional
  
  var nombre = document.getElementById('nombre').value;
  var email = document.getElementById('email').value;

  // Crear un objeto XMLHttpRequest para enviar los datos del formulario a la página mostrar.php
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Redirigir a la página mostrar.php cuando los datos se han guardado correctamente
      window.location.href = "mostrar.php";
    }
  };
  xhr.open("POST", "mostrar.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("nombre=" + nombre + "&email=" + email);
});
////
<?php
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Datos del formulario</title>
</head>
<body>
  <h1>Datos del formulario</h1>
  <p>Nombre: <?php echo $nombre; ?></p>
  <p>Email: <?php echo $email; ?></p>
</body>
</html>
