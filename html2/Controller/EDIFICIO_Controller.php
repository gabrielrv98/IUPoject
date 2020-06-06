<?php

//Clase : Edificio_Controller
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
	include '../Functions/Authentication.php';

	if (IsAuthenticated()){
		header('Location:../index.php');
	}

	if( isset($_SESSION['login']) ) header('Location:../index.php');

	include '../View/EDIFICIO_SHOWCURRENT_View.php';
	include '../View/EDIFICIO_SHOWALL_View.php';  
	include '../View/EDIFICIO_SEARCH_View.php';  
	include '../View/EDIFICIO_DELETE_View.php';	
	include '../View/EDIFICIO_EDIT_View.php';  
	include '../View/EDIFICIO_ADD_View.php';   
	include '../Model/EDIFICIO_Model.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia EDIFICIO y la devuelve
	function get_data_form(){
		if (!isset($_REQUEST['codigo'])) $_REQUEST['codigo'] = null;
		if (!isset($_REQUEST['nombre'])) $_REQUEST['nombre'] = null;
		if (!isset($_REQUEST['direccion'])) $_REQUEST['direccion'] = null;
		if (!isset($_REQUEST['campus'])) $_REQUEST['campus'] = null;

		return new EDIFICIO_Model($_REQUEST['codigo'],$_REQUEST['nombre'],$_REQUEST['direccion'],$_REQUEST['campus']);

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					new EDIFICIO_ADD();
				}
				else{
					$EDIFICIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $EDIFICIO->ADD();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;

			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['codigo'],'','','');
					$valores = $EDIFICIO->RellenaDatos($_REQUEST['codigo']);
					new EDIFICIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$EDIFICIO = get_data_form();
					$respuesta = $EDIFICIO->DELETE();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;

			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['codigo'],'','',''); // Creo el objeto
					$valores = $EDIFICIO->RellenaDatos($_REQUEST['codigo']); // obtengo todos los datos de la tupla
					new EDIFICIO_EDIT($valores); //invoco la vista de edit con los datos precargados
				}
				else{

					$EDIFICIO = get_data_form(); //recojo los valores del formulario
					$respuesta = $EDIFICIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}

				break;

			case 'SEARCH':
				if (!$_POST){
					new EDIFICIO_SEARCH();
				}
				else{
					$EDIFICIO = get_data_form();//se recojen los valores
					$datos = $EDIFICIO->SEARCH(); //se buscan los valores en la base de datos
					new EDIFICIO_SHOWALL($datos); //se mandan los vaores al showall
				}
				break;

			case 'SHOWCURRENT':
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['codigo'],'','','','','');//se crea el modelo
				$valores = $EDIFICIO->RellenaDatos($_REQUEST['codigo']);//se rellenan los datos
				$centros = $EDIFICIO->getCentros();
				$espacios = $EDIFICIO->getEspacios();
				new EDIFICIO_SHOWCURRENT($valores, $centros,$espacios);//se muestran
				break;

			default:

				$EDIFICIO = get_data_form();
				$datos = $EDIFICIO->SHOW_ALL();
				new EDIFICIO_SHOWALL($datos);
		}

?>
