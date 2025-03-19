<?php
header("Content-Security-Policy: frame-ancestors 'self';");
header("X-Frame-Options: DENY");
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>
<body>
    <h1>Bienvenido a la Página Principal</h1>
    <p id="mensaje">Este es un mensaje en la página principal.</p>
    <iframe id="iframePrueba" src="desconocido.php" style="width:100%; height:300px;"></iframe>
    <script>
        // Escuchar mensajes enviados desde el iframe
        window.addEventListener('message', function(event) {
            if (event.origin !== window.location.origin) return;
            // Cambiar el contenido del mensaje en la página principal
            const mensaje = document.getElementById('mensaje');
            if (mensaje) {
                mensaje.textContent = event.data;
            }
        });
    </script>
</body>
</html>
