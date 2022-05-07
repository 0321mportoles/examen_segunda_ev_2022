<?php
	require_once 'funciones.php';
	iniciarSesion();

	$respuestas = $_SESSION['respuestas'];
	$idioma = $_SESSION['idioma'];
	$imagenes = $_SESSION['imagenes'];
	$imagenes = unserialize($imagenes);


	$informeResumido = Plantilla::plantillaInformeResumido($respuestas);
	$resumenRespuestas = Plantilla::plantillaResumenRespuestas($idioma, $respuestas, $imagenes);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Evaluación de resultados</title>
        <link rel="stylesheet" href="./estilo/estilo.css">
    </head>
    <body>
        <fieldset>
            <form action="index.php" method="post">
                <input type="submit" value="Volver al index">
            </form>

            <fieldset>
                <legend>Resultados</legend>
                <div class="contenido informe">
                    <?= $informeResumido ?>
                </div>

                <div class="contenido">
                    <?= $resumenRespuestas ?>
                </div>
            </fieldset>
        </fieldset>
    </body>
</html>