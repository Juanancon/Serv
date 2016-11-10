<?php

	//Función que nos devuelve los errores que hay
function HayErrores(){
	$error = false;
	$listaerrores = [];


			// Corrigiendo, ya no tendría que poner el isset
			if (is_numeric(VP($_POST['descripcion'])) || CampoVacio($_POST['descripcion'])) {
			
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

