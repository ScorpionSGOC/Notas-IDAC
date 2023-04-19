El principal error del código es que la función obtenerAsignatura en el archivo consulta_asignatura.php 
no se está llamando en ningún momento. Para solucionarlo, se debe agregar un código en el archivo consulta_asignatura.php 
que permita llamar a la función obtenerAsignatura cuando se reciba el valor de nom_asign a través del método POST.

Aquí está el código corregido para consulta_asignatura.php:

<?php 
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

    $sql = "SELECT * FROM tasignatura WHERE nom_asign ='$nom_asign'"; 
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) { 
        // Retornar los datos de la asignatura en un arreglo asociativo 
        return $result->fetch_assoc(); 
    } else { 
        $conn->close(); 
        return null; 
    } 
} 

// Llamada a la función obtenerAsignatura 
if (isset($_POST['nom_asign'])) {
    $asignatura = obtenerAsignatura($_POST['nom_asign']);
    if ($asignatura != null) {
        // Devolver los datos de la asignatura en formato JSON
        echo json_encode($asignatura);
    } else {
        echo "No se encontraron datos para la asignatura especificada.";
    }
} 
?> 

Se agregó el código para llamar a la función obtenerAsignatura y devolver los datos de la asignatura en formato JSON. Además, se verificó si el valor de $asignatura es nulo y se devolvió un mensaje de error correspondiente en caso de que la asignatura no se encuentre en la base de datos.
