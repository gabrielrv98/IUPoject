<?php
//Clase : VALORACIONES_Controller
//Creado el : 8-06-2020
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------
 include_once '../Model/USUARIOS_Model.php';

 session_start();
	if( !isset($_SESSION['login']) ){
		header('Location:../index.php');
	}

	include_once '../Model/VALORACIONES_Model.php';
	include_once '../Model/INTERCAMBIOS_Model.php';
	include_once '../Model/PRODUCTOS_Model.php';
	include '../View/VALORACIONES_SHOWCURRENT_View.php';
	include '../View/VALORACIONES_SHOWALL_View.php';   
	include '../View/VALORACIONES_SEARCH_View.php';   
	include '../View/VALORACIONES_DELETE_View.php';	 
	include '../View/VALORACIONES_EDIT_View.php';   
	include '../View/VALORACIONES_ADD_View.php';   
	include '../View/MESSAGE_View.php';
	include '../View/noPermiso.php';
	include '../View/noEditable.php';
	

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia VALORACIONES y la devuelve
	function get_data_form(){


		if (!isset($_REQUEST['id'])) $_REQUEST['id'] = '';
		if (!isset($_REQUEST['idProd'])) $_REQUEST['idProd'] = '';
		if (!isset($_REQUEST['idInter'])) $_REQUEST['idInter'] = '';
		if (!isset($_REQUEST['punt'])) $_REQUEST['punt'] = '';
		if (!isset($_REQUEST['coment'])) $_REQUEST['coment'] = '';

		return new VALORACIONES_Model($_REQUEST['id'],$_REQUEST['idProd'],$_REQUEST['idInter'],$_REQUEST['punt'],$_REQUEST['coment']);// se Crea el nuevo usuario

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
						new VALORACIONES_ADD($intercambios,$productos);
					}
					else{
						$VALORACIONES = get_data_form(); //se recogen los datos del formulario
						$respuesta = $VALORACIONES->ADD();
						new MESSAGE($respuesta, '../Controller/VALORACIONES_Controller.php');
					}
				
				break;
			case 'DELETE':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias
					if (!$_POST){ //nos llega el id a eliminar por get
						$VALORACIONES = new VALORACIONES_Model($_REQUEST['id'],'','','','');
						$valores = $VALORACIONES->RellenaDatos();
						new VALORACIONES_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
					}
					else{ // llegan los datos confirmados por post y se eliminan
						$VALORACIONES = get_data_form();
						$respuesta = $VALORACIONES->DELETE();
						new MESSAGE($respuesta, '../Controller/VALORACIONES_Controller.php');
					}
				}else new noPermiso();// si no es admin se le muestra la ventana noPermiso	
				break;

			case 'EDIT':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias
					if (!$_POST){ //nos llega el usuario a editar por get
						$VALORACIONES = new VALORACIONES_Model($_REQUEST['id'],'','','',''); // Se crea el objeto
						$valores = $VALORACIONES->RellenaDatos(); // obtengo todos los datos de la tupla
						new VALORACIONES_EDIT($valores); //invoco la vista de edit con los datos precargados
					}
					else{
						$VALORACIONES = get_data_form(); //recojo los valores del formulario
						$respuesta = $VALORACIONES->EDIT(); // update en la bd 
						new MESSAGE($respuesta, '../Controller/VALORACIONES_Controller.php');
					}
				}else new NoEditable();// si no es admin se le muestra la ventana noPermiso	
				break;

			case 'SEARCH':
				if (!$_POST){
					$productos = new PRODUCTOS_Model('','','','','','','','');
					$productos = $productos->productosValorados();

					$intercambios = new INTERCAMBIOS_Model('','','','','','','');
					$intercambios = $intercambios->SEARCH();
					new VALORACIONES_SEARCH($productos, $intercambios);
				}
				else{
					$VALORACIONES = get_data_form();
					$datos = $VALORACIONES->SEARCH();
					new VALORACIONES_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$VALORACIONES = new VALORACIONES_Model($_REQUEST['id'],'','','',''); // Se crea el objeto
				$valores = $VALORACIONES->RellenaDatos();//se rellenan los datos

				new VALORACIONES_SHOWCURRENT($valores);
				break;

			default:

				$VALORACIONES = get_data_form();
				$datos = $VALORACIONES->SHOW_ALL();
				new VALORACIONES_SHOWALL($datos);
		}


?>
