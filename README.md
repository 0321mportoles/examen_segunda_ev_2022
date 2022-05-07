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

## Posibles problemas con GIT

Para clonar no debería dar problema, pero para actualizar el repositorio actualmente se pide que haya que añadir la clave pública del ordenador desde dónde hacemos cada commit. Las instrucciones para esto están en [el siguiente enlace] (https://github.blog/2020-12-15-token-authentication-requirements-for-git-operations/)

En nuestro PC generaremos un nuevo par de claves, le daremos un nombre
	ssh-keygen -t rsa -b 4096 -C "martaportoles9@gmail.com"

Como resultado, obtendremos algo similar a esto

	Generating public/private rsa key pair.
	Enter file in which to save the key (C:\Users\marta/.ssh/id_rsa):
	Enter passphrase (empty for no passphrase):
	Enter same passphrase again:
	Your identification has been saved in C:\Users\marta/.ssh/id_rsa.
	Your public key has been saved in C:\Users\marta/.ssh/id_rsa.pub.
	The key fingerprint is:
	SHA256:q+HJ4/xhVs57RnN0RJdQb/IYY/I3+QBIpBS+73rr+dk martaportoles9@gmail.com
	The key's randomart image is:
	+---[RSA 4096]----+
	|        ooo  .oo+|
	|       o o .   .+|
	|        o . o =.o|
	|         .   =.Bo|
	|        S .  .++o|
	|         *  o .oo|
	|      . = +. o  .|
	|     +.* o.ooo   |
	|     .Boo+*=o E  |
	+----[SHA256]-----+

Cuándo nos pregunten el fichero dónde guardar la clave podemos poner nuestro nombre, o mejor un alias para que no sea reconocible.
Introduciremos una clave como passphrse
Una vez generada iremos a la ruta dónde  "public key" ha sido guardado y copiaremos su contenido para pegarlo a continuación

Acceder a [https://github.com/settings/keys] (https://github.com/settings/keys)
Añadir nueva clave ssh
Le daremos un nombre descriptivo (Ej: sala PCs itaca) y pegaremos el contenido copiado antes en el text area debajo del nombre.
Una vez hecho todo esto, ya podremos hacer push en nuestro repositorio.

### Si habiamos clonado con HTTP

Si usamos el método de clave pública/privada habrá que cambiar el remote si habíamos clonado mediante HTTP

	git remote set-url origin https://github.org/repo.git

