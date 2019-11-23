<?php
//Clase : PROF_Espacio_Controller
//Creado el : 4-10-2019
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------

	/*session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}
	
*/
	if( isset($_SESSION['login']) ) header('Location:../index.php');

	include '../View/PROF_ESPACIO_SHOWCURRENT_View.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';  
	include '../View/PROF_ESPACIO_SEARCH_View.php';  
	include '../View/PROF_ESPACIO_DELETE_View.php';	
	include '../View/PROF_ESPACIO_EDIT_View.php';  
	include '../View/PROF_ESPACIO_ADD_View.php';   
	include '../Model/PROF_ESPACIO_Model.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROF_ESPACIO y la devuelve
	function get_data_form(){
		if (!isset($_REQUEST['DNI'])) $_REQUEST['DNI'] = null;
		if (!isset($_REQUEST['codESPACIO'])) $_REQUEST['codESPACIO'] = null;

		return new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['codESPACIO']);

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de PROF_ESPACIO
					$datos = new PROF_ESPACIO_Model('','',''); // model del que sacaremos los datos para añadir
					$profesores = $datos->getProfesores(); // obtengo la lista de los profesores 
					$ESPACIOes = $datos->getEspacios(); // obtengo la lista de los profesores 
					new PROF_ESPACIO_ADD($profesores,$ESPACIOes);
				}
				else{
					$PROF_ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROF_ESPACIO->ADD();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;

			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['codE'],'');
					$valores = $PROF_ESPACIO->RellenaDatos($_REQUEST['DNI'],$_REQUEST['codE']);
					$profesores = $PROF_ESPACIO->getProfesores(); // obtengo la lista de los profesores 
					$ESPACIOes = $PROF_ESPACIO->getEspacios(); // obtengo la lista de los profesores 
					new PROF_ESPACIO_DELETE($valores,$profesores,$ESPACIOes); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROF_ESPACIO = get_data_form();
					$respuesta = $PROF_ESPACIO->DELETE();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;

			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['codE'],''); // Creo el objeto
					$valores = $PROF_ESPACIO->RellenaDatos($_REQUEST['DNI'],$_REQUEST['codE']); // obtengo todos los datos de la tupla
					$profesores = $PROF_ESPACIO->getProfesores(); // obtengo la lista de los profesores 
					$ESPACIOes = $PROF_ESPACIO->getEspacios(); // obtengo la lista de los profesores 

					new PROF_ESPACIO_EDIT($valores,$profesores,$ESPACIOes); //invoco la vista de edit con los datos precargados
				}
				else{

					$PROF_ESPACIO = get_data_form(); //recojo los valores del formulario
					$respuesta = $PROF_ESPACIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}

				break;

			case 'SEARCH':
				if (!$_POST){
					$datos = new PROF_ESPACIO_Model("","","");
					$profesores = $datos->getProfesores(); // obtengo la lista de los profesores 
					$ESPACIOes = $datos->getEspacios(); // obtengo la lista de los profesores 

					new PROF_ESPACIO_SEARCH($profesores,$ESPACIOes);
				}
				else{
					$PROF_ESPACIO = get_data_form();
					$datos = $PROF_ESPACIO->SEARCH();
					new PROF_ESPACIO_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['codE'],'');
				$valores = $PROF_ESPACIO->RellenaDatos($_REQUEST['DNI'],$_REQUEST['codE']);
				new PROF_ESPACIO_SHOWCURRENT($valores);
				break;

			default:

				$PROF_ESPACIO = get_data_form();
				$datos = $PROF_ESPACIO->SHOW_ALL();
				new PROF_ESPACIO_SHOWALL($datos);
		}

?>
