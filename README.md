# CRUD_php

# ENTORNO LOCAL CON PILA LAMP
	
	# LINUX UBUNTU22
	# APACHE SERVIDOR WEB 
	# MYSQL BASE DE DATOS
	# PHP LENGUAJE DE PROGRAMACION

# Carga el archivo SQL en MySQL utilizando el cliente de línea de comandos:

	# mysql -u root -p < database.sql
	# FINAL FASE 1

# Creamos pagina de Registro.html guardandolos en la base de datos con verificación de entrada
	# FINAL FASE 2

# Creamos pagina de Login.html y php con comprobación de contraseña y errores.
	# FINAL FASE 3

# Creamos pagina de bienvenidad Index.php con comprobación de usuarios logueados y redireccion en caso de que no lo esten
	# Añadimos opción de cerrar sesion mediante el archivo Logout.php
	# FINAL FASE 4

# Creamos una pagina CRUD.view.php con el listado de productos de la base de datos y enlaces a los distintas paginas del crud (aún no funcionales)
	# FINAL FASE 5

# Actualizamos la logica del CRUD.read.php(antes CRUD.view.php) para separar php y html, y creamos el CRUD.create.php para permitir a los usuarios crear productos y almacenarlos en la base de datos con su validación y mensajes de error
	# FINAL FASE 6

# Actualizamos el listado de productos para añadir una opcion que nos permite editar un producto de forma que nos envia a un formulario (CRUD.update.php) que además valida la entrada antes de realizar los cambios en la base de datos
	# FINAL FASE 7

# Adaptamos el listado de productos para que cada uno tenga una opcion de borrado y se mandará a una pagina de comprobación para confirmar la eliminacion en la base de datos
	# FINAL FASE 8 y tarea

# COMO DOCKERIZAR
	# Clonar el repositorio "git clone <URL-del-repositorio>"
	# Levantamos todo el contenedor con el docker-compose up --build
	# Podemos entrar a la web mediante localhost:<puerto_host> 

# HEMOS CONFIGURADO EL CRUD_BASICO SEGUN LA TAREA XSS
	# Mediante el metodo GET se envian los datos en la url permitiendo al atacante enviar un enlca malicioso, mientras que en POST se envian en la solicitud http lo cual lo hace mas complejo para el atacante dado que ha de engañar a la victima para que envie un formulario
	# Ahora en el archivo que lista los productos contamos con un formulario de busqueda de productos que teniendo en cuenta como esta configurado permite ejecucion de codigo por parte del cliente por ejemplo con javascript <script>alert('¡Vulnerabilidad XSS!');</script>
	# Mediante <script>alert(document.cookie);</script> se obtiene la cookie de sesión
	# Para comprobar el acceso con esas cookies me he basado en este tutorial https://medium.com/@TheCS_student/stealing-cookies-with-javascript-cf668999e60b, utilizando ese codigo javascript enviamos las cookies a un servidor de la pagina webhook y una vez las tenemos podemos inyectarlas en nuestra pagina web para acceder como ese usuario

