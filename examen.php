<?php
session_start();
$idioma = $_SESSION['idioma'];
$imagenes =  $_SESSION['imagenes'];

$imagenes=unserialize($imagenes);
var_dump($idioma);
var_dump($imagenes);
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
</fieldset>
</body>
</html>

