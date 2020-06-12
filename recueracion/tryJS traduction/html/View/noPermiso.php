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

			<h1 class="ISesion"><?php echo $strings['ISesion']; ?></h1>	 

			<label class="noTienesPermiso"><?php echo $strings['noTienesPermiso'] ?> </label>  

			<a href='../Controller/Index_Controller.php' class="Volver"> <?php echo $strings['Volver']; ?> </a>
			
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
