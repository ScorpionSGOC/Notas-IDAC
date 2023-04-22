Para crear un botón personalizado con un símbolo de "+" en la parte inferior y un texto en la parte superior utilizando Bootstrap, sigue estos pasos:

1. Asegúrate de incluir las dependencias necesarias de Bootstrap en tu archivo HTML (CSS y JS):

```html
<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- Aquí va tu código HTML -->
</body>
</html>
```

2. Ahora crea el botón personalizado utilizando el sistema de grid de Bootstrap y clases de botón, aquí un ejemplo:

```html
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <button class="btn btn-primary custom-button">
        <span class="d-block">Texto superior</span>
        <span class="d-block">+</span>
      </button>
    </div>
  </div>
</div>
```

3. Puedes ajustar el estilo del botón añadiendo reglas CSS personalizadas en el elemento `<style>` en el encabezado o en un archivo de estilo aparte:

```html
<style>
  .custom-button {
    font-size: 24px;
  }
  .custom-button span:first-child {
    font-size: 14px;
    font-weight: bold;
  }
  .custom-button span:last-child {
    font-size: 30px;
    font-weight: bold;
    margin-top: -5px;
  }
</style>
```

Con estos pasos, tendrás creado un botón personalizado con Bootstrap que tiene un símbolo de "+" en la parte inferior y un texto en la parte superior. Puedes ajustar el estilo y tamaño según lo necesites en las reglas CSS personalizadas.