<?php
//Clase : MENSAJES_Controller
//Creado el : 20-06-2020
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------
 include_once '../Model/USUARIOS_Model.php';

 session_start();
	if( !isset($_SESSION['login']) ){
		header('Location:../index.php');
	}

	include_once '../Model/MENSAJES_Model.php';
	include_once '../Model/INTERCAMBIOS_Model.php';
	include '../View/MENSAJES_SHOWCURRENT_View.php';
	include '../View/MENSAJES_SHOWALL_View.php';  
	include '../View/MENSAJES_SHOWALLCONVER_View.php';
	include '../View/MENSAJES_SEARCH_View.php';   
	include '../View/MENSAJES_DELETE_View.php';	 
	include '../View/MENSAJES_EDIT_View.php';   
	include '../View/MENSAJES_ADD_View.php';   
	include '../View/MESSAGE_View.php';
	include '../View/noPermiso.php';
	include '../View/noEditable.php';
	

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia MENSAJES y la devuelve
	function get_data_form(){

		$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando

		if (!isset($_REQUEST['id'])) $_REQUEST['id'] = '';
		if (!isset($_REQUEST['idInter'])) $_REQUEST['idInter'] = '';
		if (!isset($_REQUEST['contenido'])) $_REQUEST['contenido'] = '';
		if (!isset($_REQUEST['dia'])) $_REQUEST['dia'] = '';//2020-06-20
		if (!isset($_REQUEST['hora'])) $_REQUEST['hora'] = '';//21:30
		if (!isset($_REQUEST['loginUser'])) $_REQUEST['loginUser'] = '';

		$date = "";
		if($_REQUEST['action']== 'ADD'  && !$usuario->isAdmin()){// si esta haciendo add y no es administrador se le pone la fecha actual
			$date = date("Y-m-d H:i:s");
			
		}else if ($_REQUEST['action']== 'DELETE'){
			$date = $_REQUEST['dia'];
		}else{// si es admnistrador o esta haciendo edit ( solo admins) o search, se pone la hora compuesta
			if($_REQUEST['dia'] != "") // si el dia no esta vacio se completa
				$date =  $_REQUEST['dia'] ." ".$_REQUEST['hora'].":00";
		}

		return new MENSAJES_Model($_REQUEST['id'],$_REQUEST['idInter'],$_REQUEST['contenido'],$date,$_REQUEST['loginUser']);// se Crea el nuevo usuario
		

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

	include_once '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando
	

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
					if (!$_POST){ // se incoca la vista de add de usuarios
						if (!isset($_REQUEST['idInter'])) {// si no esta puesta idInter se muestran todos los intercambios
							if ($usuario->isAdmin()) {//si el usuario es administrador se le muestran todos los intercambios
								$intercambios = new INTERCAMBIOS_Model('','','','','','','');//se cogen los intercambios
								$intercambios = $intercambios->getConversacionesPosibles();//se recogen todos los intercambios
							
							}else{// si es un usuario normal se muestran solo sus inercambios
								$USUARIO = new USUARIOS_Model('','','','','',$usuario->RellenaDatos()['DNI'],'','','','','','','','');//Recuperamos el usuario que esta operando para conseguir su dni
								$intercambios = $USUARIO->getConversacionesPosiblesPropias();//recuperamos los intercambios que no esten aceptados por ambas partes

							}
							
							
						}else{// añadir un mensaje a la conversacion idInter
							$intercambios = new INTERCAMBIOS_Model($_REQUEST['idInter'],'','','','','','');
							$dnis = $intercambios->getDNIS();

							if($usuario->isAdmin() || $usuario->getDNI() == $dnis['DNI1'] || $usuario->getDNI() == $dnis['DNI2']){//si es administrador o propietario de algun producto

								if($intercambios->comprobarAccept()){
									$intercambios = $intercambios->getConversacionConID();//se recogen todos los intercambios

								}else{
									$respuesta ="ChatFinalizado";
									new MESSAGE($respuesta, '../Controller/MENSAJES_Controller.php');
								}
							}else new NoPermiso();


						}
						new MENSAJES_ADD($intercambios,$usuario);
					}
					else{
						$MENSAJES = get_data_form(); //se recogen los datos del formulario
						$respuesta = $MENSAJES->ADD();
						new MESSAGE($respuesta, '../Controller/MENSAJES_Controller.php?action=SHOWCONVER&&idInter='.$_REQUEST['idInter']);
					}
				
				break;
			case 'DELETE':
				if( $usuario->isAdmin() ){// solo los administradores pueden eliminar mensajesF
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
					$USUARIO = new USUARIOS_Model('','','','','',$usuario->RellenaDatos()['DNI'],'','','','','','','','');//Recuperamos el usuario que esta operando para conseguir su dni
					$intercambios = $USUARIO->getConversacionesPosiblesPropias();//recuperamos los intercambios que no esten aceptados por ambas partes

					new MENSAJES_SEARCH( $intercambios);
				}
				else{
					$MENSAJES = get_data_form();
					$datos = $MENSAJES->SEARCH();
					new MENSAJES_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':

					if(isset($_REQUEST['id'])){
						$MENSAJES = new MENSAJES_Model($_REQUEST['id'],'','','','');
						$dnis = $MENSAJES->getDNISfromID();
						if($usuario->isAdmin() || $usuario->getDNI() == $dnis['DNI1'] || $usuario->getDNI() == $dnis['DNI2']){//si es administrador o propietario de algun producto
							$MENSAJES = new MENSAJES_Model($_REQUEST['id'],'','','',''); // Se crea el objeto
							$MENSAJES = $MENSAJES->SEARCH();//se cogen todos los mensajes de la conversacion
							new MENSAJES_SHOWCURRENT($MENSAJES->fetch_array());

						}else new NoPermiso();
					}
				
				break;

			case 'SHOWCONVER' :
					if(isset($_REQUEST['idInter'])){// si esta puesto esta variable mostramos la conversacion
						$intercambios = new INTERCAMBIOS_Model($_REQUEST['idInter'],'','','','','','');
						$dnis = $intercambios->getDNIS();

						if($usuario->isAdmin() || $usuario->getDNI() == $dnis['DNI1'] || $usuario->getDNI() == $dnis['DNI2']){//si es administrador o propietario de algun producto
							$MENSAJES = new MENSAJES_Model('',$_REQUEST['idInter'],'','',''); // Se crea el objeto
							$valores = $MENSAJES->getMensajes();//se cogen todos los mensajes de la conversacion

							$INTERCAMBIO = new INTERCAMBIOS_Model($_REQUEST['idInter'],'','','','','',''); // Se crea el objeto
							$titulo = $INTERCAMBIO->getTitulo();
							$id = $titulo['ID'];
							$titulo = $titulo['TITULO1'] . " <-> " . $titulo['TITULO2'];

							new MENSAJES_SHOWALLCONVER($titulo,$valores,$id);

						}else new NoPermiso();						
					}

				break;
			default:

				$MENSAJES = get_data_form();
				if ($usuario->isAdmin()) {//si es administrador se le muestran todos
					$datos = $MENSAJES->SHOW_ALL_BYGROUPS();
				
				}else{//sino se  muestran solo los suyos
					$USUARIO = new USUARIOS_Model('','','','','',$usuario->RellenaDatos()['DNI'],'','','','','','','','');//Recuperamos el usuario que esta operando para conseguir su dni
					$datos = $USUARIO->SHOW_ALL_BYGROUPS_Users();
				}
				
				new MENSAJES_SHOWALL($datos);
		}


?>
