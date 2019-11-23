<?php
//Clase : EDIFICIO_EDIT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de los edificios como cadenas de texto
// y se pueden editar, luego se actualizan en la base de datos
//-------------------------------------------------------

	class EDIFICIO_EDIT{

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


			<h1><?php echo $strings['editTitulation']; ?></h1>	
			<form name = 'Form' action='../Controller/EDIFICIO_Controller.php?action=EDIT' method='post' onsubmit="return comprobarEdificio(this);">

				<div class="form-group">
				 	<label for="codigo"><?php echo $strings['CodEdificio'] ?> </label>  
				 	 
				 	<input class="form-control" type = 'text' name = 'codigo' id = 'codigo' value = '<?php echo $this->valores['CODEDIFICIO']; ?>' placeholder = 'Letras y numeros' size = '10' value = '' onblur="comprobarAlfabetico(this,10)" readonly>
				 	<label class="errormsg" for="codigo" id="codigo_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nombre"><?php echo $strings['NomEdificio'] ?> </label>  
				 	 
				 	 <input class="form-control" type = 'text' name = 'nombre' id = 'nombre' value = '<?php echo $this->valores['NOMBREEDIFICIO']; ?>' placeholder = 'Solo letras' size = '30'  onblur="comprobarTexto(this,50)" required>
				 	 <label class="errormsg" for="nombre" id="nombre_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="direccion"><?php echo $strings['DirEdificio'] ?> </label>  
				 	 
				 	 <input class="form-control" type = 'text' name = 'direccion' id = 'direccion' value = '<?php echo $this->valores['DIRECCIONEDIFICIO']; ?>' placeholder = 'Letras y numeros' size = '50' onblur="comprobarAlfabetico(this,150)" required>
					<label class="errormsg" for="direccion" id="direccion_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp; 

				<div class="form-group">
				 	<label for="campus">Campus </label>  
				 	 
				 	 <input class="form-control" type = 'text' name = 'campus' id = 'campus' value = '<?php echo $this->valores['CAMPUSEDIFICIO']; ?>' placeholder = 'Solo letras' size = '10' value = '' onblur="comprobarTexto(this,10)" >
					<label class="errormsg" for="campus" id="campus_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp; 

				<button type="submit" name='action' class="btn btn-primary" value="EDIT" >
					<?php echo $strings['submit'] ; ?>
				</button>
				
			</form>
				
		
			<a href='../Controller/Index_Controller.php'> <?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?> 