<?php
//Clase : Usuarios_Controller
//Creado el : 2-06-2020
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------
 include_once '../Model/USUARIOS_Model.php';

 session_start();
	if( isset($_SESSION['login']) ){
		$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');// se Crea el nuevo usuario
		if (!$usuario->isAdmin()){// se comprueba si es admin
			include '../View/noPermiso.php';
			new NoPermiso();
		}

	}else header('Location:../index.php');

	include '../View/USUARIOS_SHOWCURRENT_View.php';
	include '../View/USUARIOS_SHOWALL_View.php';   
	include '../View/USUARIOS_SEARCH_View.php';   
	include '../View/USUARIOS_DELETE_View.php';	 
	include '../View/USUARIOS_EDIT_View.php';   
	include '../View/USUARIOS_ADD_View.php';   
	include '../View/MESSAGE_View.php';
	

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve
	function get_data_form(){

		if (!isset($_REQUEST['login'])) $_REQUEST['login'] = null;
		if (!isset($_REQUEST['password'])) $_REQUEST['password'] = null;
		if (!isset($_REQUEST['DNI'])) $_REQUEST['DNI'] = null;
		if (!isset($_REQUEST['nombre'])) $_REQUEST['nombre'] = null;
		if (!isset($_REQUEST['apellidos'])) $_REQUEST['apellidos'] = null;
		if (!isset($_REQUEST['tlf'])) $_REQUEST['tlf'] = null;
		if (!isset($_REQUEST['email'])) $_REQUEST['email'] = null;
		if (!isset($_REQUEST['fechaNacimiento'])) $_REQUEST['fechaNacimiento'] = null;
		if (!isset($_REQUEST['alergias'])) $_REQUEST['alergias'] = null;
		if (!isset($_REQUEST['direccion'])) $_REQUEST['direccion'] = null;
		if (!isset($_REQUEST['cp'])) $_REQUEST['cp'] = null;
		if (!isset($_REQUEST['sexo'])) $_REQUEST['sexo'] = null;
		if (!isset($_REQUEST['tipo_usuario'])) $_REQUEST['tipo_usuario'] = null;
		if (!isset($_REQUEST['activado'])) $_REQUEST['activado'] = null;

		return new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['nombre'],
		$_REQUEST['apellidos'],$_REQUEST['email'],$_REQUEST['DNI'],$_REQUEST['tlf'],$_REQUEST['fechaNacimiento'],$_REQUEST['alergias'],$_REQUEST['direccion'],$_REQUEST['cp'],$_REQUEST['sexo'],$_REQUEST['tipo_usuario'],$_REQUEST['activado']);// se Crea el nuevo usuario

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

	

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de usuarios
					new USUARIOS_ADD();
				}
				else{
					$USUARIOS = get_data_form(); //se recogen los datos del formulario
					$respuesta = $USUARIOS->ADD();
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','','','','','','');
					$valores = $USUARIOS->RellenaDatos();
					new USUARIOS_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$USUARIOS = get_data_form();
					$respuesta = $USUARIOS->DELETE();
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}
				break;

			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','','','','','',''); // Se crea el objeto
					$valores = $USUARIOS->RellenaDatos(); // obtengo todos los datos de la tupla
					new USUARIOS_EDIT($valores); //invoco la vista de edit con los datos precargados
				}
				else{
					//upload_image();
					$USUARIOS = get_data_form(); //recojo los valores del formulario
					$respuesta = $USUARIOS->EDIT(); // update en la bd 
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}

				break;

			case 'SEARCH':
				if (!$_POST){
					new USUARIOS_SEARCH();
				}
				else{
					$USUARIOS = get_data_form();
					$datos = $USUARIOS->SEARCH();
					new USUARIOS_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','','','','','',''); // Se crea el objeto
				$valores = $USUARIOS->RellenaDatos();
				new USUARIOS_SHOWCURRENT($valores);
				break;

			default:

				$USUARIOS = get_data_form();
				$datos = $USUARIOS->SHOW_ALL();
				new USUARIOS_SHOWALL($datos);
		}


?>
