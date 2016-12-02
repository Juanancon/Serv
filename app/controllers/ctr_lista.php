<?php
if($_SESSION['tipo']=='A' || $_SESSION['tipo']=='P') {
//Controlador para la vista y la paginación
    include_once(MODELS_PATH . 'bda_select.php');
    include_once(MODELS_PATH . 'bda_ofertasmodelo.php');

    include_once(HELPERS_PATH . 'helper.php');

    /* Definiciones para la paginación */

// Limite del número de registros
    $TAMANO_PAGINA = 6;

//Examinamos la página a mostrar y el inicio

// define ('PROXPAG', 10);

    if (isset($_GET['pagina']))

        $pagina = $_GET['pagina'];
    else
        $pagina = 1;


    if (!$pagina) {

        $inicio = 0;
        $pagina = 1;
    } else {

        $inicio = ($pagina - 1) * $TAMANO_PAGINA;

    }

    $ofertas = obtenerOfertasPaginacion($inicio, $TAMANO_PAGINA);
    $num_total_registros = NRegistros();
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);


    /* ************ */

    include_once(VIEWS_PATH . 'view_lista.php');
}

else{

        header('location: ?controllers=ctr_login');


    }