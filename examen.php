<?php
require_once 'funciones.php';
iniciarSesion();

$idioma = $_SESSION['idioma'];
$imagenes =  $_SESSION['imagenes'];

$imagenes = unserialize($imagenes);

$evaluacion = '';
$nImagen = $_SESSION['nImagen'] ?? 1;

if (isset($_POST['submit']) && $_POST['submit'] == 'Evaluar') {
    $respuestaCorrecta = filter_input(INPUT_POST, "respuestaCorrecta", FILTER_SANITIZE_STRING);
    $respuesta = filter_input(INPUT_POST, "respuesta", FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    
    $evaluacion = new Evaluacion($respuestaCorrecta, implode('', $respuesta));
    // Si me piden guardar la respuesta correcta en session para evitar ponerlo 
    // en un input hidden, la recuperariamos aqui
    // $evaluacion = new Evaluacion($_SESSION['rCorrecta'], implode('', $respuesta));

    $evaluacion->evaluar();
    $_SESSION['respuestas'][] = serialize($evaluacion);
    if ($nImagen >= count($imagenes)) {
        header('Location: resultado.php'); exit();
    }
    $_SESSION['nImagen'] = ++$nImagen;
}

$imagen = $imagenes[$nImagen-1];

// Si nos pidieran guardar la respuesta correcta en session
// $_SESSION['rCorrecta'] = extraeNombreImagenDesdeArchivo($imagen);
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
                <?= $evaluacion ?>
            </fieldset>
        </fieldset>
        <!--
            Me he descargado un código JS interesante de stackoverflow que
            permite cambiar de input mientras escribes para que sea más
            cómodo escribir
        -->
        <script type="text/javascript" src="js/funciones.js"></script>
    </body>
</html>


