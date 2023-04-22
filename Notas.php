Aquí te dejo el código HTML y CSS para crear un botón personalizado con un símbolo de "+" en la parte inferior y un texto en la parte superior:

```
<div class="button">
  <span class="text">Agregar</span>
  <span class="icon">+</span>
</div>
```

El HTML es bastante sencillo. Creamos un contenedor "button" que contiene dos elementos hijos: una etiqueta "span" con la clase "text" para el texto del botón y otra etiqueta "span" con la clase "icon" para el símbolo de "+".

```
.button {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 120px;
  height: 120px;
  background-color: #007bff;
  border-radius: 50%;
  color: #fff;
  font-size: 20px;
  font-weight: bold;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 0.3s ease;
}

.button:hover {
  background-color: #0062cc;
}

.icon {
  margin-top: auto;
  font-size: 48px;
}

.text {
  margin-bottom: auto;
  text-align: center;
  padding: 10px;
}
```

En el CSS, primero establecemos las propiedades del contenedor "button". Es importante señalar que utilizamos flex-box para centrar verticalmente los elementos hijos del contenedor. Así, los elementos "text" y "icon" quedarán alineados al centro del botón. También establecemos un tamaño fijo para el botón, un fondo de color y estilizamos el texto.

Luego, agregamos un estilo para el botón cuando pasa el cursor sobre él, que cambia ligeramente el color de fondo.

Para la clase "icon", agregamos un margen superior automático para que se alinee al fondo del botón, junto con un tamaño de fuente más grande.

Finalmente, para la clase "text", agregamos un margen inferior automático para que se alinee al tope del botón, así como un texto centrado y un relleno para que no quede pegado a los bordes del botón. 

Con estas propiedades podemos obtener un botón personalizado con un símbolo de "+" en la parte inferior y un texto en la parte superior usando flex-box, CSS y HTML.