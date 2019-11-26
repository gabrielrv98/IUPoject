<?php

//Clase : CENTRO_EDIT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de los centros como cadenas de texto
// y se pueden editar, luego se actualizan en la base de datos
//-------------------------------------------------------
	class CENTRO_EDIT{

		var $valores;

		function __construct($valores){	
			session_start();
			$this->valores = $valores;
			$this->render();
		}

		function render(){

			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
			<head>
				<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
				<script type="text/javascript" src='../js/validaciones.js'></script>
				<title> <?php echo $strings['Tedit']; ?> </title>
			</head> 
			<?php include '../View/Header.php'; //header necesita los strings ?>


			<h1><?php echo $strings['editCenter']; ?></h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php?action=EDIT' method='post' onsubmit="return comprobarCentro(this);">

				<div class="form-group">
				 	<label for="centro"><?php echo $strings['CodCentro'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'centro' id = 'centro' value = '<?php echo $this->valores['CODCENTRO']; ?>' placeholder = 'Letras y numeros' size = '10' onblur="comprobarAlfabetico(this,10);" readonly>
				 	<label class="errormsg" for="centro" id="centro_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="edificio"><?php echo $strings['NomEdificio'] ?> </label>  
				 	 <input class="form-control" type = 'text' name = 'edificio' id = 'edificio' value = '<?php echo $this->valores['CODEDIFICIO']; ?>' placeholder = 'Letras y numeros' size = '10' readonly >
				 	 <label class="errormsg" for="edificio" id="edificio_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nombre"><?php echo $strings['NomCentro'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' value = '<?php echo $this->valores['NOMBRECENTRO']; ?>' placeholder = 'Solo letras' size = '50' onblur="comprobarTexto(this,50)" required>
				 	<label class="errormsg" for="nombre" id="nombre_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="direccion"><?php echo $strings['DirCentro'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'direccion' id = 'direccion' value = '<?php echo $this->valores['DIRECCIONCENTRO']; ?>' placeholder = 'Letras y numeros' size = '50' value = '' onblur="comprobarAlfabetico(this,150)" required>
				 	<label class="errormsg" for="direccion" id="direccion_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp; 
 
				<div class="form-group">
				 	<label for="responsable"><?php echo $strings['RespCentro'] ?> </label>  
				 	
				 	<input class="form-control" type = 'text' name = 'responsable' id = 'responsable' value = '<?php echo $this->valores['RESPONSABLECENTRO']; ?>' placeholder = 'Solo letras' size = '60' value = '' onblur="comprobarTexto(this,60)" required>
				 	<label class="errormsg" for="responsable" id="responsable_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp; 
				
				<button type="submit" name='action' class="btn btn-primary" value="EDIT" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?> 