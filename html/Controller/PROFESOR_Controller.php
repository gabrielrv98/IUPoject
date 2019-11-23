<?php
//Clase : Profesor_Controller
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

	include '../View/PROFESOR_SHOWCURRENT_View.php';
	include '../View/PROFESOR_SHOWALL_View.php';  
	include '../View/PROFESOR_SEARCH_View.php';  
	include '../View/PROFESOR_DELETE_View.php';	
	include '../View/PROFESOR_EDIT_View.php';  
	include '../View/PROFESOR_ADD_View.php';   
	include '../Model/PROFESOR_Model.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PROFESOR y la devuelve
	function get_data_form(){

		if (!isset($_REQUEST['DNI'])) $_REQUEST['DNI'] = null;
		if (!isset($_REQUEST['nombre'])) $_REQUEST['nombre'] = null;
		if (!isset($_REQUEST['apellido'])) $_REQUEST['apellido'] = null;
		if (!isset($_REQUEST['area'])) $_REQUEST['area'] = null;
		if (!isset($_REQUEST['departamento'])) $_REQUEST['departamento'] = null;

		return new PROFESOR_Model($_REQUEST['DNI'],$_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['area'],$_REQUEST['departamento']);

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					new PROFESOR_ADD();
				}
				else{
					$PROFESOR = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROFESOR->ADD();
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;

			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','','');
					$valores = $PROFESOR->RellenaDatos($_REQUEST['DNI']);
					new PROFESOR_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROFESOR = get_data_form();
					$respuesta = $PROFESOR->DELETE();
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;

			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','',''); // Creo el objeto
					$valores = $PROFESOR->RellenaDatos($_REQUEST['DNI']); // obtengo todos los datos de la tupla
					new PROFESOR_EDIT($valores); //invoco la vista de edit con los datos precargados
				}
				else{

					$PROFESOR = get_data_form(); //recojo los valores del formulario

					$respuesta = $PROFESOR->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}

				break;

			case 'SEARCH':
				if (!$_POST){
					new PROFESOR_SEARCH();
				}
				else{
					$PROFESOR = get_data_form();
					$datos = $PROFESOR->SEARCH();
					new PROFESOR_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','','');
				$valores = $PROFESOR->RellenaDatos($_REQUEST['DNI']);
				$titulaciones = $PROFESOR->getTitulaciones();
				$espacios = $PROFESOR->getEspacios();
				new PROFESOR_SHOWCURRENT($valores,$titulaciones,$espacios);
				break;

			default:

				$PROFESOR = get_data_form();
				$datos = $PROFESOR->SHOW_ALL();
				new PROFESOR_SHOWALL($datos);
		}

?>
