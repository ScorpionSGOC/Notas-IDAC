Para crear un botón en una página web que ejecute esta consulta, necesitarás combinar HTML, CSS y JavaScript para la interacción del usuario, junto con algún lenguaje de programación server-side (como PHP) y una base de datos (como MySQL) para gestionar la consulta en sí. Aquí hay un ejemplo de cómo puedes hacerlo usando PHP y MySQL:

1. Crea un archivo HTML (`index.html`):

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta con botón</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="consulta.php" method="post">
        <input type="text" name="rfc" placeholder="Introduce el RFC deseado" required>
        <button type="submit" name="consultar">Consultar</button>
    </form>
    <div id="resultado"></div>
    <script src="main.js"></script>
</body>
</html>
```

2. Crea un archivo CSS (`styles.css`) para darle estilo al botón:

```css
button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border: none;
}
```

3. Crear un archivo PHP (`consulta.php`) que se encargue de realizar la consulta a la base de datos:

```php
<?php
// Conexión a la base de datos
$host = "localhost";
$user = "tu_usuario";
$pass = "tu_contraseña";
$db = "nombre_de_la_bd";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el RFC del formulario
$rfc = $_POST['rfc'];

// Consulta SQL
$sql = "SELECT usuario.rfc, usuario.Nombre, tasignatura.claveasig, tasignatura.materia
FROM usuario
JOIN c_sig_usu ON usuario.rfc = c_sig_usu.rfc
JOIN tasignatura ON c_sig_usu.claveasig = tasignatura.claveasig
WHERE usuario.rfc = '$rfc'";

$result = $conn->query($sql);

// Procesar y mostrar resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "RFC: " . $row["rfc"] . " - Nombre: " . $row["Nombre"] . " - Clave asignatura: " . $row["claveasig"] . " - Materia: " . $row["materia"] . "<br>";
    }
} else {
    echo "No se encontraron resultados";
}

$conn->close();
?>
```

Por favor, asegúrate de reemplazar valores como `tu_usuario`, `tu_contraseña`, y `nombre_de_la_bd` con tus propios datos de conexión a la base de datos MySQL.

Con este ejemplo lograrás que, al ingresar un RFC y presionar el botón "Consultar", se realice la consulta indicada y los resultados se muestren en la página.

Ten en cuenta que este es solo un ejemplo básico, y deberías mejorar este código siguiendo las buenas prácticas de seguridad y manejo de errores al implementarlo en proyectos reales.