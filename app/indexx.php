<?php
/* Este es el archivo del Controlador Frontal, aquí se mezcla la vista con el controlador */

//Definición de constantes para facilitar las rutas
define('CTRL_PATH', __DIR__ . '/controllers/');
define('MODELS_PATH', __DIR__ . '/models/');
define('HELPER_PATH', __DIR__ . '/helper/');
define('VIEWS_PATH', __DIR__ . '/views/');
/*
 Fichero aún por crear donde tendremos plantillas para los menús que nos redirigiran a nuestras webs
define('TEMPLATE_RUTA', __DIR__ . '/template/');
*/
session_start();
?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INDEX CF</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="../assets/js/agenda.js"></script>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php
//Menú por el que la aplicación siempre debería entrarnos
include(TEMPLATE_RUTA.'menu.php');

// El body del controlador frontal