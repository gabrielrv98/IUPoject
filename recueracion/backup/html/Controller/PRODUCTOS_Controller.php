﻿<?php
//Clase : Usuarios_Controller
//Creado el : 2-06-2020
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------
 

 session_start();
	if( !isset($_SESSION['login']) ){
		header('Location:../index.php');
	}

	include '../View/PRODUCTOS_SHOWCURRENT_View.php';
	include '../View/PRODUCTOS_SHOWALL_View.php';   
	include '../View/PRODUCTOS_SEARCH_View.php';   
	include '../View/PRODUCTOS_DELETE_View.php';	 
	include '../View/PRODUCTOS_EDIT_View.php';   
	include '../View/PRODUCTOS_ADD_View.php';   
	include_once '../Model/PRODUCTOS_Model.php';
	include '../View/MESSAGE_View.php';
	

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia PRODUCTOS y la devuelve
	function get_data_form(){

		if (!isset($_SESSION['id'])) $_SESSION['id'] = null;
		if (!isset($_REQUEST['titulo'])) $_REQUEST['titulo'] = null;
		if (!isset($_REQUEST['descripcion'])) $_REQUEST['descripcion'] = null;
		if (!isset($_REQUEST['foto'])) $_REQUEST['foto'] = null;
		if (!isset($_REQUEST['vendedorDNI'])) $_REQUEST['vendedorDNI'] = null;
		if (!isset($_REQUEST['estado'])) $_REQUEST['estado'] = null;

		return new PRODUCTOS_Model($_SESSION['id'],$_REQUEST['titulo'],$_REQUEST['descripcion'],
		$_REQUEST['foto'],$_REQUEST['vendedorDNI'],$_REQUEST['estado']);// se Crea el modelo de Producto

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';
	include_once '../Model/USUARIOS_Model.php';
	$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando
	

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
				if (!$_POST){ // se incoca la vista de add de productos
					new PRODUCTOS_ADD();
				}
				else{
					echo var_dump($_REQUEST);
					if(!$usuario->isAdmin()) $_REQUEST['vendedorDNI'] = $usuario->getDNI();// si el usuario no es admin se pone su dni como vendedor
					if ($_REQUEST['vendedorDNI']== '') $_REQUEST['vendedorDNI'] = $usuario->getDNI();//si el usuario no es admin ya se coloco su dni, si es admin y no especifico dni, se coloca el del suyo
					if( isset($_REQUEST['foto']) && $_REQUEST['foto'] != '' ) upload_image();//si el tag foto esta puesto y es distinto de vacio se sube, y  para subir la foto necesita el vendedorDNI y la descripcion
					$PRODUCTOS = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PRODUCTOS->ADD();
					new MESSAGE($respuesta, '../Controller/PRODUCTOS_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$PRODUCTOS = new PRODUCTOS_Model($_REQUEST['id'],'','','','','');
					$valores = $PRODUCTOS->RellenaDatos();
					new PRODUCTOS_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PRODUCTOS = get_data_form();
					$fotoPath = $PRODUCTOS->getFoto();
					$respuesta = $PRODUCTOS->DELETE();
					new MESSAGE($respuesta, '../Controller/PRODUCTOS_Controller.php');
					if($respuesta == '00005') unlink($fotoPath);
					
				}
				break;

			case 'EDIT':
				if (!$_POST){ //nos llega el usuario a editar por get
					$PRODUCTOS = new PRODUCTOS_Model($_REQUEST['id'],'','','','',''); // Se crea el objeto
					$valores = $PRODUCTOS->RellenaDatos(); // obtengo todos los datos de la tupla
					new PRODUCTOS_EDIT($valores); //invoco la vista de edit con los datos precargados
				}
				else{
					if(!$usuario->isAdmin()) $_REQUEST['vendedorDNI'] = $usuario->getDNI();// si el usuario no es admin se pone su dni como vendedor
					if ($_REQUEST['vendedorDNI']== '') $_REQUEST['vendedorDNI'] = $usuario->getDNI();//si el usuario no es admin ya se coloco su dni, si es admin y no especifico dni, se coloca el del suyo
					if( isset($_REQUEST['foto']) && $_REQUEST['foto'] != '' ) upload_image();//si el tag foto esta puesto y es distinto de vacio se sube, y  para subir la foto necesita el vendedorDNI y la descripcion
					$PRODUCTOS = get_data_form(); //recojo los valores del formulario
					$respuesta = $PRODUCTOS->EDIT(); // update en la bd 
					new MESSAGE($respuesta, '../Controller/PRODUCTOS_Controller.php');
				}

				break;

			case 'SEARCH':
				if (!$_POST){// si no hay elementos en post se muestra el formulario
					new PRODUCTOS_SEARCH();
				}
				else{ 
					$PRODUCTOS = get_data_form();// se recogen los datos
					$datos = $PRODUCTOS->SEARCH();// se hace la busqueda
					new PRODUCTOS_SHOWALL($datos);//se muestra
				}
				break;

			case 'SHOWCURRENT':
				$PRODUCTOS = new PRODUCTOS_Model($_REQUEST['id'],'','','','',''); // Se crea el objeto
				$valores = $PRODUCTOS->RellenaDatos();
				new PRODUCTOS_SHOWCURRENT($valores);
				break;

			default:

				$PRODUCTOS = get_data_form();
				$datos = $PRODUCTOS->SHOW_ALL();
				new PRODUCTOS_SHOWALL($datos);
		}


	function upload_image(){

		$target_dir = "../Files/";
		$target_file = $target_dir . basename($_FILES["foto"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["foto"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $uploadOk = 0;
		    } 
		}
		// Check file size
		if ($_FILES["foto"]["size"] > 500000) { //500KB
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
			 $oldname = '../Files/' .basename( $_FILES["foto"]["name"]);
			 $catch = array("\n"," ","\r","\t");
			 $titulo = str_replace($catch, "_", $_REQUEST['titulo']);
			 $newname = '../Files/' . $titulo .'_'. $_REQUEST['vendedorDNI'].'.'.$imageFileType;
			rename($oldname, $newname);
			$_REQUEST['foto'] = $newname;
		}
}


?>