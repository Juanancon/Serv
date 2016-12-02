<?php
include_once 'bda_sg.php';

/* Control de ofertas */

if (!defined('insertaOferta')) {

    /**
     * Función que nos va a insertar una oferta
     * @param $descripcion
     * @param $nombre
     * @param $telefono
     * @param $correo
     * @param $direccion
     * @param $poblacion
     * @param $CP
     * @param $provincia
     * @param $estado
     * @param $fechatope
     * @param $psicologo
     * @param $seleccionado
     * @param $otrosdatos
     */
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
 * Borra una oferta sabiendo su código, que recibiremos en un campo oculto a través del formulario
 * @param $Cod
 */
function borraOferta($Cod)
{

    $sql = 'DELETE FROM TBL_OFERTA WHERE Cod = "' . $Cod . '";';

    $bd = Db::getInstance();
    $bd->ejecutar($sql);

}

/**
 * Función que permitirá a un administrador borrar una oferta
 * @param $Cod
 * @param $descripcion
 * @param $nombre
 * @param $telefono
 * @param $correo
 * @param $direccion
 * @param $poblacion
 * @param $CP
 * @param $provincia
 * @param $estado
 * @param $fechatope
 * @param $psicologo
 * @param $seleccionado
 * @param $otrosdatos
 */
function modificaOferta($Cod, $descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado,
                        $fechatope, $psicologo, $seleccionado, $otrosdatos)
{

    $sql = 'UPDATE TBL_OFERTA SET descripcion = "' . $descripcion . '", nombre = "' . $nombre . '", telefono = "' . $telefono . '", 
    correo = "' . $correo . '", direccion = "' . $direccion . '", poblacion = "' . $poblacion . '", CP = "' . $CP . '", estado = "' . $estado . '", 
    provincia = "' . $provincia . '", fechatope = "' . $fechatope . '", psicologo = "' . $psicologo . '", seleccionado = "' . $seleccionado . '", 
    otrosdatos = "' . $otrosdatos . '" WHERE Cod = "' . $Cod . '";';

    $bd = Db::getInstance();
    $bd->ejecutar($sql);

}

/**
 * La función que permitirá a un psicólogo modificar una oferta
 * @param $Cod
 * @param $estado
 * @param $seleccionado
 * @param $otrosdatos
 */
function modificaOfertaPsico($Cod, $estado, $seleccionado, $otrosdatos)
{

    $sql = 'UPDATE tbl_oferta SET estado = "' . $estado . '", seleccionado = "' . $seleccionado . '", 
    otrosdatos = "' . $otrosdatos . '" WHERE Cod = "' . $Cod . '";';

    $bd = Db::getInstance();
    $bd->ejecutar($sql);

}

/* ************************** */

/**
 * Query que nos va a buscar una oferta según los parámetros introducidos en un array
 * @param $criterios
 * @return array
 */
function buscarOferta($inicio, $TAMANO_PAGINA, $criterios)
{

    $criteriosAND = implode(' AND ', $criterios);

    $sql = 'SELECT *, DATE_FORMAT(fechatope, "%d/%m/%Y") as fechatope, DATE_FORMAT(fechacreacion, "%d/%m/%Y")
      as fechacreacion FROM tbl_oferta WHERE ' . $criteriosAND . ' limit ' . $inicio . ',' . $TAMANO_PAGINA;


    $bd = Db::getInstance();
    $rs = $bd->Consulta($sql);

    $ofertas = [];

    while ($reg = $bd->LeeRegistro($rs)) {

        $ofertas[] = $reg;
    }

    if (!isset($ofertas)) {

        return NULL;
    }

    return $ofertas;

}


/**
 * Función que usamos para obtener una oferta
 * @return array
 */
function obtenerOferta()
{


    $sql = 'SELECT * FROM tbl_oferta';
    $bd = Db::getInstance();


    $rs = $bd->Consulta($sql);

    $ofertas = [];

    while ($reg = $bd->LeeRegistro($rs)) {

        $ofertas[] = $reg;
    }

    return $ofertas;
}

/**
 * Función que nos obtiene las ofertas y que nos establece los límites para paginarla
 * @param $inicio
 * @param $TAMANO_PAGINA
 * @return array
 */
function obtenerOfertasPaginacion($inicio, $TAMANO_PAGINA)
{

    $sql = 'SELECT *, DATE_FORMAT(fechatope, "%d/%m/%Y") as fechatope, DATE_FORMAT(fechacreacion, "%d/%m/%Y") as fechacreacion
    FROM tbl_oferta limit ' . $inicio . ',' . $TAMANO_PAGINA;
    $bd = Db::getInstance();
    $rs = $rs = $bd->Consulta($sql);

    $ofertas = [];
    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg = $bd->LeeRegistro($rs)) {

        $ofertas[] = $reg;
    }

    return $ofertas;

}

/**
 * Devuelve el número de registros totales de una oferta
 * @return Array
 */
function NRegistros()
{

    $sql = 'SELECT count(*) as total FROM tbl_oferta';
    $bd = Db::getInstance();

    $rs = $bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg = $bd->LeeRegistro($rs)) {

        $registros = $reg;
    }

    return $registros["total"];

}

/**
 * Función para la paginación de la búsqueda que nos devuelve el total de registros
 * @param $criterios
 * @return mixed
 */
function NRegistrosBusqueda($criterios)
{

    $registros["total"] = "";
    $criteriosAND = implode(' AND ', $criterios);

    $sql = "SELECT count(*) as total FROM tbl_oferta WHERE " . $criteriosAND . ";";

    $bd = Db::getInstance();

    $rs = $bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg = $bd->LeeRegistro($rs)) {

        $registros = $reg;
    }

    return $registros["total"];

}

/**
 * Función que usamos para obtener una oferta a través de un código
 * @param $Cod
 * @return array
 */
function obtenerOfertaCodigo($Cod)
{

    /*Creamos una query sencilla*/
    $sql = 'SELECT *, DATE_FORMAT(fechatope, "%d/%m/%Y") as fechatope, DATE_FORMAT(fechacreacion, "%d/%m/%Y") 
    as fechacreacion FROM tbl_oferta WHERE Cod = "' . $Cod . '"';
    $bd = Db::getInstance();

    /*Ejecutamos la query ASI DEBERIA FUNCIONAR */
    $rs = $bd->Consulta($sql);

    $ofertas = [];
    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg = $bd->LeeRegistro($rs)) {

        $ofertas[] = $reg;
    }

    return $ofertas;

}

