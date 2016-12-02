<?php

	//Función que nos devuelve los errores que hay
function HayErrores(){

$error = false;
$listaerrores = [];

    // Corrigiendo, ya no tendría que poner el isset
    if (is_numeric(VP('descripcion')) || CampoVacio(VP('descripcion'))) {

    $error = true;
    $listaerrores[] = 'La descripción no puede ser un número o estar vacío';
    }

    if (is_numeric(VP(('nombre'))) || CampoVacio(VP('nombre'))) {

    $error = true;
    $listaerrores[] = 'El nombre no puede ser un número estar vacío';
    }


    if(!is_numeric(trim(VP('telefono'))) || CampoVacio(VP('telefono')) || VP('telefono') < 0  ){

        $error = true;
        $listaerrores[] = 'El teléfono no puede estar vacío o tener caracteres incorrectos';

    }


    if (isset($_POST['CP'])){

        if (isset($_POST["CP"]) && !CampoVacio(VP("CP"))) {
            if (!filter_var(VP("CP"), FILTER_VALIDATE_INT) || strlen(VP("CP")) != 5) {

                $error = true;
                $listaerrores[] = 'El código postal ha de ser un número entero de cinco cifras';
            }
        }
    }

    if (CampoVacio(VP('correo')) || !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {

        $error = true;
        $listaerrores[] = 'El correo tiene caracteres inválidos o esta vacío';
    }

    if (is_numeric(VP('direccion'))){

        $error = true;
        $listaerrores = 'La dirección no puede ser un número';

    }

    if (is_numeric(VP('poblacion'))) {

    $error = true;
    $listaerrores = 'El campo población no puede ser un número';
    }

    if(isset($_POST['fechatope']) && !CampoVacio($_POST['fechatope'])){

        $cadena = $_POST['fechatope'];
        $micadena = str_replace("-", "/", $cadena);
        $fecha = explode("/", $micadena);


        if(count($fecha) != 3 || !is_numeric($fecha[0]) || !is_numeric($fecha[1]) || !is_numeric($fecha[2])){

            $error = true;
            $listaerrores[] = "La fecha tiene caractéres incorrectos";

        }

        else{

            $day = $fecha[0];
            $month = $fecha[1];
            $year = $fecha[2];

            if(!checkdate($month, $day, $year)){

                $error = true;
                $listaerrores[] = "No se ha introducido un día, mes o año válidos";

            }

            else{

                if(strtotime(date("m/d/Y")) >= strtotime("$fecha[1]/$fecha[0]/$fecha[2]")){

                    $error = true;
                    $listaerrores[] = "La fecha introducida es anterior a la fecha actual";
                }

            }

        }

    }

    if($_POST['provincia'] == ''){

        $error = true;
        $listaerrores[] = "Debe elegir una provincia";

    }

    if (is_numeric($_POST['psicologo'])) {

        $error = true;
        $listaerrores[] = 'El campo "psicólogo" no puede ser un número estar vacío';
    }

    if (is_numeric($_POST['seleccionado'])) {

        $error = true;
        $listaerrores[] = 'El campo "candidato seleccionado" no puede ser un número';
    }


    if (is_numeric($_POST['otrosdatos'])) {

        $error = true;
        $listaerrores[] = "El campo 'otros datos' no puede ser un número";
    }

    /* Filtrado para la inserción del usuario */

    if (CampoVacio('usuario')){

        $error = true;
        $listaerrores[] = "El nombre de usuario no puede quedar vacío";

    }

    if (CampoVacio('password')){

        $error = true;
        $listaerrores[] = "El campo password no puede quedar vacío";

    }

    if (CampoVacio('tipo')){

        $error = true;
        $listaerrores[] = "El campo tipo no puede quedar vacío";

    }

    return $listaerrores;
}

function HayErroresUsuarios(){

	$error = false;
	$listaerrores = [];


	if (CampoVacio(VP('usuario'))){

		$error = true;
		$listaerrores[] = "El nombre de usuario no puede quedar vacío";

	}

	if (CampoVacio(VP('password'))){

		$error = true;
		$listaerrores[] = "El campo password no puede quedar vacío";

	}

	if ($_POST['tipo'] == ''){

        $error = true;
        $listaerrores[] = "Elija el tipo de usuario";

    }

	return $listaerrores;
}



function HayErroresLogin($usuario, $password, $tipo=NULL){

	$error = false;
	$listaerrores = [];

	if (existe(VP('usuario'))){

			if(CampoVacio(VP('password'))){

				$error = true;
				$listaerrores[] = "El nombre de usuario no puede quedar vacío";

			}

			if (CampoVacio(VP('usuario'))){

				$error = true;
				$listaerrores[] = "El nombre de usuario no puede quedar vacío";

			}

			if (CampoVacio(VP('password'))){

				$error = true;
				$listaerrores[] = "El campo password no puede quedar vacío";
	}

}

else{

	$error = true;
	$listaerrores[] = "El usuario no existe";

}

	return $listaerrores;

}

function HayErroresmodificaPsico(){

$error = false;
$listaerrores = [];

    if (is_numeric($_POST['otrosdatos'])) {

        $error = true;
        $listaerrores[] = "El campo 'otros datos' no puede ser un número";
    }

}


function HayErroresCreandoDB(){

$error = false;
$listaerrores = [];

    if ($_POST['usuario'] != 'root'){

        $errror = true;
        $listaerrores[] = "El campo usuarío no puede quedar vacío o ser incorrecto 
        (PISTA: Es 'root' al revés)";

    }

    if ($_POST['servidor'] != 'localhost'){

        $error = true;
        $listaerrores[] = "El campo 'servidor' no puede quedar vacío o ser incorrecto.";

    }

    if( $_POST['password'] != ''){

        $errror = true;
        $listaerrores[] = "El campo password debe quedar vacío";


    }

    if(CampoVacio($_POST['nombreBD'])){

        $error = true;
        $listaerrores[]  = "La base de datos ha de tener un nombre válido";

    }

    return $listaerrores;

}



?>