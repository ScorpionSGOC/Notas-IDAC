<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <!-- Botones para cada una de las materias -->
        <button onclick="obtenerAsignatura('Administración de Servidores')">Administración de Servidores</button>
        <button onclick="obtenerAsignatura('Ciencia')">Ciencia</button>
        <button onclick="obtenerAsignatura('Química')">Química</button>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="consulta_asignatura.php"></script> <!-- incluimos el archivo consulta_asignatura.php -->
        <script>
            function obtenerAsignatura(nom_asign) {
                $.ajax({
                    url: "consulta_asignatura.php",
                    type: "POST",
                    data: { nom_asign: nom_asign },
                    success: function(data) {
                        // Redirigir a la interfaz recibo_registron y mostrar los datos de la asignatura
                        window.location.href = "recibir_datos.php?datos=" + encodeURIComponent(data);
                    }
                });
            }
        </script>
    </body>
</html>