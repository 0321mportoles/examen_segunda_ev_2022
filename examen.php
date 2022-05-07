<?php
require_once 'funciones.php';
iniciarSesion();

$idioma = $_SESSION['idioma'];
$imagenes =  $_SESSION['imagenes'];

$imagenes = unserialize($imagenes);

$evaluacion = '';
$nImagen = $_SESSION['nImagen'] ?? 1;

if (isset($_POST['submit']) && $_POST['submit'] == 'Evaluar') {
    $evaluacion = new Evaluacion($_POST['respuestaCorrecta'], implode('', $_POST['respuesta']));
    $evaluacion->evaluar();
    if ($nImagen >= count($imagenes)) {
        header('Location: resultado.php'); exit();
    }
    $_SESSION['nImagen'] = ++$nImagen;
}

$imagen = $imagenes[$nImagen-1];
$preguntaHtml = Plantilla::plantillaPregunta($idioma, $imagen);


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Realizar examen de vocabulario</title>
        <link rel="stylesheet" href="./estilo/estilo.css">
    </head>
    <body>
        <fieldset>

            <form action="index.php" method="post">
                <input type="submit" value="Volver al index">
            </form>

            <fieldset>
                <legend>Numero de foto: <?= $nImagen ?></legend>
                <div class="contenido">
                    <form action="examen.php" method="post">
                        <?= $preguntaHtml ?>
                        <br><input type="submit" name="submit" value="Evaluar">
                    </form>
                </div>
            </fieldset>
        </fieldset>
        <?= $evaluacion ?>
    </body>
</html>

