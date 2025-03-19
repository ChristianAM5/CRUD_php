PARTE 1 PREPARAR EL ENTORNO

1º Paso crear un index.php que con un iframe a la pagina desconocido.php y comprobamos en el navegador
2º Crearemos la pagina desconocido.php de manera que cuando se cargue la pagina modifique el DOM de la principal como en este caso si lo ha modificado muestra el mensaje de la principal modificado en caso contrario mostraria un mensaje de error

PARTE 2 DESCUBRIR LA VULNERABILIDAD

1º Al abrir el archivo index.php en el navegador este muestra el iframe y además su contenido se ha visto modificado por el mismo, al buscar errores en la consola del navegador no se ha detectado ninguno

PREGUNTAS

¿El iframe pudo modificar el DOM de la página principal? 
En este caso el iframe si pudo modificar nuestra página principal dado que nuestra prueba esta echa desde el mismo protocolo, dominio y puerto, si la prueba se hiciera desde otros distintos el Same-Origin Policy (SOP) impediría que esto sucediese

Si hubo errores en la consola, ¿qué dicen?
En nuestro caso no hubo errores pero en caso de que se fuera un dominio externo obtendríamos un error de seguridad bloqueando dicho iframe

Al ejecutar este comando en la consola document.getElementById("iframePrueba").contentWindow.document.body.innerHTML;

¿Qué ocurre?
Nos muestra el body del HTML del iframe

Si hay error, ¿por qué crees que sucede?
No ocurre el error debido a las razones antes expuestas

Prueba modificar el iframe desde la página principal con este código:
document.getElementById("iframePrueba").contentWindow.document.body.style.backgroundColor = "blue";

¿Funcionó?
Si ha funcionado

¿Por qué sí o por qué no?
Como mencionamos anteriormente al compartir mismo origen si permite que se muestre el iframe y por ende que se realicen modificaciones.

PARTE 3 PROTEGE TU SITIO

Para protegernos implementaremos en nuestro index.php las siguientes cabeceras y formas de intercambios de datos:
Content-Security-Policy: frame-ancestors 'self', Esta cabecera evita que la página sea embebida en iframes de otros sitios.

Usa la cabecera X-Frame-Options: DENY para evitar que la página sea embebida en iframes bloqueándolos completamente.

window.postMessage() permite enviar mensajes entre ventanas o iframes de diferentes orígenes de manera segura, siempre que se verifique el origen del mensaje.

REFLEXION FINAL
Preguntas:
¿Cómo pueden los iframes ser usados en ataques como clickjacking?

Los iframes pueden ser usados en ataques de clickjacking para engañar a los usuarios haciendo que hagan clic en elementos que no ven, como botones o enlaces, en una página oculta detrás de una página visible.

¿Por qué es importante la Same-Origin Policy (SOP)?

La SOP es importante porque previene que scripts de un origen accedan a datos de otro origen, protegiendo la privacidad y seguridad de los usuarios.

¿Cómo window.postMessage() puede ayudar a hacer intercambios de datos entre sitios seguros?

window.postMessage() permite la comunicación segura entre ventanas o iframes de diferentes orígenes, siempre que se verifique el origen del mensaje, lo que ayuda a prevenir ataques de seguridad.
