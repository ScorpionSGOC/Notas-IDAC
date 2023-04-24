index:

'''<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style>
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
		</style>
	</head>
	<body>
		<h1>Seleccione una asignatura:</h1>
		<div class="button-container">
			<button data-asignatura="matematicas">Matemática</button>
			<button data-asignatura="quimica">Química</button>
			<button data-asignatura="ciencia">Ciencia</button>
		</div>

		<script>
			const buttons = document.querySelectorAll('button');

			buttons.forEach(button => {
				button.addEventListener('click', () => {
					const asignatura = button.getAttribute('data-asignatura');
					window.location.href = `mostrar_asignatura.php?asignatura=${asignatura}`;
				});
			});
		 </script>
	</body>
</html>'''

mostrar_asignatura.php:
''' <?php
$asignatura = $_GET['asignatura'];

// Conexión a la base de datos (cambia los valores según tus credenciales)
$conn = new mysqli('localhost', 'root', '', 'db_idac');

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
</html>'''
