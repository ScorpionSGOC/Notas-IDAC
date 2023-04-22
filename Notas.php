Se puede crear un botón personalizado con un símbolo de más en medio utilizando HTML y CSS de la siguiente manera:

HTML:
```html
<button id="button1"><span>+</span></button>
```

CSS:
```css
#button1 {
  width: 100px;
  height: 50px;
  background-color: blue;
  border: none;
  border-radius: 5px;
  color: white;
  font-size: 30px;
  cursor: pointer;
}

#button1 span {
  display: inline-block;
  vertical-align: middle;
}
```

El código HTML crea un botón con un ID único de "button1" y un elemento de span dentro del botón que contiene el símbolo de más.

El CSS establece el ancho, la altura, el color de fondo, el borde, el borde de radio, el color del texto, el tamaño de la fuente y el cursor para el botón.

El CSS también establece la visualización en línea de bloque para el elemento de span y la alineación vertical en el centro para que el símbolo "+" aparezca en el centro del botón.