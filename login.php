Claro, aquí te proporciono un ejemplo de cómo se verían las interfaces en HTML y cómo puedes enviar la solicitud GET al hacer clic en los botones:

Página de inicio:
```html
<!DOCTYPE html>
<html>
<head>
	<title>Página de inicio</title>
</head>
<body>
	<h1>Iniciar sesión</h1>
	<form action="validar_login.php" method="post">
		<label for="username">Nombre de usuario:</label>
		<input type="text" name="username" required><br><br>
		<label for="password">Contraseña:</label>
		<input type="password" name="password" required><br><br>
		<input type="submit" value="Iniciar sesión">
	</form>
</body>
</html>
```

Página principal de la interfaz:
```html
<!DOCTYPE html>
<html>
<head>
	<title>Página principal</title>
</head>
<body>
	<h1>Selecciona una materia:</h1>
	<button onclick="window.location.href='recibo_registron.php?nom_asign=Matemáticas'">Matemáticas</button>
	<button onclick="window.location.href='recibo_registron.php?nom_asign=Ciencia'">Ciencia</button>
	<button onclick="window.location.href='recibo_registron.php?nom_asign=Química'">Química</button>
</body>
</html>
```

Página de recibo_registron:
```html
<!DOCTYPE html>
<html>
<head>
	<title>Recibo de Registro</title>
</head>
<body>
	<h1>Registros de la materia <?php echo $_GET['nom_asign']; ?>:</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Asignatura</th>
		</tr>
		<?php
			//Obtener el nombre de la asignatura del parámetro de solicitud GET
			$nom_asign = $_GET['nom_asign'];

			//Conectar a la base de datos
			$conn = new mysqli($servername, $username, $password, $dbname);

			//Verificar la conexión
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			//Hacer una consulta para obtener todos los registros correspondientes a la asignatura seleccionada
			$sql = "SELECT * FROM tasignatura WHERE asignar = '$nom_asign'";
			$result = $conn->query($sql);

			//Cerrar la conexión
			$conn->close();

			//Mostrar los resultados de la consulta en la tabla
			if ($result->num_rows > 0) {
			  	while($row = $result->fetch_assoc()) {
			  		echo "<tr><td>".$row["Id-materia"]."</td><td>".$row["asignar"]."</td></tr>";
			  	}
			} else {
				echo "<tr><td colspan='2'>No hay registros para esta asignatura.</td></tr>";
			}
		?>
	</table>
</body>
</html>
```

Espero que esto te ayude en tu proyecto. ¡Buena suerte!