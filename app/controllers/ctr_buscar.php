<?php

if($_SESSION['tipo']=='A' || $_SESSION['tipo']=='P') {
    include(HELPERS_PATH . 'filtrado.php');
    include(HELPERS_PATH . 'helper.php');
    include(MODELS_PATH . 'bda_ofertasmodelo.php');
    include(MODELS_PATH . 'bda_select.php');


    if (!isset($_GET['CP'])) {

        require(VIEWS_PATH . 'view_busqueda.php');

    } else {

        $criterios = [];
        $CP = $_GET['CP'];
        $telefono = $_GET['telefono'];
        $psicologo = $_GET['psicologo'];

        $busqueda1 = $_GET['busqueda1'];
        $busqueda2 = $_GET['busqueda2'];
        $busqueda3 = $_GET['busqueda3'];

        if (!$_GET['CP'] == '') {

            if ($busqueda1 == 'LIKE') {

                $condicion1 = 'CP LIKE "%' . $CP . '%"';

            } else if ($busqueda1 == '=') {

                $condicion1 = 'CP = "' . $CP . '"';

            } else if ($busqueda1 == '>') {

                $condicion1 = 'CP > "' . $CP . '"';

            } else if ($busqueda1 == '<') {

                $condicion1 = 'CP < "' . $CP . '"';

            }


            $criterios[] = $condicion1;

        }


        if (!$_GET['telefono'] == '') {


            if ($busqueda2 == 'LIKE') {

                $condicion2 = 'telefono LIKE "%' . $telefono . '%"';

            } else if ($busqueda2 == '=') {

                $condicion2 = 'telefono = "' . $telefono . '"';

            } else if ($busqueda2 == '>') {

                $condicion2 = 'telefono > "' . $telefono . '"';

            } else if ($busqueda2 == '<') {

                $condicion2 = 'telefono < "' . $telefono . '";';

            }

            $criterios[] = $condicion2;

        }

        if (!$_GET['psicologo'] == '') {


            if ($busqueda3 == 'LIKE') {

                $condicion3 = 'psicologo LIKE "%' . $psicologo . '%"';

            } else if ($busqueda3 == '=') {

                $condicion3 = 'psicologo = "' . $psicologo . '"';

            } else if ($busqueda3 == '>') {

                $condicion3 = 'psicologo > "' . $psicologo . '"';

            } else if ($busqueda3 == '<') {

                $condicion3 = 'psicologo < "' . $psicologo . '"';

            }

            $criterios[] = $condicion3;

        }


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


        $ofertas = buscarOferta($inicio, $TAMANO_PAGINA, $criterios);
        $num_total_registros = NRegistrosBusqueda($criterios);
        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

        include_once(VIEWS_PATH . 'view_busqueda.php');

    }
}
else{

        header('location: ?controllers=ctr_login');

    }