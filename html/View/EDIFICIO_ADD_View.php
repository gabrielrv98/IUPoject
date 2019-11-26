<?php
//Clase : EDIFICIO_ADD_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------
	class EDIFICIO_ADD{


		function __construct(){	
			session_start();
			$this->render();
		}

		function render(){

			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<script type="text/javascript" src='../js/validaciones.js'></script>
			<title> <?php echo $strings['Tadd']; ?></title>
		</head>
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1><?php echo $strings['addEdificio']; ?></h1>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php?action=ADD' method='post' onsubmit="return comprobarEdificio(this);">

				<!-- Division añadir el codigo de edificio -->
				<div class="form-group">
				 	<label for="codigo"><?php echo $strings['CodEdificio'] ?> </label>  
				 	 
				 	<input class="form-control" type = 'text' name = 'codigo' id = 'codigo' placeholder = 'Letras y numeros' size = '10' value = '' onblur="comprobarAlfabetico(this,10)" required>
				 	<label class="errormsg" for="codigo" id="codigo_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division añadir el Nombre del edificio -->
				<div class="form-group">
				 	<label for="nombre"><?php echo $strings['NomEdificio'] ?> </label>  
				 	 
				 	 <input class="form-control" type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Solo letras' size = '30'  onblur="comprobarTexto(this,50)" required>
				 	 <label class="errormsg" for="nombre" id="nombre_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

					<!-- Division añadir la dreccion del edificio -->
				<div class="form-group">
				 	<label for="direccion"><?php echo $strings['DirEdificio'] ?> </label>  
				 	 
				 	 <input class="form-control" type = 'text' name = 'direccion' id = 'direccion' placeholder = 'Letras y numeros' size = '50' onblur="comprobarAlfabetico(this,150)" required>
				 	 <label class="errormsg" for="direccion" id="direccion_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp; 

				<!-- Division añadir el campus del edificio -->
				<div class="form-group">
				 	<label for="campus">Campus </label>  
				 	 
				 	 <input class="form-control" type = 'text' name = 'campus' id = 'campus' placeholder = 'Solo letras' size = '10' value = '' onblur="comprobarTexto(this,10)" required>
				 	 <label class="errormsg" for="campus" id="campus_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp; 

				<button type="submit" name='action' class="btn btn-primary" value="ADD" >
					<?php echo $strings['submit'] ; ?>
				</button>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>