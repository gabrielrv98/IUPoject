<?php
//Clase : MENSAJES_Controller
//Creado el : -06-2020
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------
 include_once '../Model/USUARIOS_Model.php';

 session_start();
	if( !isset($_SESSION['login']) ){
		header('Location:../index.php');
	}

	include_once '../Model/MENSAJES_Model.php';
	//include_once '../Model/INTERCAMBIOS_Model.php';
	//include '../View/MENSAJES_SHOWCURRENT_View.php';
	include '../View/MENSAJES_SHOWALL_View.php';   
	//include '../View/MENSAJES_SEARCH_View.php';   
	//include '../View/MENSAJES_DELETE_View.php';	 
	//include '../View/MENSAJES_EDIT_View.php';   
	//include '../View/MENSAJES_ADD_View.php';   
	include '../View/MESSAGE_View.php';
	//include '../View/noPermiso.php';
	//include '../View/noEditable.php';
	

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia MENSAJES y la devuelve
	function get_data_form(){


		if (!isset($_REQUEST['id'])) $_REQUEST['id'] = '';
		if (!isset($_REQUEST['idProd'])) $_REQUEST['idProd'] = '';
		if (!isset($_REQUEST['idInter'])) $_REQUEST['idInter'] = '';
		if (!isset($_REQUEST['punt'])) $_REQUEST['punt'] = '';
		if (!isset($_REQUEST['coment'])) $_REQUEST['coment'] = '';

		return new MENSAJES_Model($_REQUEST['id'],$_REQUEST['idProd'],$_REQUEST['idInter'],$_REQUEST['punt'],$_REQUEST['coment']);// se Crea el nuevo usuario

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

	include_once '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando
	

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
					if (!$_POST){ // se incoca la vista de add de usuarios
						//en principio solo un administrador puede llegar aqui, un usuario saltaria directamente al "else"
						$intercambios = new INTERCAMBIOS_Model('','','','','','aceptado','aceptado');//se cogen los intercambios
						$intercambios = $intercambios->SEARCH();//se recogen todos los intercambios

						$productos = new PRODUCTOS_Model('','','','','','','','');
						$productos = $productos->SEARCH();//Se recogen todos los productos
						new MENSAJES_ADD($intercambios,$productos);
					}
					else{
						$MENSAJES = get_data_form(); //se recogen los datos del formulario
						$respuesta = $MENSAJES->ADD();
						new MESSAGE($respuesta, '../Controller/MENSAJES_Controller.php');
					}
				
				break;
			case 'DELETE':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias
					if (!$_POST){ //nos llega el id a eliminar por get
						$MENSAJES = new MENSAJES_Model($_REQUEST['id'],'','','','');
						$valores = $MENSAJES->RellenaDatos();
						new MENSAJES_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
					}
					else{ // llegan los datos confirmados por post y se eliminan
						$MENSAJES = get_data_form();
						$respuesta = $MENSAJES->DELETE();
						new MESSAGE($respuesta, '../Controller/MENSAJES_Controller.php');
					}
				}else new noPermiso();// si no es admin se le muestra la ventana noPermiso	
				break;

			case 'EDIT':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias
					if (!$_POST){ //nos llega el usuario a editar por get
						$MENSAJES = new MENSAJES_Model($_REQUEST['id'],'','','',''); // Se crea el objeto
						$valores = $MENSAJES->RellenaDatos(); // obtengo todos los datos de la tupla
						new MENSAJES_EDIT($valores); //invoco la vista de edit con los datos precargados
					}
					else{
						$MENSAJES = get_data_form(); //recojo los valores del formulario
						$respuesta = $MENSAJES->EDIT(); // update en la bd 
						new MESSAGE($respuesta, '../Controller/MENSAJES_Controller.php');
					}
				}else new NoEditable();// si no es admin se le muestra la ventana noPermiso	
				break;

			case 'SEARCH':
				if (!$_POST){
					$productos = new PRODUCTOS_Model('','','','','','','','');
					$productos = $productos->productosValorados();

					$intercambios = new INTERCAMBIOS_Model('','','','','','','');
					$intercambios = $intercambios->SEARCH();
					new MENSAJES_SEARCH($productos, $intercambios);
				}
				else{
					$MENSAJES = get_data_form();
					$datos = $MENSAJES->SEARCH();
					new MENSAJES_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$MENSAJES = new MENSAJES_Model($_REQUEST['id'],'','','',''); // Se crea el objeto
				$valores = $MENSAJES->RellenaDatos();//se rellenan los datos

				new MENSAJES_SHOWCURRENT($valores);
				break;

			default:

				$MENSAJES = get_data_form();
				$datos = $MENSAJES->SHOW_ALL_BYGROUPS();
				new MENSAJES_SHOWALL($datos);
		}


?>
