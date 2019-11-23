<?php
//Clase : TITULACION_Controller
//Creado el : 2-10-2019
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

	include '../View/TITULACION_SHOWCURRENT_View.php';
	include '../View/TITULACION_SHOWALL_View.php';  
	include '../View/TITULACION_SEARCH_View.php';  
	include '../View/TITULACION_DELETE_View.php';	
	include '../View/TITULACION_EDIT_View.php';  
	include '../View/TITULACION_ADD_View.php';   
	include '../Model/TITULACION_Model.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia TITULACION y la devuelve
	function get_data_form(){

		if (!isset($_REQUEST['titulacion'])) $_REQUEST['titulacion'] = null;
		if (!isset($_REQUEST['centro'])) $_REQUEST['centro'] = null;
		if (!isset($_REQUEST['nameT'])) $_REQUEST['nameT'] = null;
		if (!isset($_REQUEST['responsable'])) $_REQUEST['responsable'] = null;

		return new TITULACION_Model($_REQUEST['titulacion'],$_REQUEST['centro'],$_REQUEST['nameT'],$_REQUEST['responsable']);

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					$obj = new TITULACION_Model("","","","");
					$datos = $obj->getCentros();
					new TITULACION_ADD($datos);
				}
				else{
					$TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $TITULACION->ADD();
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
				}
				break;

			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','','');
					$valores = $TITULACION->RellenaDatos($_REQUEST['CODTITULACION']);
					new TITULACION_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$TITULACION = get_data_form();
					$respuesta = $TITULACION->DELETE();
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
				}
				break;

			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','',''); // Creo el objeto
					$valores = $TITULACION->RellenaDatos($_REQUEST['CODTITULACION']); // obtengo todos los datos de la tupla
					new TITULACION_EDIT($valores); //invoco la vista de edit con los datos precargados
				}
				else{

					$TITULACION = get_data_form(); //recojo los valores del formulario

					$respuesta = $TITULACION->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
				}

				break;

			case 'SEARCH':
				if (!$_POST){
					$obj = new TITULACION_Model('','','','');
					$datos = $obj->getCentros();
					new TITULACION_SEARCH($datos);
				}
				else{
					$TITULACION = get_data_form();
					$datos = $TITULACION->SEARCH();
					new TITULACION_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','','');
				$valores = $TITULACION->RellenaDatos($_REQUEST['CODTITULACION']);
				$profesores = $TITULACION->getProfTit();
				new TITULACION_SHOWCURRENT($valores,$profesores);
				break;

			default:

				$TITULACION = get_data_form();
				$datos = $TITULACION->SHOW_ALL();
				new TITULACION_SHOWALL($datos);
		}

?>
