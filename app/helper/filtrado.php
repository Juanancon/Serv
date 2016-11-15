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

			if (is_numeric(VP($_POST['nombre'])) || CampoVacio($_POST['nombre'])) {
			
			$error = true;
			$listaerrores[] = 'El nombre no puede ser un número estar vacío';
			}	

			if (isset($_POST['telefono']) && !is_numeric($_POST['telefono'])) {
			
			$error = true;
			$listaerrores[] = 'El teléfono ha de ser un número';
			}

			if (isset($_POST['CP']) && !preg_match($filtroCP, $_POST['CP']) || strlen($_POST['CP']) != 5){

			$error = true;
			$listaerrores[] = 'El campo código postal ha de ser numérico y con 5 cifras';

			}

			if (CampoVacio($_POST['correo']) || !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
			
			$error = true;
			$listaerrores[] = 'El correo tiene caracteres inválidos o esta vacío';
			}

			//No he puesto nada en provincia porque en el creaselect no hay lugar a errores

			if (is_numeric($_POST['poblacion'])) {
			
			$error = true;
			$listaerrores = 'La población tiene caracteres no puede ser un número';
			}	

			// No hace falta estado de la oferta en este filtro

			if (is_numeric($_POST['fechatope']) || CampoVacio($_POST['fechatope']) || !DateTime::createFromFormat('d/m/Y',
					$_POST['fechatope'])) {
					
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
			
			return $listaerrores;
}

?>

