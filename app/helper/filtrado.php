<?php

	//Función que nos devuelve los errores que hay
function HayErrores(){

	$error = false;
	$filtroTLF = '/^[9|6|7][0-9]{8}$/';
	$filtroCP = '/[0-9]{5}/';
	$listaerrores = [];


			// Corrigiendo, ya no tendría que poner el isset
			if (is_numeric(VP('descripcion')) || CampoVacio(VP('descripcion'))) { // Asi si
			
			$error = true;
			$listaerrores[] = 'La descripción no puede ser un número o estar vacío';
			}

			if (is_numeric(VP(('nombre'))) || CampoVacio(VP('nombre'))) {
			
			$error = true;
			$listaerrores[] = 'El nombre no puede ser un número estar vacío';
			}	

			if (!is_numeric(VP(('telefono'))) || CampoVacio(VP('telefono'))) {
			
			$error = true;
			$listaerrores[] = 'El teléfono ha de ser un número';
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


			if (is_numeric($_POST['poblacion'])) {
			
			$error = true;
			$listaerrores = 'La población tiene caracteres no puede ser un número';
			}	


			if (is_numeric($_POST['fechatope']) || CampoVacio($_POST['fechatope']) || !DateTime::createFromFormat('d/m/Y',
					$_POST['fechatope']) ) {
					
				$error = true;
				$listaerrores[] = "La fecha sólo se acepta en formato 'd/m/Y' ";
			}

			if (is_numeric($_POST['psicologo'])) {

				$error = true;
				$listaerrores[] = 'El campo psicologo no puede ser un número estar vacío';
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
	$filtroTLF = '/^[9|6|7][0-9]{8}$/';
	$filtroCP = '/[0-9]{5}/';
	$listaerrores = [];

	/* Filtrado para la inserción del usuario */

	if (CampoVacio(VP('usuario'))){

		$error = true;
		$listaerrores[] = "El nombre de usuario no puede quedar vacío";

	}

	if (CampoVacio(VP('password'))){

		$error = true;
		$listaerrores[] = "El campo password no puede quedar vacío";

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


?>