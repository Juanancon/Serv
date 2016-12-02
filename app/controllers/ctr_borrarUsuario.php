<?php
if($_SESSION['tipo']=='A') {
    include(HELPERS_PATH . 'filtrado.php');
    include(HELPERS_PATH . 'helper.php');
    include(MODELS_PATH . 'bda_ofertasmodelo.php');
    include(MODELS_PATH . 'bda_select.php');
    include(MODELS_PATH . 'bda_usuarios.php');
    $rows = obtenerUsuarioCodigo($_GET['Cod']);

    if (!$_POST) {

        include(VIEWS_PATH . 'view_borrarUsuario.php');

    } else {

        include(VIEWS_PATH . 'view_borradohecho.php');
        borraUsuario($_GET['Cod']);
        include(CTRL_PATH . 'ctr_listaUsuarios.php');

    }
}

else{

        header('location: ?controllers=ctr_login');

    }



