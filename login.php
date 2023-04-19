index.html
'''<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<!-- Botones para cada una de las materias -->
		<button onclick="obtenerAsignatura('Administración de Servidores')">Administración de Servidores</button>
		<button onclick="obtenerAsignatura('Ciencia')">Ciencia</button>
		<button onclick="obtenerAsignatura('Química')">Química</button>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
		<script src="consulta_asignatura.php"> </script> <!-- incluimos el archivo consulta_asignatura.php -->
		<script>
			function obtenerAsignatura(nom_asign)
			{
				$.ajax({
					url: "consulta_asignatura.php",
					type: "POST",
					data: { nom_asign: nom_asign },
					success: function(data) {
						// Redirigir a la interfaz recibo_registron y mostrar los datos de la asignatura
						window.location.href = "recibir_datos.php?datos=" + encodeURIComponent(data);
					}
				});
			}
		</script>
	</body>
</html> '''

recibir_datos.php:
''' <!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<!-- Botones para cada una de las materias -->
		<button onclick="obtenerAsignatura('Administración de Servidores')">Administración de Servidores</button>
		<button onclick="obtenerAsignatura('Ciencia')">Ciencia</button>
		<button onclick="obtenerAsignatura('Química')">Química</button>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
		<script src="consulta_asignatura.php"> </script> <!-- incluimos el archivo consulta_asignatura.php -->
		<script>
			function obtenerAsignatura(nom_asign)
			{
				$.ajax({
					url: "consulta_asignatura.php",
					type: "POST",
					data: { nom_asign: nom_asign },
					success: function(data) {
						// Redirigir a la interfaz recibo_registron y mostrar los datos de la asignatura
						window.location.href = "recibir_datos.php?datos=" + encodeURIComponent(data);
					}
				});
			}
		</script>
	</body>
</html> '''

consulta_asignatura.php:
''' <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_idac";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Función que retorna los datos de una asignatura
function obtenerAsignatura($nom_asign)
{
	global $conn;

	$sql = "SELECT * FROM tasignatura WHERE nom_asign ='" . mysqli_real_escape_string($conn, $nom_asign). "'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// Retornar los datos de la asignatura en un arreglo asociativo
		return $result->fetch_assoc();
	} else {
		return null;
	}
}
$conn->close();
?> '''
