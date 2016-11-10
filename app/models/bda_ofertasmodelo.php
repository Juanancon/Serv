<?php
include_once 'bda_sg.php';

if (! defined('insertaOferta')) {

    function insertaOferta($descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado,
                           $fechatope, $psicologo, $seleccionado, $otrosdatos)
    { //$of{

        $sql = 'INSERT INTO tbl_oferta VALUES("", "' . $descripcion . '", "' . $nombre . '", "' . $telefono . '", "' . $correo . '", 
    "' . $direccion . '", "' . $poblacion . '", "' . $CP . '", "' . $provincia . '", "' . $estado . '", NULL, "' . $fechatope . '", "' . $psicologo . '",
     "' . $seleccionado . '", "' . $otrosdatos . '");';

        $bd = Db::getInstance();
        $bd->ejecutar($sql);

    }

}

function borraOferta($cod){

 $sql = 'DELETE FROM TBL_OFERTA WHERE COD = "'.$cod.'";';

    $bd=Db::getInstance();
    $bd->ejecutar($sql);

}
function modificaOferta($cod, $descripcion, $nombre, $telefono, $correo, $direccion, $poblacion, $CP, $provincia, $estado,
                        $fechatope, $psicologo, $seleccionado, $otrosdatos){

    $sql = 'UPDATE TBL_OFERTA SET descripcion = "'.$descripcion.'", nombre = "'.$nombre.'", telefono = "'.$telefono.'", 
    correo = "'.$correo.'", direccion = "'.$direccion.'", poblacion = "'.$poblacion.'", CP = "'.$CP.'", 
    provincia = "'.$provincia.'", fechatope = "'.$fechatope.'", psicologo = "'.$psicologo.'", seleccionado = "'.$seleccionado.'", 
    otrosdatos = "'.$otrosdatos.'" WHERE cod = "'.$cod.'";';
    
    $bd=Db::getInstance();
    $bd->ejecutar($sql);

}

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

function obtenerOfertasPaginacion($inicio, $TAMANO_PAGINA){

    $sql = 'SELECT * FROM tbl_oferta limit ' . $inicio . ',' .$TAMANO_PAGINA;
    $bd = Db::getInstance();
    $rs = $rs=$bd->Consulta($sql);

    $ofertas = [];
    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg=$bd->LeeRegistro($rs)) {

        $ofertas[] = $reg;
    }

    return $ofertas;

}


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







