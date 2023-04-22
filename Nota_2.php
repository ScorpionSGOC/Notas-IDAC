Para crear un botón personalizado con un símbolo de "+" y texto en la parte superior utilizando Bootstrap, puedes usar las clases existentes de Bootstrap para construir el botón y luego agregar tus propias clases de CSS para personalizarlo. A continuación se muestra un ejemplo de cómo hacerlo:

HTML:

```
<button class="btn btn-custom"><span class="btn-text">Enviar</span> <span class="btn-symbol">+</span></button>
```

CSS:

```
.btn-custom {
  position: relative;
  background-color: #0077cc;
  border-color: #0077cc;
  color: #ffffff;
  transition: background-color 0.3s ease;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  padding: 10px 20px;
}

.btn-custom:hover {
  background-color: #00599c;
  border-color: #00599c;
}

.btn-symbol {
  position: absolute;
  bottom: -20px;
  left: 50%;
  transform: translateX(-50%);
  font-size: 24px;
}

.btn-text {
  font-size: 16px;
  text-transform: uppercase;
}
```

En este ejemplo, la clase "btn" y sus subclases de Bootstrap (como "btn-primary" y "btn-outline-primary" para el estilo del botón y "btn-lg" para el tamaño) se omitieron para mantener la personalización simple. La clase "btn-custom" que se agrega es la clase personalizada que contiene las propiedades de estilo que has creado. El span con la clase "btn-text" establece el texto en la parte superior del botón y, el span con la clase "btn-symbol" establece el símbolo "+" en la parte inferior del botón.

Puedes ajustar las propiedades de estilo según sea necesario para adaptar el botón a tus necesidades específicas.