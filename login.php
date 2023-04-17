<?php
include_once('./config/conexion.php');
include_once('./config/sesion.php');

if(isset($_GET['logout'])) destroy();

if(status()) header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="en">
       
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Inicio</title>
       <link rel="stylesheet" href="./css/main.css">
</head>

<body>
       <?php include_once('./components/header.php'); ?>
       <div class="container">
              <div class="login">
                     <form action="./login.php" method="post">
                            <h2>Inicio De Sesión</h2>
                            <input type="text" name="user" placeholder="Ingrese su ID" />
                            <input type="password" name="pass" placeholder="Ingrese su Contraseña">
                            <button type="submit" name="btn_iniciar">Iniciar</button>
                            <a href="#">Pagina oficial TecSM</a>
                     </form>
              </div>
       </div>
       <?php include_once('./components/footer.php'); ?>
</body>

</html>

<?php 

if(isset($_POST['btn_iniciar'])) Logear($con);
function Logear($con){
       $usuario = $_POST['user'];
       $pass = $_POST['pass'];

       $query = "select u.nombre, u.apellido_p from usuario as u where u.id_usuario = '$usuario' and u.clave = '$pass';";
       echo $query;
       $res = $con->query($query);
       if($res->num_rows > 0){
              $data = $res->fetch_array();
              start(array('id' => $usuario ,'nombre' => $data[0] . " " . $data[1]));
              header('Location: index.php');
       } else{
              echo "<script>alert('ID o clave de acceso incorrectas');</script>";
       }
}
/*Esto es solo una prueba*/
