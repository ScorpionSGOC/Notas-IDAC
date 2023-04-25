Para mostrar una materia en una tabla HTML desde MaríaDB, necesitas utilizar un lenguaje de programación del lado del servidor como PHP para recuperar los datos y mostrarlos en una tabla HTML. A continuación, te presento un ejemplo de cómo puedes hacer esto utilizando PHP, HTML y SQL:

Paso 1: Conectar PHP con la base de datos MariaDB

Crea el archivo `conexion.php` con el siguiente contenido:
```php
<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_de_tu_base_de_datos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Fallo de la conexión: " . $conn->connect_error);
}
?>
```
No olvides llenar las variables con tus propios datos de conexión.

Paso 2: Crear un archivo que muestre la información en una tabla HTML

Crea un archivo PHP llamado `mostrar_datos.php` con el siguiente contenido:

```php
<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Materias</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php
// Incluir el archivo de conexión
require_once("conexion.php");

// Obtener el RFC del usuario
$rfc = "tu_rfc";

// Crear SQL para obtener materias
$sql = "SELECT m.clave, m.nombre_materia
        FROM usuarios_materias um
        JOIN materias m ON um.clave_asignatura = m.clave
        WHERE um.RFC = '$rfc'";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los datos en una tabla HTML
    echo "<table>";
    echo "<tr><th>Clave</th><th>Materia</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["clave"] . "</td><td>" . $row["nombre_materia"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay resultados";
}
$conn->close();
?>

</body>
</html>
```
No olvides reemplazar "tu_rfc" con el RFC del usuario que desees mostrar en la página.

En este ejemplo, se crea una tabla HTML que muestra la clave y el nombre de la materia para un RFC específico. Simplemente ejecuta el archivo `mostrar_datos.php` en un servidor PHP compatible, y deberías obtener los resultados en una tabla HTML.

Asegúrate de adaptar los nombres de las tablas y columnas en el SQL de acuerdo con tu esquema de base de datos específico.