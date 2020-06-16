<?php
//Clase : PRODUCTOS_CATEGORIAS_CONTROLLER
//Creado el : 10-06-2020
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------
 include_once '../Model/USUARIOS_Model.php';

 session_start();
	if( !isset($_SESSION['login']) ){
		header('Location:../index.php');
	}else{
		$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando
		if( !$usuario->isAdmin()) new noPermiso();
	}

	include_once '../Model/PRODUCTOS_CATEGORIAS_Model.php';
	//include '../View/PRODUCTOS_CATEGORIAS_SHOWCURRENT_View.php';
	include '../View/PRODUCTOS_CATEGORIAS_SHOWALL_View.php';   
	include '../View/PRODUCTOS_CATEGORIAS_SEARCH_View.php';   
	//include '../View/PRODUCTOS_CATEGORIAS_DELETE_View.php';	 
	//include '../View/PRODUCTOS_CATEGORIAS_EDIT_View.php';   
	include '../View/PRODUCTOS_CATEGORIAS_ADD_View.php';   
	include '../View/MESSAGE_View.php';
	include '../View/noPermiso.php';
	

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PRODUCTOS_CATEGORIAS y la devuelve
	function get_data_form(){

		if (!isset($_REQUEST['idProducto'])) $_REQUEST['idProducto'] = null;
		if (!isset($_REQUEST['idCategoria'])) $_REQUEST['idCategoria'] = null;

		return new PRODUCTOS_CATEGORIAS_Model($_REQUEST['idProducto'],$_REQUEST['idCategoria']);// se Crea el nuevo usuario

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

	
	
	

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
					if (!$_POST){ // se incoca la vista de add de usuarios
						include_once '../Model/CATEGORIAS_Model.php';
						$datosCategorias = new CATEGORIAS_Model('','');
						$datosCategorias = $datosCategorias->SEARCH();// se recogen todas las categorias con su nombre

						include_once '../Model/PRODUCTOS_Model.php';
						$datosProductos = new PRODUCTOS_Model('','','','','','');
						$datosProductos = $datosProductos->SEARCH();// se recogen todos los productos con su nombre

						new PRODUCTOS_CATEGORIAS_ADD($datosCategorias,$datosProductos);
					}
					else{
						$PRODUCTOS_CATEGORIAS = get_data_form(); //se recogen los datos del formulario
						$respuesta = $PRODUCTOS_CATEGORIAS->ADD();
						new MESSAGE($respuesta, '../Controller/PRODUCTOS_CATEGORIAS_Controller.php');
					}

				break;
			case 'DELETE':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias
					if (!$_POST){ //nos llega el id a eliminar por get
						$PRODUCTOS_CATEGORIAS = new PRODUCTOS_CATEGORIAS_Model($_REQUEST['id'],'');
						$valores = $PRODUCTOS_CATEGORIAS->RellenaDatos();
						new PRODUCTOS_CATEGORIAS_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
					}
					else{ // llegan los datos confirmados por post y se eliminan
						$PRODUCTOS_CATEGORIAS = get_data_form();
						$respuesta = $PRODUCTOS_CATEGORIAS->DELETE();
						new MESSAGE($respuesta, '../Controller/PRODUCTOS_CATEGORIAS_Controller.php');
					}
				}else new noPermiso();// si no es admin se le muestra la ventana noPermiso	
				break;

			case 'EDIT':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias
					if (!$_POST){ //nos llega el usuario a editar por get
						$PRODUCTOS_CATEGORIAS = new PRODUCTOS_CATEGORIAS_Model($_REQUEST['id'],''); // Se crea el objeto
						$valores = $PRODUCTOS_CATEGORIAS->RellenaDatos(); // obtengo todos los datos de la tupla
						new PRODUCTOS_CATEGORIAS_EDIT($valores); //invoco la vista de edit con los datos precargados
					}
					else{
						$PRODUCTOS_CATEGORIAS = get_data_form(); //recojo los valores del formulario
						$respuesta = $PRODUCTOS_CATEGORIAS->EDIT(); // update en la bd 
						new MESSAGE($respuesta, '../Controller/PRODUCTOS_CATEGORIAS_Controller.php');
					}
				}else new noPermiso();// si no es admin se le muestra la ventana noPermiso	
				break;

			case 'SEARCH':
				if (!$_POST){
					new PRODUCTOS_CATEGORIAS_SEARCH();
				}
				else{
					$PRODUCTOS_CATEGORIAS = get_data_form();
					$datos = $PRODUCTOS_CATEGORIAS->SEARCH();
					new PRODUCTOS_CATEGORIAS_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$PRODUCTOS_CATEGORIAS = new PRODUCTOS_CATEGORIAS_Model($_REQUEST['id'],''); // Se crea el objeto
				$valores = $PRODUCTOS_CATEGORIAS->RellenaDatos();
				new PRODUCTOS_CATEGORIAS_SHOWCURRENT($valores);
				break;

			default:

				$PRODUCTOS_CATEGORIAS = get_data_form();
				$datos = $PRODUCTOS_CATEGORIAS->SHOW_ALL();
				new PRODUCTOS_CATEGORIAS_SHOWALL($datos);
		}


?>
