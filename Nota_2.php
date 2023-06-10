<?php
session_start();

// Incluye el archivo de conexión a la base de datos
require_once '../config/conexion.php';

// Verifica si la variable de sesión 'RFC' está definida
if (isset($_SESSION['RFC'])) {
    // obtiene el RFC del docente de la variable de sesión
    $rfc = $_SESSION['RFC'];

    // obtiene la conexión a la base de datos
    $conn = conexion();

    // consulta la tabla de docentes para obtener los datos del docente
    $sql = "SELECT RFC, nombre, apellido_pa, apellido_ma FROM usuario WHERE RFC='$rfc'";
    $resultado = mysqli_query($conn, $sql);

    // verifica si se encontró el docente en la base de datos
    if (mysqli_num_rows($resultado) == 1) {
        // si se encontró, obtiene los datos del docente
        $fila = mysqli_fetch_assoc($resultado);


    } else {
        // si no se encontró el docente, muestra un mensaje de error
        echo "Error al obtener los datos del docente";
    }

    //obtener los datos de la tabla asig_materia para el usuario logueado
    $sql = "SELECT *
    FROM asig_materia 
    INNER JOIN usuario ON asig_materia.idUsuario = usuario.id_usuario
    INNER JOIN materia ON asig_materia.id_de_asignatura = materia.id_materia
    WHERE usuario.RFC = '$rfc'";

    $result = mysqli_query($conn, $sql);

    // cierra la conexión a la base de datos
    mysqli_close($conn);
} else {
    header('Location: /IDAC/index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
                initial-scale=1.0">
    <title>docentes</title>
    <link rel="stylesheet" href="../css/estyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
		integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
		crossorigin="anonymous"> </script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
		integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
		crossorigin="anonymous"> </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<?php require_once('../componentes/header.php') ?>

<body>
    
    <div class="container-fluid">
        <div class="row">

            <div id="button" class="col-sm-12 col-md-4 col-lg-4
                            col-xl-4">
                <div id="button_1" class="d-flex flex-column
                                bd-highlight position-fixed p-3 bg-light" style="width: 200px;">
                    
                    <a id="index_1" class="btn btn-primary mt-2" href="accion/logout.php" role="button">Cerrar
                        Sesión</a>

                </div>
            </div>

            <div id="campo" class="col-sm-12 col-md-8 col-lg-8
                        col-xl-8">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <br>
                            <?php echo "<h3>Docente: " . $fila['nombre']. " " . $fila['apellido_pa'] . " " .$fila['apellido_ma'] . "</h3>"; ?>
                        </h2>
<table>
  <thead>
    <tr>
      <th>Nombre Materia</th>
      <th>Clave Materia</th>
      <th>Editar</th>
      <th>Editar</th>
    </tr>
  </thead>
  <tbody>

  <style>
    button a {
        text-decoration: none;
        color: white;
    }
</style>

    <?php
    // Mostrar los datos obtenidos en la tabla
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["nombremateria"] . "</td>";
        echo "<td>" . $row["clave_asignatura"] . "</td>";
        echo '<td><button><a href="/IDAC/login/form_instrumentacion.php?idMateria='.$row["id_de_asignatura"].'" target="_self" >Instrumentación <br> Didáctica</a></button></td>';
        echo '<td><button><a href="/IDAC/login/form_avance.php?idMateria='.$row["id_de_asignatura"].'" target="_self">Avance programático <br> del curso</a></button></td>';
        echo "</tr>";
    } 
    
    
    
    ?>
  </tbody> 
</table>
<?php if (mysqli_num_rows($result) > 0): ?>
  <!-- Generar tabla -->
<?php else: ?>
  <tr>
    <td colspan="2">No se encontraron materias asignadas.</td>
  </tr>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
