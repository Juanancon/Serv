<?php
include_once 'bda_sg.php';

/* Control de usuarios */

function insertaUsuario($usuario, $password, $tipo){

$sql = 'INSERT INTO tbl_usuario VALUES("", "' . $usuario .'", "' . $password . '", "' . $tipo .'");';
$bd = Db::getInstance();
$bd->ejecutar($sql);

}

function borraUsuario($Cod){

$sql = 'DELETE FROM tbl_usuario WHERE Cod = "'.$Cod.'";';

$bd=Db::getInstance();
$bd->ejecutar($sql);

}

function modificaUsuario($Cod, $usuario, $password, $tipo){

$sql = 'UPDATE tbl_usuario SET usuario = "'.$usuario.'", password = "'.$password.'", tipo = "'.$tipo.'"
        WHERE Cod = "'.$Cod.'";';
    $bd = Db::getInstance();
    $bd -> ejecutar($sql);

}


/* ***************** */


/* Control de ofertas */

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

function obtenerUsuario(){

    /*Creamos una query sencilla*/
    $sql='SELECT * FROM tbl_usuario';
    $bd=Db::getInstance();

    /*Ejecutamos la query ASI DEBERIA FUNCIONAR */
    $rs=$bd->Consulta($sql);

    $usuarios = [];
    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg=$bd->LeeRegistro($rs)) {

        $usuarios[] =$reg;
    }

    return $usuarios;



}

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

function obtenerUsuariosPaginacion($inicio, $TAMANO_PAGINA){

    $sql = 'SELECT * FROM tbl_usuario limit ' . $inicio . ',' .$TAMANO_PAGINA;
    $bd = Db::getInstance();
    $rs = $rs=$bd->Consulta($sql);

    $usuarios = [];
    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg=$bd->LeeRegistro($rs)) {

        $usuarios[] = $reg;
    }

    return $usuarios;

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

function NRegistrosUsuarios(){

    $sql = 'SELECT count(*) as total FROM tbl_usuario';
    $bd = Db::getInstance();

    $rs=$bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    $reg=$bd->LeeRegistro($rs);


    return $reg["total"];

}

function obtenerOfertaCodigo($Cod){

    /*Creamos una query sencilla*/
    $sql='SELECT *, DATE_FORMAT(fechatope, "%d/%m/%Y") as fechatope, DATE_FORMAT(fechacreacion, "%d/%m/%Y") as fechacreacion 
FROM tbl_oferta WHERE Cod = "'. $Cod .'"';
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

function obtenerUsuarioCodigo($Cod)
{

    /*Creamos una query sencilla*/
    $sql = 'SELECT * FROM tbl_usuario WHERE Cod = "' . $Cod . '"';
    $bd = Db::getInstance();

    /*Ejecutamos la query ASI DEBERIA FUNCIONAR */
    $rs = $bd->Consulta($sql);

    $usuarios = [];
    /*Realizamos un bucle para ir obteniendo los resultados*/
    while ($reg = $bd->LeeRegistro($rs)) {

        $usuarios[] = $reg;
    }

    return $usuarios;

// Construyendola
    function devuelveConsulta($campo)
    {

        $sql = '';
        $bd = Db::getInstance();

        /*Ejecutamos la query ASI DEBERIA FUNCIONAR */
        $rs = $bd->Consulta($sql);

    }

}

