<?php
include_once (HELPERS_PATH . 'filtrado.php');
include_once (HELPERS_PATH . 'helper.php');
require (MODELS_PATH . 'bda_ofertasmodelo.php');
include_once (MODELS_PATH . 'bda_select.php');
$rows = obtenerOfertaCodigo($_GET['Cod']);

if (! $_POST) {


    include (VIEWS_PATH . 'view_PSICOmodificar.php');

}
else{


        include (VIEWS_PATH . 'view_sehamodificado.php');


        $estado = $_POST['estado'];
        $seleccionado = $_POST['seleccionado'];
        $otrosdatos = $_POST['otrosdatos'];

        modificaOfertaPsico($_GET['Cod'], $estado, $seleccionado, $otrosdatos);


        include (CTRL_PATH . 'ctr_PSICOlista.php');


}

