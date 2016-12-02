<?php
include_once 'bda_sg.php';

/* Funciones control usuarios */

/**
 * Función que nos inserta a un usuario en la base de datos
 * @param $usuario
 * @param $password
 * @param $tipo
 */
function insertaUsuario($usuario, $password, $tipo){

    $sql = 'INSERT INTO tbl_usuario VALUES("", "' . $usuario .'", "' . $password . '", "' . $tipo .'");';
    $bd = Db::getInstance();
    $bd->ejecutar($sql);

}

/**
 * Función que nos borra un usuario a partir del código
 * @param $Cod
 */
function borraUsuario($Cod){

    $sql = 'DELETE FROM tbl_usuario WHERE Cod = "'.$Cod.'";';

    $bd=Db::getInstance();
    $bd->ejecutar($sql);

}

/**
 * Función que usamos para modificar el usuario
 * @param $Cod
 * @param $usuario
 * @param $password
 * @param $tipo
 */
function modificaUsuario($Cod, $usuario, $password, $tipo){

    $sql = 'UPDATE tbl_usuario SET usuario = "'.$usuario.'", password = "'.$password.'", tipo = "'.$tipo.'"
        WHERE Cod = "'.$Cod.'";';
    $bd = Db::getInstance();
    $bd -> ejecutar($sql);

}

/**
 * Función que usamos para obtener un registro de usuarios
 * @return array
 */
function obtenerUsuario(){

    $sql='SELECT * FROM tbl_usuario';
    $bd=Db::getInstance();

    $rs=$bd->Consulta($sql);

    $usuarios = [];

    while ($reg=$bd->LeeRegistro($rs)) {

        $usuarios[] =$reg;
    }

    return $usuarios;

}

/* Paginación */

/**
 * Paginación de la tabla de usuarios
 * @param $inicio
 * @param $TAMANO_PAGINA
 * @return array
 */
function obtenerUsuariosPaginacion($inicio, $TAMANO_PAGINA){

    $sql = 'SELECT * FROM tbl_usuario limit ' . $inicio . ',' .$TAMANO_PAGINA;
    $bd = Db::getInstance();
    $rs = $rs=$bd->Consulta($sql);

    $usuarios = [];

    while ($reg=$bd->LeeRegistro($rs)) {

        $usuarios[] = $reg;
    }

    return $usuarios;

}

/**
 * Función para obtener el número de registros de los usuarios
 * @return mixed
 */
function NRegistrosUsuarios(){

    $sql = 'SELECT count(*) as total FROM tbl_usuario';
    $bd = Db::getInstance();

    $rs=$bd->Consulta($sql);

    $reg=$bd->LeeRegistro($rs);


    return $reg["total"];

}

/**
 * Obtener un usuario a partir de un código
 * @param $Cod
 * @return array
 */
function obtenerUsuarioCodigo($Cod)
{

    $sql = 'SELECT * FROM tbl_usuario WHERE Cod = "' . $Cod . '"';
    $bd = Db::getInstance();

    $rs = $bd->Consulta($sql);

    $usuarios = [];

    while ($reg = $bd->LeeRegistro($rs)) {

        $usuarios[] = $reg;
    }

    return $usuarios;
}

/**
 * Función para saber si un usuario inserta el mismo nombre que otro
 * @return mixed
 */
function usuariosRepetidos($usuario){

    $sql = 'SELECT count(*) as total FROM tbl_usuario WHERE usuario = "' .$usuario .'"';
    $bd = Db::getInstance();

    $rs=$bd->Consulta($sql);

    $reg=$bd->LeeRegistro($rs);

    if ($reg["total"]>0) {

        return true;
    }

    else{

        return false;
    }

}


