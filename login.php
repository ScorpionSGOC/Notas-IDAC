Claro, aquí tienes un ejemplo básico de una interfaz con botones "Inicio", "Portafolio" y "Manual" utilizando Bootstrap. Asegúrate de incluir tanto Bootstrap CSS como JS en tu proyecto antes de copiar y pegar el siguiente código en el archivo HTML.

1. Incluye las dependencias de Bootstrap en tu archivo HTML, si aún no las has agregado:

```html
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5fef9lprG7+zOi5Q5gebnC9WNMFKo" crossorigin="anonymous">

    <title>Mi Interfaz</title>
  </head>
  <body>
  <!-- Aquí va el contenido -->
  </body>
</html>
```

2. Ahora puedes copiar y pegar el siguiente código para la barra lateral:

```html
<!-- Barra lateral -->
<div class="d-flex flex-column bd-highlight position-fixed p-3 bg-light" style="width: 200px;">
  <h2>Menú</h2>
  <a class="btn btn-primary mt-2" href="#inicio" role="button">Inicio</a>
  <a class="btn btn-primary mt-2" href="#portafolio" role="button">Portafolio</a>
  <a class="btn btn-primary mt-2" href="#manual" role="button">Manual</a>
</div>
```

Este código crea una barra lateral con una lista de botones para navegar entre "Inicio", "Portafolio" y "Manual". Puedes personalizar el CSS y la estructura según tus preferencias.

Nota: Si prefieres, también puedes utilizar un componente "nav" de Bootstrap o adaptar la barra lateral para que sea responsive según el diseño de tu sitio.