Para crear un botón personalizado con CSS y HTML que tenga un símbolo de "+" en la parte inferior y un texto en la parte superior, puedes usar la propiedad "flex" de CSS para hacer que el botón se redimensione según sea necesario. A continuación se muestra un ejemplo de cómo hacerlo:

HTML:

```
<div class="button-container">
  <button class="custom-button">
    <span class="icon">+</span>
    <span class="text">Enviar</span>
  </button>
</div>
```

CSS:

```
.button-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.custom-button {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 16px;
  background-color: #0077cc;
  color: #ffffff;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.custom-button:hover {
  background-color: #00599c;
}

.icon {
  font-size: 24px;
  margin-bottom: 4px;
}

.text {
  font-size: 16px;
  text-transform: uppercase;
}
```

En este ejemplo, la clase "button-container" hace que el botón se centre verticalmente y horizontalmente en la página. La clase "custom-button" establece las propiedades de estilo del botón, como el fondo, el color del texto, el tamaño de letra, la posición de los elementos internos, etc. La clase "icon" se usa para establecer el tamaño y la posición del símbolo "+" y la clase "text" se usa para establecer el tamaño y la posición del texto en la parte superior del botón.

Puede ajustar las propiedades de estilo según sea necesario para adaptar el botón a sus necesidades específicas.