<?php
//Clase : Usuarios_Controller
//Creado el : 2-10-2019
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------
 
	if( isset($_SESSION['login']) ) header('Location:../index.php');

	include '../View/USUARIOS_SHOWCURRENT_View.php';
	include '../View/USUARIOS_SHOWALL_View.php';   
	include '../View/USUARIOS_SEARCH_View.php';   
	include '../View/USUARIOS_DELETE_View.php';	 
	include '../View/USUARIOS_EDIT_View.php';   
	include '../View/USUARIOS_ADD_View.php';   
	include '../Model/USUARIOS_Model.php';
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
		if (!isset($_REQUEST['bday'])) $_REQUEST['bday'] = null;
		if (!isset($_REQUEST['foto'])) $_REQUEST['foto'] = null;
		if (!isset($_REQUEST['sexo'])) $_REQUEST['sexo'] = null;

		return new USUARIOS_Model($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['DNI'],$_REQUEST['nombre'], $_REQUEST['apellidos'],$_REQUEST['tlf'],$_REQUEST['email'],$_REQUEST['bday'],$_REQUEST['foto'],$_REQUEST['sexo']);

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
					upload_image();
					$USUARIOS = get_data_form(); //se recogen los datos del formulario
					$respuesta = $USUARIOS->ADD();
					new MESSAGE($respuesta, '../Controller/USUARIOS_Controller.php');
				}
				break;
			case 'DELETE':
				if (!$_POST){ //nos llega el id a eliminar por get
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','','');
					$valores = $USUARIOS->RellenaDatos($_REQUEST['login']);
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
					$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','',''); // Creo el objeto
					$valores = $USUARIOS->RellenaDatos($_REQUEST['login']); // obtengo todos los datos de la tupla
					new USUARIOS_EDIT($valores); //invoco la vista de edit con los datos precargados
				}
				else{
					upload_image();
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
				$USUARIOS = new USUARIOS_Model($_REQUEST['login'],'','','','','','','','','');
				$valores = $USUARIOS->RellenaDatos($_REQUEST['login']);
				new USUARIOS_SHOWCURRENT($valores);
				break;

			default:

				$USUARIOS = get_data_form();
				$datos = $USUARIOS->SHOW_ALL();
				new USUARIOS_SHOWALL($datos);
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
			 $newname = '../Files/' . $_REQUEST['DNI'].'.'.$imageFileType;
			rename($oldname, $newname);
			$_REQUEST['foto'] = $newname;
		}
}


?>
