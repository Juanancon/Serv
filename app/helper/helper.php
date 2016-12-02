<?php

/**
 * Función que devuelve los campos al realizar un POST
 * @param $nombreCampo
 * @param string $valorPorDefecto
 * @return string
 */
function VP($nombreCampo, $valorPorDefecto='')
{
    if (isset($_POST[$nombreCampo]))
        return $_POST[$nombreCampo];
    else
        return $valorPorDefecto;
}

/**
 * Función que devuelve los campos al realizar un GET
 * @param $nombreCampo
 * @param string $valorPorDefecto
 * @return string
 */
function VG($nombreCampo, $valorPorDefecto='')
{
    if (isset($_GET[$nombreCampo]))
        return $_GET[$nombreCampo];
    else
        return $valorPorDefecto;
}


/**
 * Función que nos mira si hay un campo vacío
 * @param $campo
 * @return bool
 */
function CampoVacio($campo)
{
    if (empty(trim($campo))) {
        return true;
    } else {

        return false;
    }

}

/**
 * Función que nos devuelve un string para mostrar en la tabla el estado de la oferta
 * @param $estado
 * @return string
 */
function devuelveEstado($estado){

 if ($estado == "A"){
     return "Oferta aceptada";
 }
if ($estado == "P"){
    return "Oferta pendiente";
}
if ($estado == "S") {

    return "Oferta Seleccionada";
}
if ($estado == "C"){

    return "Oferta Cancelada";

    }

}

