<?php
//Clase : Usuarios_Controller
//Creado el : 8-06-2020
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------
 include_once '../Model/USUARIOS_Model.php';

 session_start();
	if( !isset($_SESSION['login']) ){
		header('Location:../index.php');
	}

	include_once '../Model/CATEGORIAS_Model.php';
	include '../View/CATEGORIAS_SHOWCURRENT_View.php';
	include '../View/CATEGORIAS_SHOWALL_View.php';   
	include '../View/CATEGORIAS_SEARCH_View.php';   
	include '../View/CATEGORIAS_DELETE_View.php';	 
	include '../View/CATEGORIAS_EDIT_View.php';   
	include '../View/CATEGORIAS_ADD_View.php';   
	include '../View/MESSAGE_View.php';
	include '../View/noPermiso.php';
	

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia CATEGORIAS y la devuelve
	function get_data_form(){

		if (!isset($_REQUEST['id'])) $_REQUEST['id'] = null;
		if (!isset($_REQUEST['nombre'])) $_REQUEST['nombre'] = null;

		return new CATEGORIAS_Model($_REQUEST['id'],$_REQUEST['nombre']);// se Crea el nuevo usuario

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

	include_once '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando
	

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias

					if (!$_POST){ // se incoca la vista de add de usuarios
						new CATEGORIAS_ADD();
					}
					else{
						$CATEGORIAS = get_data_form(); //se recogen los datos del formulario
						$respuesta = $CATEGORIAS->ADD();
						new MESSAGE($respuesta, '../Controller/CATEGORIAS_Controller.php');
					}
				}else new noPermiso();// si no es admin se le muestra la ventana noPermiso	

				break;
			case 'DELETE':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias
					if (!$_POST){ //nos llega el id a eliminar por get
						$CATEGORIAS = new CATEGORIAS_Model($_REQUEST['id'],'');
						$valores = $CATEGORIAS->RellenaDatos();
						new CATEGORIAS_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
					}
					else{ // llegan los datos confirmados por post y se eliminan
						$CATEGORIAS = get_data_form();
						$respuesta = $CATEGORIAS->DELETE();
						new MESSAGE($respuesta, '../Controller/CATEGORIAS_Controller.php');
					}
				}else new noPermiso();// si no es admin se le muestra la ventana noPermiso	
				break;

			case 'EDIT':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias
					if (!$_POST){ //nos llega el usuario a editar por get
						$CATEGORIAS = new CATEGORIAS_Model($_REQUEST['id'],''); // Se crea el objeto
						$valores = $CATEGORIAS->RellenaDatos(); // obtengo todos los datos de la tupla
						new CATEGORIAS_EDIT($valores); //invoco la vista de edit con los datos precargados
					}
					else{
						$CATEGORIAS = get_data_form(); //recojo los valores del formulario
						$respuesta = $CATEGORIAS->EDIT(); // update en la bd 
						new MESSAGE($respuesta, '../Controller/CATEGORIAS_Controller.php');
					}
				}else new noPermiso();// si no es admin se le muestra la ventana noPermiso	
				break;

			case 'SEARCH':
				if (!$_POST){
					new CATEGORIAS_SEARCH();
				}
				else{
					$CATEGORIAS = get_data_form();
					$datos = $CATEGORIAS->SEARCH();
					new CATEGORIAS_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$CATEGORIAS = new CATEGORIAS_Model($_REQUEST['id'],''); // Se crea el objeto
				$valores = $CATEGORIAS->RellenaDatos();
				new CATEGORIAS_SHOWCURRENT($valores);
				break;

			default:

				$CATEGORIAS = get_data_form();
				$datos = $CATEGORIAS->SHOW_ALL();
				new CATEGORIAS_SHOWALL($datos);
		}


?>
