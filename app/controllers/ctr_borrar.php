<?php
include_once __DIR__ . "/../helper/filtrado.php";
include_once __DIR__ . "/../helper/helper.php";
include_once __DIR__ . "/../models/bda_ofertasmodelo.php";
include_once __DIR__ . "/../models/bda_select.php";
$rows = obtenerOfertaCodigo($_GET['Cod']);

if (! $_POST){

    include_once (VIEWS_PATH . 'view_borrar.php');
}

else{

    include (VIEWS_PATH . 'view_borradohecho.php');
    borraOferta($_GET['Cod']);
    include (CTRL_PATH . 'ctr_lista.php');

}




