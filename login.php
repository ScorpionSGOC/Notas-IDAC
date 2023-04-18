<form id="miFormulario">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre"><br><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>

  <button type="submit" id="guardarBtn">Guardar</button>
</form>

/////
const miFormulario = document.getElementById("miFormulario");
const guardarBtn = document.getElementById("guardarBtn");

guardarBtn.addEventListener("click", function(event) {
  event.preventDefault();

  const nombre = document.getElementById("nombre").value;
  const email = document.getElementById("email").value;

  const data = { nombre: nombre, email: email };

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "guardar.php");
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send(JSON.stringify(data));
});

/////////////
<?php
$data = json_decode(file_get_contents("php://input"), true);

$nombre = $data['nombre'];
$email = $data['email'];

// Código para guardar la información en una base de datos o archivo
?>



