<?php
include_once 'bda_sg.php';

/* Funciones control usuarios */

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

/* Paginación */

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


function NRegistrosUsuarios(){

    $sql = 'SELECT count(*) as total FROM tbl_usuario';
    $bd = Db::getInstance();

    $rs=$bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    $reg=$bd->LeeRegistro($rs);


    return $reg["total"];

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
}


