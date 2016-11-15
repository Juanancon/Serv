<?php
/* Este es el archivo del Controlador Frontal, aquí se mezcla la vista con el controlador */

//Definición de constantes para facilitar las rutas
define('CTRL_PATH', __DIR__ . '/controllers/');
define('MODELS_PATH', __DIR__ . '/models/');
define('HELPERS_PATH', __DIR__ . '/helper/');
define('VIEWS_PATH', __DIR__ . '/views/');
define('TEMPLATE_PATH', __DIR__ . '/plantilla/');
/*
 Fichero aún por crear donde tendremos plantillas para los menús que nos redirigiran a nuestras webs
define('TEMPLATE_RUTA', __DIR__ . '/template/');
*/
session_start();
?>
<!DOCTYPE html>
<html>
        <head>
            <title>INDEX CF</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
            <script type="text/javascript" src="assets/js/agenda.js"></script>
            <link rel="stylesheet" href="assets/css/estilos.css">
            <link rel="stylesheet" href="assets/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
        </head>
    <body>
        <?php
        //Menú por el que la aplicación siempre debería entrarnos

       // include(TEMPLATE_PATH.'menu.php'); Esto convendría hacerlo cuando tuviese un menu

        // El body del controlador frontal
        $controllers=isset($_GET['controllers']) ? $_GET['controllers'] : 'ctr_lista';

        // Aquí el nombre del fichero que se incluye
        $file = CTRL_PATH . $controllers.'.php';

        if (file_exists($file))
        {
            include($file);
        }
        else
        {
            include(TEMPLATE_PATH.'error404.php');
        }
        ?>
    </body>
</html>