<?php
include_once (HELPERS_PATH . 'filtrado.php');
include_once (HELPERS_PATH . 'helper.php');
include_once (MODELS_PATH . 'bda_ofertasmodelo.php');
include_once (MODELS_PATH . 'bda_select.php');

$rows = obtenerOfertaCodigo($_GET['Cod']);

include_once (VIEWS_PATH . 'view_info.php');


