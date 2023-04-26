Supongo que ya has establecido una conexión a tu base de datos en PHP. A continuación, te muestro cómo ejecutar esta consulta y mostrar los resultados en una tabla HTML utilizando PHP y Bootstrap (un popular framework CSS) para darle estilo.

1. Asegúrate de tener los siguientes enlaces de Bootstrap en tu archivo HTML para cargar los estilos necesarios:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Asignaturas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1ReYPDx5095Ejqli2xAC8Y4yl1/LILE0w6B7p/" crossorigin="anonymous">
</head>
<body>
```

2. Ejecuta tu consulta en PHP y muestra el resultado en una tabla HTML con estilo de Bootstrap:

```php
<?php
// Establecer conexión a la base de datos aquí
// $conexion = new mysqli($servidor, $usuario, $password, $nombre_bd);

$query = "SELECT tasignatura.claveasig, tasignatura.materia AS asignatura, usuario.rfc, usuario.Nombre AS usuario_nombre
    FROM c_sig_usu
    INNER JOIN tasignatura ON tasignatura.claveasig = c_sig_usu.claveasig
    INNER JOIN usuario ON usuario.rfc = c_sig_usu.rfc";

// Ejecutar la consulta
$resultado = $conexion->query($query);

// Verificar si la consulta fue exitosa
if ($resultado) {
    echo '<div class="container">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Clave de asignatura</th>';
    echo '<th scope="col">Asignatura</th>';
    echo '<th scope="col">RFC</th>';
    echo '<th scope="col">Nombre del usuario</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Recorrer resultados y crear filas en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $fila['claveasig'] . '</td>';
        echo '<td>' . $fila['asignatura'] . '</td>';
        echo '<td>' . $fila['rfc'] . '</td>';
        echo '<td>' . $fila['usuario_nombre'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    // Liberar resultado
    $resultado->free();
} else {
    echo "<p>Lo siento, no se pudo ejecutar la consulta. Error: {$conexion->error}</p>";
}

// Cerrar la conexión
$conexion->close();
?>

</body>
</html>
```

Ten en cuenta que deberás cambiar las variables de conexión a la base de datos, como servidor, usuario, contraseña y base de datos, según sea necesario. La tabla HTML mostrará los resultados de la consulta utilizando estilos de Bootstrap.