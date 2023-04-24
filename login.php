Para cumplir con ese requerimiento, necesitarás utilizar HTML, CSS, JavaScript y PHP. Voy a mostrarte un ejemplo básico que incluye todos los componentes que mencionaste:

1. Primero, crea un archivo `index.html` con el siguiente contenido:

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Asignatura</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Seleccione una asignatura:</h1>
    <div class="button-container">
        <button data-asignatura="matemática">Matemática</button>
        <button data-asignatura="química">Química</button>
        <button data-asignatura="ciencia">Ciencia</button>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
```

2. Crea un archivo `styles.css` para agregar estilos básicos a los botones:

```css
body {
    font-family: Arial, sans-serif;
}

.button-container {
    display: flex;
    justify-content: center;
    gap: 10px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}
```

3. A continuación, crea un archivo `scripts.js` para agregar interacción a los botones:

```javascript
const buttons = document.querySelectorAll('button');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        const asignatura = button.getAttribute('data-asignatura');
        window.location.href = `mostrar_asignatura.php?asignatura=${asignatura}`;
    });
});
```

4. Finalmente, crea un archivo `mostrar_asignatura.php` que recupere el dato enviado y muestre la asignatura seleccionada en una tabla. Asegúrate de insertar el nombre de las asignaturas en la tabla 'tasignatura' en tu base de datos de MariaDB.

```php
<?php
$asignatura = $_GET['asignatura'];

// Conexión a la base de datos (cambia los valores según tus credenciales)
$conn = new mysqli('localhost', 'user', 'password', 'nombre_base_de_datos');

// Verifica la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener el nom_asign
$sql = "SELECT nom_asign FROM tasignatura WHERE nom_asign = '$asignatura'";
$result = $conn->query($sql);
$nombre_asignatura = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nombre_asignatura = $row['nom_asign'];
    }
} else {
    echo "No se encontró la asignatura";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignatura Seleccionada</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Asignatura Seleccionada</h1>
    <table>
        <tr>
            <th>Asignatura</th>
        </tr>
        <tr>
            <td><?php echo $nombre_asignatura; ?></td>
        </tr>
    </table>
</body>
</html>
```

Con estos archivos, tendrás la funcionalidad básica que mencionaste. Asegúrate de configurar correctamente la conexión a la base de datos y de tener un servidor PHP para ejecutar el código.