Para mostrar una materia en una tabla HTML desde la base de datos MariaDB, primero debemos recuperar los datos necesarios de la tabla intermedia y la tabla de asignaturas. Podemos hacerlo mediante una consulta JOIN.

Supongamos que tenemos las siguientes tablas en nuestra base de datos:

Tabla "usuarios":

| RFC      | Nombre    |
| -------- | --------- |
| ABC123   | Juan      |
| DEF456   | Maria     |
| GHI789   | Carlos    |

Tabla "asignaturas":

| claveasig | materia   |
| --------- | --------- |
| MAT101    | Matemáticas |
| FIS101    | Física     |
| QUI101    | Química    |

Tabla "usuarios_asignaturas" (tabla intermedia):

| RFC      | claveasig |
| -------- | --------- |
| ABC123   | MAT101    |
| ABC123   | FIS101    |
| DEF456   | QUI101    |
| GHI789   | FIS101    |

Para mostrar las materias de cada usuario en una tabla HTML, podemos utilizar la siguiente consulta:

```
SELECT usuarios.Nombre, asignaturas.materia
FROM usuarios
JOIN usuarios_asignaturas ON usuarios.RFC = usuarios_asignaturas.RFC
JOIN asignaturas ON usuarios_asignaturas.claveasig = asignaturas.claveasig
WHERE usuarios.RFC = 'ABC123';
```

Esta consulta nos devuelve el nombre del usuario "Juan" y las materias "Matemáticas" y "Física", ya que son las asignaturas que tiene asignadas en la tabla intermedia.

Ahora podemos utilizar esta consulta en nuestro código HTML para mostrar los datos en una tabla:

```html
<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Materia</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "usuario", "contraseña", "basededatos");

    // Consulta con JOIN para obtener los datos necesarios
    $sql = "SELECT usuarios.Nombre, asignaturas.materia
            FROM usuarios
            JOIN usuarios_asignaturas ON usuarios.RFC = usuarios_asignaturas.RFC
            JOIN asignaturas ON usuarios_asignaturas.claveasig = asignaturas.claveasig
            WHERE usuarios.RFC = 'ABC123'";

    // Ejecución de la consulta y obtención de resultados
    $resultados = $conexion->query($sql);

    // Recorrido de los resultados y creación de filas en la tabla
    while ($fila = $resultados->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $fila["Nombre"] . "</td>";
      echo "<td>" . $fila["materia"] . "</td>";
      echo "</tr>";
    }

    // Cierre de la conexión a la base de datos
    $conexion->close();
    ?>
  </tbody>
</table>
```

En este ejemplo, estamos mostrando las materias del usuario con RFC "ABC123". Para mostrar las materias de cualquier otro usuario, basta con cambiar el valor de la condición WHERE en la consulta.