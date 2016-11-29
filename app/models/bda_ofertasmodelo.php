<?php
include_once 'bda_sg.php';

/* Control de ofertas */

if (! defined('insertaOferta')) {

// Función que nos inserta una oferta
    function insertaOferta($descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado,
                           $fechatope, $psicologo, $seleccionado, $otrosdatos)
    {

        $sql = 'INSERT INTO tbl_oferta VALUES("", "' . $descripcion . '", "' . $nombre . '", "' . $telefono . '", "' . $correo . '", 
    "' . $direccion . '", "' . $poblacion . '", "' . $CP . '", "' . $provincia . '", "' . $estado . '", NULL, "' . $fechatope . '", "' . $psicologo . '",
     "' . $seleccionado . '", "' . $otrosdatos . '");';

        $bd = Db::getInstance();
        $bd->ejecutar($sql);
    }
}

/**
 * Borra una oferta
 * @param $Cod
 */
function borraOferta($Cod){

 $sql = 'DELETE FROM TBL_OFERTA WHERE Cod = "'.$Cod.'";';

    $bd=Db::getInstance();
    $bd->ejecutar($sql);

}
function modificaOferta($Cod, $descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado,
                        $fechatope, $psicologo, $seleccionado, $otrosdatos){

    $sql = 'UPDATE TBL_OFERTA SET descripcion = "'.$descripcion.'", nombre = "'.$nombre.'", telefono = "'.$telefono.'", 
    correo = "'.$correo.'", direccion = "'.$direccion.'", poblacion = "'.$poblacion.'", CP = "'.$CP.'", estado = "'.$estado.'", 
    provincia = "'.$provincia.'", fechatope = "'.$fechatope.'", psicologo = "'.$psicologo.'", seleccionado = "'.$seleccionado.'", 
    otrosdatos = "'.$otrosdatos.'" WHERE Cod = "'.$Cod.'";';
    
    $bd=Db::getInstance();
    $bd->ejecutar($sql);

}

function modificaOfertaPsico($Cod, $estado, $seleccionado, $otrosdatos){

    $sql = 'UPDATE tbl_oferta SET estado = "'.$estado.'", seleccionado = "'.$seleccionado.'", 
    otrosdatos = "'.$otrosdatos.'" WHERE Cod = "'.$Cod.'";';

    $bd=Db::getInstance();
    $bd->ejecutar($sql);

}

/* ************************** */


function obtenerOferta(){

    /*Creamos una query sencilla*/
    $sql='SELECT * FROM tbl_oferta';
    $bd=Db::getInstance();

    /*Ejecutamos la query ASI DEBERIA FUNCIONAR */
    $rs=$bd->Consulta($sql);

    $ofertas = [];
    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg=$bd->LeeRegistro($rs)) {

        $ofertas[] =$reg;
    }

    return $ofertas;
}

/**
 *
 * @param $inicio
 * @param $TAMANO_PAGINA
 * @return array
 */
function obtenerOfertasPaginacion($inicio, $TAMANO_PAGINA){

    $sql = 'SELECT *, DATE_FORMAT(fechatope, "%d/%m/%Y") as fechatope, DATE_FORMAT(fechacreacion, "%d/%m/%Y") as fechacreacion
    FROM tbl_oferta limit ' . $inicio . ',' .$TAMANO_PAGINA;
    $bd = Db::getInstance();
    $rs = $rs=$bd->Consulta($sql);

    $ofertas = [];
    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg=$bd->LeeRegistro($rs)) {

        $ofertas[] = $reg;
    }

    return $ofertas;

}

/**
 * Devuelve el número de registros totales de una oferta
 * @return Array
 */
function NRegistros(){

    $sql = 'SELECT count(*) as total FROM tbl_oferta';
    $bd = Db::getInstance();

    $rs=$bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg=$bd->LeeRegistro($rs)) {

        $registros = $reg;
    }

    return $registros["total"];

}


function obtenerOfertaCodigo($Cod){

    /*Creamos una query sencilla*/
    $sql='SELECT *, DATE_FORMAT(fechatope, "%d/%m/%Y") as fechatope, DATE_FORMAT(fechacreacion, "%d/%m/%Y") 
    as fechacreacion FROM tbl_oferta WHERE Cod = "'. $Cod .'"';
    $bd=Db::getInstance();

    /*Ejecutamos la query ASI DEBERIA FUNCIONAR */
    $rs=$bd->Consulta($sql);

    $ofertas = [];
    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg=$bd->LeeRegistro($rs)) {

        $ofertas[] = $reg;
    }

    return $ofertas;

}

