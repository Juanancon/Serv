<?php
include_once (MODELS_PATH . 'bda_sg.php');

function datosUsuario($usuario){

    $sql = 'SELECT * FROM tbl_usuario WHERE usuario = "' . $usuario . '"';
    $bd = Db::getInstance();

    $rs=$bd->Consulta($sql);

/*
    /*Realizamos un bucle para ir obteniendo los resultados*/
    $reg = $bd->LeeRegistro($rs);

    return $reg;

}

//Función para comprobar que el logueo es correcto
function login($usuario, $password){

    $sql = 'SELECT * FROM tbl_usuario WHERE usuario = "' . $usuario . '"';
    $bd = Db::getInstance();

    $rs = $bd->Consulta($sql);

   $reg = $bd->LeeRegistro($rs);

   // $reg = DatosUsuario($usuario);

    if ($reg /* Existe el usuario */ ){

       if($reg['password'] == $password){

            $_SESSION['conectado']= TRUE;
            $_SESSION['tipo'] = $reg['tipo'];
            $_SESSION['usuario'] = $reg['usuario'];
            $_SESSION["hora"] = date("H:i");

        }

        else{
            // La clave no es correcta
            return FALSE;
        }

    }
    else {
        // No existe el usuario
        return FALSE;
    }

}

