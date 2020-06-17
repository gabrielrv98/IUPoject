<?php

	class NoPermiso{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; 
?>
		<head>
			<title> <?php echo $strings['Intercambio de tiempo']; ?> </title>
		</head>

			<h1 class="noPermisoT"><?php echo $strings['noPermisoT']; ?></h1>	 

			<label class="noTienesPermiso"><?php echo $strings['noTienesPermiso'] ?> </label>  
			<br><br>

			<a href='../Controller/Index_Controller.php' ><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
			
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
