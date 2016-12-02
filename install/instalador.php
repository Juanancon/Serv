<?php

include_once (__DIR__ . '/../app/helper/filtrado.php');
include_once (__DIR__ . '/../app/helper/helper.php');

?>
<!-- Principio del formulario -->
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
    <style type="text/css">
        body {padding-top:20px; color: #81BEF7;}
    </style>
</head>

<body>

<?php

if(!$_POST){

$errores=array();

formulario($errores);

}

else {

$errores = HayErroresCreandoDB();


   if($errores){

       formulario($errores);

   }

   else {

$servidor = $_POST['servidor'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$nombreBD = $_POST['nombreBD'];

$archivo = fopen("../app/config.php", "w");

fwrite($archivo, '<?php
$db_conf = array(
    "servidor"=>"localhost",
    "usuario"=>"root",
    "password"=>"",
    "base_datos"=>"'. $nombreBD .'");');

fclose($archivo);


creaBD($servidor, $usuario, $password, $nombreBD);

echo 'La instalación se ha ejecutado correctamente</br>';
echo 'Puede continuar <a href="../app/index.php">AQUÍ</a>';

   }
}

?>

</body>
</html>


<?php

function CreaBD($servidor, $usuario, $password, $nombreBD){

    $createBD = "CREATE DATABASE IF NOT EXISTS `$nombreBD` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
    USE `$nombreBD`;";
  $file = $createBD .  file_get_contents("bdjobyesterday.sql");
  $link = mysqli_connect($_POST['servidor'], $_POST['usuario'], $_POST['password']);
  $link->multi_query($file);

}

function formulario($errores=NULL){ ?>

    <?php if ($errores) :?>
        <div class="alert alert-danger" align="left">
            <?php foreach ($errores as $error) : ?>
                <li><?=$error;?></li>
            <?php endforeach;?>
        </div>
    <?php endif?>

    <div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="text-center">INSTALADOR</legend>

              <div class="form-group">
                  <label class="col-md-5 control-label" for="servidor">Nombre Base de datos</label>
                  <div class="col-md-7">
                      <input id="nombreBD" name="nombreBD" type="text" placeholder="Introduzca nombre de la base de datos" class="form-control">
                  </div>
              </div>

            <div class="form-group">
              <label class="col-md-5 control-label" for="servidor">Servidor</label>
              <div class="col-md-7">
                <input id="servidor" name="servidor" type="text" placeholder="Introduzca por servidor" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-5 control-label" for="email">Usuario</label>
              <div class="col-md-7">
                <input id="usuario" name="usuario" type="text" placeholder="Introduzca un usuario" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-5 control-label" for="message">Password</label>
              <div class="col-md-7">
                  <input id="password" name="password" type="text" placeholder="Introduzca una contraseña" class="form-control">
              </div>
            </div></br></br>

              <div class="form-group">
                  <label class="col-md-5 control-label" for="message"></label>
                  <div class="col-md-3">
                      <button type="submit" class="btn btn-primary btn-lg">Introduzca una base de datos</button>
                  </div>
              </div>

          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>

<?php } ?>