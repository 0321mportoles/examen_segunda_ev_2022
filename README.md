# Instrucciones montar entorno

## Comprobamos que no hay ningún servidor

Accedemos a  [Localhost] (http://localhost) para verificar que XAMPP u otros no están encendidos. Si localhost no ma algo que no sea no encontrado, es posible que ya esté encendido.

## Iniciamos XAMPP

Normalmente, tecla Windows, XAMPP, si no, debería estar en C://xampp.
Si no estuviera instalado, lo instalamos y comprobamos que no haya otro programa del tipo WAMPP ya instalado.

## Clonar proyecto dentro de la carpeta htdocs de XAMPP

Normalmente XAMPP está en C://xampp

	cd C:\xampp\htdocs
	git clone https://github.com/0321mportoles/examen_segunda_ev_2022.git

## Comprobamos que el proyecto funciona

Accedemos a la URL del proyecto

[URL Examen] (http://localhost/examen_segunda_ev_2022/) comprobando que XAMPP funciona correctamente y tenemos ya nuestro proyecto funcionando

## Actualización de nuestro repositorio

Quizá nos piden mandan un repositorio, o quizá nos piden mandar el proyecto empaquetado. En el primer caso, tendremos que subir nuestros cambios al repositorio y después mandar el enlace al mismo.
	git status 				# Nos da el estado del repositorio, saber que ficheros hemos modificado
	git add . 				# Añade a sttaged files los ficheros que tenemos modificados
	git commit -m 'Mensaje' # Preparamos commit con un mensaje sobre los cambios realizados, siempre hacer commits pequeños con cada mejora realizada
	git push origin main	# Mandamos al servidor de git todos los commits realizados

Si nos piden los archivos empaquetados, meterlo a un ZIP con el nombre requerido y enviarlo.

