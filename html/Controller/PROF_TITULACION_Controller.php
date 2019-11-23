<?php
//Clase : PROF_TITULACION_Controller
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

	include '../View/PROF_TITULACION_SHOWCURRENT_View.php';
	include '../View/PROF_TITULACION_SHOWALL_View.php';  
	include '../View/PROF_TITULACION_SEARCH_View.php';  
	include '../View/PROF_TITULACION_DELETE_View.php';	
	include '../View/PROF_TITULACION_EDIT_View.php';  
	include '../View/PROF_TITULACION_ADD_View.php';   
	include '../Model/PROF_TITULACION_Model.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROF_TITULACION y la devuelve
	function get_data_form(){
		if (!isset($_REQUEST['DNI'])) $_REQUEST['DNI'] = null;
		if (!isset($_REQUEST['codTitulacion'])) $_REQUEST['codTitulacion'] = null;
		if (!isset($_REQUEST['anhoAcademico'])) $_REQUEST['anhoAcademico'] = null;

		return new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['codTitulacion'],$_REQUEST['anhoAcademico']);

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de PROF_TITULACION
					$datos = new PROF_TITULACION_Model('','',''); // model del que sacaremos los datos para añadir
					$profesores = $datos->getProfesores(); // obtengo la lista de los profesores 
					$Titulaciones = $datos->getTitulaciones(); // obtengo la lista de los profesores 
					new PROF_TITULACION_ADD($profesores,$Titulaciones);
				}
				else{
					$PROF_TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROF_TITULACION->ADD();
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}
				break;

			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['codT'],'');
					$valores = $PROF_TITULACION->RellenaDatos($_REQUEST['DNI'],$_REQUEST['codT']);
					$profesores = $PROF_TITULACION->getProfesores(); // obtengo la lista de los profesores 
					$Titulaciones = $PROF_TITULACION->getTitulaciones(); // obtengo la lista de los profesores 
					new PROF_TITULACION_DELETE($valores,$profesores,$Titulaciones); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROF_TITULACION = get_data_form();
					$respuesta = $PROF_TITULACION->DELETE();
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}
				break;

			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['codT'],''); // Creo el objeto
					$valores = $PROF_TITULACION->RellenaDatos($_REQUEST['DNI'],$_REQUEST['codT']); // obtengo todos los datos de la tupla
					$profesores = $PROF_TITULACION->getProfesores(); // obtengo la lista de los profesores 
					$Titulaciones = $PROF_TITULACION->getTitulaciones(); // obtengo la lista de los profesores 

					new PROF_TITULACION_EDIT($valores,$profesores,$Titulaciones); //invoco la vista de edit con los datos precargados
				}
				else{

					$PROF_TITULACION = get_data_form(); //recojo los valores del formulario
					$respuesta = $PROF_TITULACION->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}

				break;

			case 'SEARCH':
				if (!$_POST){
					$datos = new PROF_TITULACION_Model("","","");
					$profesores = $datos->getProfesores(); // obtengo la lista de los profesores 
					$Titulaciones = $datos->getTitulaciones(); // obtengo la lista de los profesores 

					new PROF_TITULACION_SEARCH($profesores,$Titulaciones);
				}
				else{
					$PROF_TITULACION = get_data_form();
					$datos = $PROF_TITULACION->SEARCH();
					new PROF_TITULACION_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['codT'],'');
				$valores = $PROF_TITULACION->RellenaDatos($_REQUEST['DNI'],$_REQUEST['codT']);
				new PROF_TITULACION_SHOWCURRENT($valores);
				break;

			default:

				$PROF_TITULACION = get_data_form();
				$datos = $PROF_TITULACION->SHOW_ALL();
				new PROF_TITULACION_SHOWALL($datos);
		}

?>
