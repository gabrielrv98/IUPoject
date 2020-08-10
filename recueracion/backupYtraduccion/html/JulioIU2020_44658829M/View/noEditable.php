<?php
//Clase : NoEditable_View
//Creado el : 1-06-20
//Creado por: grvidal
//Muestra una pantalla explicando que el objeto no se ha podido evitar por falta de permisos 
//-------------------------------------------------------
	class NoEditable{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; 
?>
		<head>
			<title class="Intercambio de tiempo">  </title>
		</head>

			<h1 class="noPermisoT">No tienes permiso</h1>	 

			<label class="noEditable"></label>  
			<br><br>

			<a href='../Controller/Index_Controller.php' ><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
			
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
