<?php
include_once __DIR__ . "/../helper/filtrado.php";
include_once __DIR__ . "/../helper/helper.php";
include_once __DIR__ . "/../models/bda_ofertasmodelo.php";
include_once __DIR__ . "/../models/bda_select.php";
$rows = obtenerOfertaCodigo($_GET['Cod']);

    include_once (VIEWS_PATH . 'view_info.php');


