Entiendo que deseas crear una interfaz para asignar materias a un usuario en una base de datos MariaDB y que al seleccionar una materia, esta se muestre en una nueva interfaz indicando la asignatura y materia seleccionada. A continuación, te proporciono un esbozo básico de cómo podrías desarrollarlo utilizando HTML, JavaScript y PHP para manejar la interacción con la base de datos MariaDB.

1. Crea un archivo `index.html` que contendrá la interfaz con los botones de las materias:

```html
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asignación de materias</title>
</head>
<body>
  <h1>Asignación de materias a usuarios</h1>
  <p>Selecciona una materia:</p>
  <button onclick="mostrarMateria('matematica')">Matemática</button>
  <button onclick="mostrarMateria('quimica')">Química</button>
  <button onclick="mostrarMateria('ciencia')">Ciencia</button>

  <script>
    function mostrarMateria(materia) {
      // Añade aquí el código para llamar al archivo 'mostrarMateria.php' con la materia seleccionada, normalmente utilizando AJAX.
    }
  </script>
</body>
</html>
```

2. Crea un archivo `mostrarMateria.php` que manejará las consultas a la base de datos y mostrará los resultados en una nueva interfaz:

```php
<?php
// Configuración de la base de datos
$servername = "tu_servidor";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitizar valor de 'materia' recibido por AJAX
$materia = filter_input(INPUT_GET, 'materia', FILTER_SANITIZE_STRING);

// Consulta a la tabla Usuario y Asignatura
$sql = "SELECT u.RFC, a.claveAsig, a.nombre
        FROM usuario u, asignatura a
        WHERE u.RFC = a.RFC AND a.nombre = '{$materia}'";

$result = $conn->query($sql);

// Crear una tabla con los resultados
if ($result->num_rows > 0) {
  echo "<table><tr><th>RFC</th><th>Clave Asignatura</th><th>Asignatura</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["RFC"] . "</td><td>" . $row["claveAsig"] . "</td><td>" . $row["nombre"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No se encontraron resultados";
}

$conn->close();
?>
```

3. En el archivo `index.html`, utiliza AJAX para llamar al archivo `mostrarMateria.php` con la referencia de la materia seleccionada:

```javascript
function mostrarMateria(materia) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector("body").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "mostrarMateria.php?materia=" + materia, true);
  xhttp.send();
}
```

Este es un ejemplo básico para darte una idea. Recuerda que debes adaptarlo según tus necesidades y requerimientos específicos, además de añadir las medidas de seguridad necesarias (por ejemplo, consultas preparadas para evitar inyección SQL).