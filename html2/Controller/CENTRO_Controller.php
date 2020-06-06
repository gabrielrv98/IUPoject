<?php

//Clase : CENTRO_Controller
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

	include '../View/CENTRO_SHOWCURRENT_View.php';
	include '../View/CENTRO_SHOWALL_View.php';  
	include '../View/CENTRO_SEARCH_View.php';  
	include '../View/CENTRO_DELETE_View.php';	
	include '../View/CENTRO_EDIT_View.php';  
	include '../View/CENTRO_ADD_View.php';   
	include '../Model/CENTRO_Model.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CENTRO y la devuelve
	function get_data_form(){
		if (!isset($_REQUEST['centro'])) $_REQUEST['centro'] = null;
		if (!isset($_REQUEST['edificio'])) $_REQUEST['edificio'] = null;
		if (!isset($_REQUEST['nombre'])) $_REQUEST['nombre'] = null;
		if (!isset($_REQUEST['direccion'])) $_REQUEST['direccion'] = null;
		if (!isset($_REQUEST['responsable'])) $_REQUEST['responsable'] = null;

		return new CENTRO_Model($_REQUEST['centro'],$_REQUEST['edificio'],$_REQUEST['nombre'],$_REQUEST['direccion'],$_REQUEST['responsable']);

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					$centro = new CENTRO_Model("","","","","");
					$datos = $centro->getEdificios();
					new CENTRO_ADD($datos);
				}
				else{
					$CENTRO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $CENTRO->ADD();
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;

			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$CENTRO = new CENTRO_Model($_REQUEST['centro'],'','','','');
					$valores = $CENTRO->RellenaDatos($_REQUEST['centro']);
					new CENTRO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$CENTRO = get_data_form();
					$respuesta = $CENTRO->DELETE();
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;

			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$CENTRO = new CENTRO_Model($_REQUEST['centro'],'','','',''); // Creo el objeto
					$valores = $CENTRO->RellenaDatos($_REQUEST['centro']); // obtengo todos los datos de la tupla
					new CENTRO_EDIT($valores); //invoco la vista de edit con los datos precargados
				}
				else{

					$CENTRO = get_data_form(); //recojo los valores del formulario
					$respuesta = $CENTRO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}

				break;

			case 'SEARCH':
				if (!$_POST){
					$centro = new CENTRO_Model("","","","","");
					$datos = $centro->getEdificios();
					new CENTRO_SEARCH($datos);
				}
				else{
					$CENTRO = get_data_form(); //se recojen los valores
					$datos = $CENTRO->SEARCH(); //se buscan los valores en la base de datos
					new CENTRO_SHOWALL($datos); //se mandan los vaores al showall
				}
				break;

			case 'SHOWCURRENT':
				$CENTRO = new CENTRO_Model($_REQUEST['centro'],'','','','','','');//se crea el modelo
				$valores = $CENTRO->RellenaDatos($_REQUEST['centro']);//se rellenan los datos
				$titulaciones = $CENTRO->getTitulaciones();
				$espacios = $CENTRO->getEspacios();
				new CENTRO_SHOWCURRENT($valores,$titulaciones,$espacios);//se muestran
				break;

			default:

				$CENTRO = get_data_form();
				$datos = $CENTRO->SHOW_ALL();
				new CENTRO_SHOWALL($datos);
		}

?>
