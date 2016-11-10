// Variables de la agenda
var nombre = document.getElementById("txtnombre");
var apellidos = document.getElementById("txtapellidos");
var telefono = document.getElementById("txttelefono");
var fechanacimiento = document.getElementById("txtnacimiento");

var contactos = [];

//Array donde se guardan las personas



// Constructor de la clase
function Persona(nombre, apellidos, telefono, fechanacimiento){

this.nombre = nombre;
this.apellidos = apellidos;
this.telefono = telefono;	
this.fechanacimiento = fechanacimiento;	
	
}

// Inicialización de las clases

persona1 = new Persona('Juan Antonio', 'Nuñez', '698451258', '11/01/1984');
//contactos[0] = persona1;
contactos.push(persona1);
persona2 = new Persona('Josue', 'Pineapple', '654654125', '20/02/1992');
contactos.push(persona2);
persona3 = new Persona('Emilio', 'Feliciano Cabezas', '715669854', '19/11/1998');
contactos.push(persona3);
persona4 = new Persona('Jesus', 'Gonzalez', '11235698', '11/01/1984');
contactos.push(persona4);


function Guardar(){


	
}

function Muestraresumen(){
	
	// el getelementbyid es para poder concatenar contenido con etiquetas html
	
	document.getElementById("resumen").innerHTML += '<tr><td>Hola</td></tr>';
	/*for each (var contactos in obj){ 
	
	
	 getElementById("resumen").innerHTML += <tr> 
                <td>contactos.nombre</td>          
                <td>contactos.apellidos</td>                          
                <td>contactos.telefono</td>
                <td>contactos.fechanacimiento</td>                          
            </tr>
			
		}	*/
}

