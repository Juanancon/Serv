<?php
if($_SESSION['tipo']=='A') {
    include(HELPERS_PATH . 'filtrado.php');
    include(HELPERS_PATH . 'helper.php');
    require(MODELS_PATH . 'bda_ofertasmodelo.php');
    include_once(MODELS_PATH . 'bda_select.php');
    $rows = obtenerOfertaCodigo($_GET['Cod']);

    if (!$_POST) {

        $errores = array();

        include(VIEWS_PATH . 'view_modificar.php');

    } else {

        $errores = HayErrores();


        if ($errores) {

            include(VIEWS_PATH . 'view_modificar.php');

        } else if ($errores == false) {

            include(VIEWS_PATH . 'view_sehamodificado.php');

            $descripcion = $_POST['descripcion'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $poblacion = $_POST['poblacion'];
            $CP = $_POST['CP'];
            $provincia = $_POST['provincia'];
            $estado = $_POST['estado'];
            $fechatope = date('Y-d-m', strtotime($_POST['fechatope']));
            $psicologo = $_POST['psicologo'];
            $seleccionado = $_POST['seleccionado'];
            $otrosdatos = $_POST['otrosdatos'];

            modificaOferta($_GET['Cod'], $descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado,
                $fechatope, $psicologo, $seleccionado, $otrosdatos);


            include(CTRL_PATH . 'ctr_lista.php');

        }
    }
}

else{

        header('location: ?controllers=ctr_login');


    }

