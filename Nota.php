Para mostrar una materia en una tabla HTML desde la base de datos MariaDB, necesitarás utilizar un lenguaje de programación del lado del servidor como PHP para poder conectarte a la base de datos, realizar consultas y luego generar el código HTML en función de los resultados obtenidos. A continuación se presenta un ejemplo de cómo hacerlo utilizando PHP, HTML y SQL:

1. Crea un archivo PHP, por ejemplo `mostrar_materias.php`.

2. Asegúrate de tener la configuración de conexión a la base de datos dentro de tu archivo PHP. Por ejemplo, puedes crear un archivo `conexion.php`:
```php
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "nombre_de_tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Error al conectar: " . $conn->connect_error);
}
?>
```
3. En `mostrar_materias.php`, incluye el archivo de conexión y realiza la consulta a la base de datos:
```php
<?php
include 'conexion.php';

$sql = "SELECT tasignatura.claveasig, tasignatura.nombre AS asignatura, usuario.RFC, usuario.nombre AS usuario_nombre
        FROM c_sig_usu
        INNER JOIN tasignatura ON tasignatura.claveasig = c_sig_usu.claveasig
        INNER JOIN usuario ON usuario.RFC = c_sig_usu.RFC";
$result = $conn->query($sql);
?>
```
4. Crea la tabla HTML y usa un bucle para mostrar los registros obtenidos en la consulta:
```html
<!DOCTYPE html>
<html>
<head>
  <title>Mostrar materias</title>
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
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<h2>Materias asignadas</h2>

<table>
  <tr>
    <th>Clave de asignatura</th>
    <th>Asignatura</th>
    <th>RFC</th>
    <th>Nombre del usuario</th>
  </tr>
  <?php
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["claveasig"] . "</td>";
      echo "<td>" . $row["asignatura"] . "</td>";
      echo "<td>" . $row["RFC"] . "</td>";
      echo "<td>" . $row["usuario_nombre"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='4'>No se encontraron registros</td></tr>";
  }
  $conn->close();
  ?>
</table>

</body>
</html>
```

Este ejemplo supone que tienes una tabla de usuario con la clave primaria "RFC" y la tabla "tasignatura" con la clave "claveasig". La tabla intermedia "c_sig_usu" asocia cada materia con un usuario usando las llaves foráneas "RFC" y "claveasig". Este código PHP se conecta a tu base de datos MariaDB, realiza la consulta y muestra los resultados en una tabla HTML.

Asegúrate de cambiar los valores de conexión a la base de datos y las claves de acceso en el archivo `conexion.php`.

También puedes adaptar este ejemplo según tus necesidades y la estructura de tu base de datos.