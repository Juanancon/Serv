<?php
include_once __DIR__ . "/../helper/filtrado.php";
include_once __DIR__ . "/../helper/helper.php";
require_once __DIR__ . "/../models/bda_ofertasmodelo.php";
include_once __DIR__ . "/../models/bda_select.php";

if (! $_POST){

    $errores=array();
    include_once __DIR__ . '/../views/view_modificar.php';}

else{

    $errores=HayErrores();

    if ($errores) {

        include __DIR__ . '/../views/view_modificar.php';

    }

    else if($errores == false){

        include __DIR__  . '/../views/view_modificar.php';
        include_once __DIR__ . '/../models/bda_ofertasmodelo.php';

        $descripcion = $_POST['descripcion'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $poblacion = $_POST['poblacion'];
        $CP = $_POST['CP'];
        $provincia = $_POST['provincia'];
        $estado = $_POST['estado'];
        $fechatope = date('Y-d-m',strtotime($_POST['fechatope']));
        $psicologo = $_POST['psicologo'];
        $seleccionado = $_POST['seleccionado'];
        $otrosdatos = $_POST['otrosdatos'];

        modificaOferta($descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado,
            $fechatope, $psicologo, $seleccionado, $otrosdatos);}

}