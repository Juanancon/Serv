<?php
include_once __DIR__ . "/../helper/filtrado.php";
include_once __DIR__ . "/../helper/helper.php";
require __DIR__ . "/../models/bda_ofertasmodelo.php";
include_once __DIR__ . "/../models/bda_select.php";
$rows = obtenerOfertaCodigo($_GET['Cod']);

if (! $_POST) {

    $errores = array();

// echo "<pre>"; print_r($rows); echo "</pre>";
    include __DIR__ . '/../views/view_modificar.php';

}
else{

        $errores = HayErrores();


        if ($errores) {

            include __DIR__ . '/../views/view_modificar.php';

        } else if ($errores == false) {

            include (VIEWS_PATH . 'view_sehamodificado.php');

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

          /*  echo modificaOferta($_GET['Cod'], $descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado,
                $fechatope, $psicologo, $seleccionado, $otrosdatos);*/

            include (CTRL_PATH . 'ctr_lista.php');

        }
    }



