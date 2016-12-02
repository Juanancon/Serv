<?php
/* Este es el archivo del Controlador Frontal, aquí se mezcla la vista con el controlador */

//Definición de constantes para facilitar las rutas
define('CTRL_PATH', __DIR__ . '/controllers/');
define('MODELS_PATH', __DIR__ . '/models/');
define('HELPERS_PATH', __DIR__ . '/helper/');
define('VIEWS_PATH', __DIR__ . '/views/');
define('TEMPLATE_PATH', __DIR__ . '/plantilla/');
session_start();
/*
 Fichero aún por crear donde tendremos plantillas para los menús que nos redirigiran a nuestras webs
define('TEMPLATE_RUTA', __DIR__ . '/template/');
*/

?>
<!DOCTYPE html>
<html>
        <head>
            <title>JOBYESTERDAY</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="../assets/css/estilos.css">
            <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        </head>
    <body>
        <?php
         include (TEMPLATE_PATH . 'header.php');
        //Menú por el que la aplicación siempre debería entrarnos


        // El body del controlador frontal
        $controllers=isset($_GET['controllers']) ? $_GET['controllers'] : 'ctr_login';

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

       // include (TEMPLATE_PATH . 'footer.php');
        ?>
    </body>
</html>