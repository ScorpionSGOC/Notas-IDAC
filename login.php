¡Por supuesto! Aquí hay un ejemplo de cómo se podría crear un formulario para registrar las calificaciones de un alumno:

HTML:
```
<form>
  <label for="student-name">Nombre del estudiante:</label>
  <input type="text" id="student-name" name="student-name" required>
  
  <label for="subject">Materia:</label>
  <select id="subject" name="subject" required>
    <option value="">Selecciona una materia</option>
    <option value="matematicas">Matemáticas</option>
    <option value="ciencias">Ciencias</option>
    <option value="historia">Historia</option>
  </select>
  
  <label for="grade">Calificación:</label>
  <input type="number" id="grade" name="grade" min="0" max="10" step="0.1" required>
  
  <button type="submit">Guardar calificación</button>
</form>
```

CSS:
```
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 20px;
}

label {
  margin-top: 10px;
}

input[type=text], select, input[type=number] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

button[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button[type=submit]:hover {
  background-color: #3e8e41;
}
```

Este formulario incluye campos para el nombre del estudiante, la materia y la calificación, y requiere que todos los campos estén completados antes de enviar el formulario. El botón de enviar está estilizado con CSS para que tenga un color de fondo verde y tenga un efecto de transición al pasar el cursor sobre él. ¡Espero que esto ayude!