<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Desconocida</title>
</head>
<body>
    <h1>Página Desconocida</h1>
    <p>Este es un mensaje de prueba en la página desconocida.</p>
    <script>
	//apartado 1
//        try {
//           const parentDocument = window.parent.document;
//            const mensaje = parentDocument.getElementById('mensaje');
//            if (mensaje) {
//                mensaje.textContent = 'El iframe ha modificado este mensaje.';
//            } else {
//                console.error('No se encontró el elemento con id "mensaje" en la página principal.');
//            }
//       } catch (error) {
//            console.error('Error al intentar modificar el DOM de la página principal:', error);
//      }
	//prueba de window.postMessage()
    
	// Enviar un mensaje a la página principal
        window.parent.postMessage('El iframe ha modificado este mensaje.', window.location.origin);
    </script>
</body>
</html>
