<?php
if($_SESSION['tipo']=='A') {
include (HELPERS_PATH .'filtrado.php');
include (HELPERS_PATH . 'helper.php');
require (MODELS_PATH . 'bda_ofertasmodelo.php');
require  (MODELS_PATH . 'bda_usuarios.php');
include_once (MODELS_PATH . 'bda_select.php');
$rows = obtenerUsuarioCodigo($_GET['Cod']);

if (! $_POST) {

    $errores = array();

    include (VIEWS_PATH . 'view_modificarUsuario.php');

}
else{

    $errores = HayErroresUsuarios();


    if ($errores) {

        include (VIEWS_PATH . 'view_modificarUsuario.php');

    } else if ($errores == false) {

        include (VIEWS_PATH . 'view_sehamodificado.php');

        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $tipo = $_POST['tipo'];

        modificaUsuario($_GET['Cod'], $usuario, $password, $tipo);
        include (CTRL_PATH . 'ctr_listaUsuarios.php');

    }
}
}

else{

    header('location: ?controllers=ctr_login');


}
