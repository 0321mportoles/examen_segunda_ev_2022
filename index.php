<?php

require_once 'funciones.php';

iniciarSesion(true);

//Inicializamos varialbes
$idiomas = new Directorio();
$msj =null; //Variable para aportar a la vista posibles acciones no realizadas
$disabledBottonDelDir=null;

$opcion = $_POST['submit'] ?? null;
switch ($opcion){
    case "Añadir":
        //importante sanitizar para evitar ataques CROSS
        $idioma = filter_input(INPUT_POST, "new_idioma", FILTER_SANITIZE_STRING);
        if (!$idiomas->add_dir($idioma))
            $msj ="No se ha podido crear $idioma";
        break;
    case "Borrar":
        //importante sanitizar para evitar ataques CROSS
        $idioma = filter_input(INPUT_POST, "idioma", FILTER_SANITIZE_STRING);
        if (!$idiomas->del_dir($idioma))
            $msj ="No se ha podido borrar $idioma";
        break;
    case "Hacer Examen Vocabulario":
        //A partir del contenido del directorio del idioma seleccionado
        //Tomamos 5 imágenes aleatorias no repetidas
        //Las pasamos (idioma e imagenes) a un nuevo script examen.php para realizar las preguntas
        $idioma = filter_input(INPUT_POST, "idioma", FILTER_SANITIZE_STRING);
        $_SESSION['idioma'] = $idioma;

        $contenido_imagenes = new Directorio("./idiomas/$idioma");
        $imagenes = $contenido_imagenes->getContenidoDir();
        //Mezclamos el arary de imagenes aleatoriamente
        shuffle($imagenes);

        //Extraemos 5 elementos del array de imagenes y lo serializamos para guardarlo en sesion
        $imagenes = serialize(array_slice($imagenes, 0, 5));
        $_SESSION['imagenes'] = $imagenes;

        header ("location:examen.php");
        exit();
}

if ($idiomas->vacio()) {
    $select = "<span class='titulo'>Actualmente no hay idiomas</span>";
    $disabledBottonDelDir = "disabled";
}
 else {
    $select = "<label id='idioma'>Idiomas</label> <select name='idioma' id='idioma'/>\n";
    foreach ($idiomas->getContenidoDir() as $idioma)
        $select .= "<option value='$idioma'>$idioma</option> \n";
    $select .= "</select>";
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vocabulario RF1</title>
    <link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>
<!-- Ahora si hay algún mensaje del tipo
no se ha podido hacer algo
lo visualizo-->
<?=$msj?>
<fieldset>
    <form action="index.php" method="POST">
    <legend>Idiomas</legend>
        <?= $select ?>
        <br />
        <label for="idioma">Idioma</label>
        <input type="text" name="new_idioma" id="idioma"><br />
        <input type="submit" name="submit" value="Añadir" >
        <input type="submit" name="submit" <?=$disabledBottonDelDir?> value="Borrar" >
        <input type="submit" name="submit" value="Hacer Examen Vocabulario" >
    </form>

</fieldset>


</body>
</html>
