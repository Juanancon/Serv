<?php

// Función que nos va a devolver el valor de un campo por defecto, dependiendo si lo escrito por
// el usuario tiene errores o si en cambio dicho campo se dejo vacío
function VP($nombreCampo, $valorPorDefecto='')
{
    if (isset($_POST[$nombreCampo]))
        return $_POST[$nombreCampo];
    else
        return $valorPorDefecto;
}

// Función para filtrar si hay un campo vacío
function CampoVacio($campo)
{
    if (empty(trim($campo))) {
        return true;
    } else {

        return false;
    }

}

function arrayOfertas($descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado, $fechatope,
                      $psicologo, $seleccionado, $otrosdatos )
{

    $Array = array(
    'descripcion' => $descripcion,
    'descripcion' => $descripcion,
    'nombre' => $nombre,
    'telefono' => $telefono,
    'correo' => $correo,
    'direccion' => $direccion,
    'poblacion' => $poblacion,
    'CP' => $CP,
    'provincia' => $provincia,
    'estado' => $estado,
    'fechatope' => date('Y-d-m',strtotime($_POST['fechatope'])),
    'psicologo' => $psicologo,
    'seleccionado' => $seleccionado,
    'otrosdatos' => $otrosdatos
    );

    return $Array;

}

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

