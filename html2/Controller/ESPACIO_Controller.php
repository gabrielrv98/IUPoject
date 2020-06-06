<?php
//Clase : Espacio_Controller
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

	include '../View/ESPACIO_SHOWCURRENT_View.php';
	include '../View/ESPACIO_SHOWALL_View.php';  
	include '../View/ESPACIO_SEARCH_View.php';  
	include '../View/ESPACIO_DELETE_View.php';	
	include '../View/ESPACIO_EDIT_View.php';  
	include '../View/ESPACIO_ADD_View.php';   
	include '../Model/ESPACIO_Model.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia ESPACIO y la devuelve
	function get_data_form(){
		if (!isset($_REQUEST['espacio'])) $_REQUEST['espacio'] = null;
		if (!isset($_REQUEST['edificio'])) $_REQUEST['edificio'] = null;
		if (!isset($_REQUEST['centro'])) $_REQUEST['centro'] = null;
		if (!isset($_REQUEST['tipo'])) $_REQUEST['tipo'] = null;
		if (!isset($_REQUEST['superficie'])) $_REQUEST['superficie'] = null;
		if (!isset($_REQUEST['nInventario'])) $_REQUEST['nInventario'] = null;

		return new ESPACIO_Model($_REQUEST['espacio'],$_REQUEST['edificio'],$_REQUEST['centro'],$_REQUEST['tipo'],$_REQUEST['superficie'],$_REQUEST['nInventario']);

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					$obj = new ESPACIO_Model('','','','','','');
					$edificios = $obj->getEdificios();//vector con los edificios
					$centros = $obj->getCentros();//vector con los centros
					new ESPACIO_ADD($centros,$edificios);
				}
				else{
					$ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $ESPACIO->ADD();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;

			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['espacio'],'','','','','');
					$valores = $ESPACIO->RellenaDatos($_REQUEST['espacio']);
					new ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$ESPACIO = get_data_form();
					$respuesta = $ESPACIO->DELETE();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;

			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['espacio'],'','','','',''); // Creo el objeto
					$valores = $ESPACIO->RellenaDatos($_REQUEST['espacio']); // obtengo todos los datos de la tupla
					$centros = $ESPACIO->getCentros();//vector con los centros
					new ESPACIO_EDIT($valores,$centros); //invoco la vista de edit con los datos precargados
				}
				else{

					$ESPACIO = get_data_form(); //recojo los valores del formulario
					$respuesta = $ESPACIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}

				break;

			case 'SEARCH':
				if (!$_POST){
					$obj = new ESPACIO_Model('','','','','','');
					$edificios = $obj->getEdificios();//vector con los edificios
					$centros = $obj->getCentros();//vector con los centros
					new ESPACIO_SEARCH($centros,$edificios);
				}
				else{
					$ESPACIO = get_data_form();//se recojen los valores
					$datos = $ESPACIO->SEARCH(); //se buscan los valores en la base de datos
					new ESPACIO_SHOWALL($datos); //se mandan los vaores al showall
				}
				break;

			case 'SHOWCURRENT':
				$ESPACIO = new ESPACIO_Model($_REQUEST['espacio'],'','','','','');//se crea el modelo
				$valores = $ESPACIO->RellenaDatos($_REQUEST['espacio']);//se rellenan los datos
				$profesores = $ESPACIO->getProfesores();
				new ESPACIO_SHOWCURRENT($valores,$profesores);//se muestran
				break;

			default:

				$ESPACIO = get_data_form();
				$datos = $ESPACIO->SHOW_ALL();
				new ESPACIO_SHOWALL($datos);
		}

?>
