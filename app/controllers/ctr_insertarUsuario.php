<?php
if($_SESSION['tipo']=='A') {
    include(HELPERS_PATH . 'filtrado.php');
    include(HELPERS_PATH . 'helper.php');
    include(MODELS_PATH . 'bda_ofertasmodelo.php');
    include(MODELS_PATH . 'bda_select.php');
    include(MODELS_PATH . 'bda_usuarios.php');

    if (!$_POST) {

        $errores = array();
        include_once(VIEWS_PATH . 'view_insertarUsuario.php');
    } else {

        $errores = HayErroresUsuarios();

        if ($errores) {

            include(VIEWS_PATH . 'view_insertarUsuario.php');

        } else if ($errores == false) {


            include(VIEWS_PATH . 'view_insertado.php');

            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $tipo = $_POST['tipo'];


            insertaUsuario($usuario, $password, $tipo);

            // Include lista de usuarios
            include(CTRL_PATH . 'ctr_listaUsuarios.php');

        }

    }
}
else{

        header('location: ?controllers=ctr_login');

    }
