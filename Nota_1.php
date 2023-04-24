
Para lograr lo que deseas, primero necesitas crear una conexión a la base de datos de MariaDB utilizando PHP y luego utilizar HTML, JavaScript y AJAX para comunicarse entre las interfaces y la base de datos. Aquí hay un ejemplo de cómo puedes lograr esto:

1. Primero, crea un archivo PHP llamado "conexion.php" que contendrá la conexión a la base de datos:

```php
<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "db_idac";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
?>
```

2. Luego, crea un archivo PHP llamado "get_data.php" que obtendrá los datos de la base de datos cuando el usuario haga clic en un botón:

```php
<?php
include 'conexion.php';

if(isset($_POST['materia'])) {
  $materia = $_POST['materia'];

  $sql = "SELECT Id_materia, asignar FROM tasignatura WHERE asignar = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $materia);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
  } else {
    echo json_encode(array("error" => "No se encontraron datos."));
  }

  $stmt->close();
  $conn->close();
}
?>
```

3. A continuación, crea un archivo HTML llamado "index.html" que contendrá la interfaz de usuario con los botones de las materias y el área donde se mostrarán los resultados:

```html
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Materias</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <button class="materia-btn" data-materia="Matemáticas">Matemáticas</button>
  <button class="materia-btn" data-materia="Ciencia">Ciencia</button>
  <button class="materia-btn" data-materia="Química">Química</button>

  <div id="resultado">
    <h2>Información de la Materia:</h2>
    <p id="datos-materia"></p>
  </div>

  <script>
    $(".materia-btn").on("click", function() {
      let materia = $(this).data('materia');

      $.ajax({
        type: 'POST',
        url: 'get_data.php',
        data: {materia: materia},
        dataType: 'json',
        success: function(data) {
          if(data.error) {
            $("#datos-materia").html(data.error);
          } else {
            $("#datos-materia").html("Id_materia: " + data.Id_materia + "<br>Asignar: " + data.asignar);
          }
        },
      });
    });
  </script>
</body>
</html>
```

Cuando el usuario haga clic en uno de los botones de la materia, se ejecutará una función JavaScript que utiliza AJAX para enviar la solicitud al archivo "get_data.php", que consultará la base de datos y devolverá la información correspondiente a la materia seleccionada. Los datos se mostrarán en la sección `#datos-materia` de la interfaz sin necesidad de recargar la página.