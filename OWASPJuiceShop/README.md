1.Escapando en el formulario de login con ' OR 1=1 --, con la contraseña que sea y entra como el primer usuario es decir admin

2.Listado de directorios en la url http://172.22.255.45:3000/ftp/
Ademas se muestran diversas rutas en el error de la url http://172.22.255.45:3000/ftp/pwd
como este http://172.22.255.45:3000/ftp/acquisitions.md

3.El archivo main.js muestra varias rutas de la web
entre ellas podemos entrar a http://172.22.255.45:3000/#/administration donde se ve la informacion de los distintos usuarios de la web

4.La barra de búsqueda de productos permite ejecución de javascript mediante etiquetas imagen con onerror dado que el propio javascript esta sanitizado img src=x onerror=alert('XSS'), para robar la cookie podemos usar el siguiente comando img src=x onerror=javascript:alert(document.cookie) (DOM XSS)

5.Como nos comentaron al principio del reto existe una scoreboard que nos va contando los logros que hemos hecho en la siguiente url http://172.22.255.45:3000/#/score-board

6.El apartado de complains permite subir archivos .pdf menores a 100kb sin embargo la comprobación la hace en el cliente por lo que con una herramienta como burpsuite podemos subir el archivo que queramos al servidor.
