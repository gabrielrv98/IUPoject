<?php
//Clase : PROFESOR_ADD_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------
	class PROFESOR_ADD{


		function __construct(){	
			session_start();
			$this->render();
		}

		function render(){

			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>

		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<script type="text/javascript" src='../View/js/validaciones.js'></script>
			<title> <?php echo $strings['Tadd']; ?></title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>

			<h1><?php echo $strings['addProfessor']; ?></h1>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php?action=ADD' method='post' onsubmit=" return comprobarRrofesor(this); ">

				<div class="form-group">
				 	<label for="DNI">DNI </label>  

				 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' placeholder = 'Utiliza el DNI' size = '9' onblur="comprobarDni(this);" required>
				 	<label class="errormsg" for="DNI" id="DNI_error" > <?php echo $strings['dniError'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nombre"><?php echo $strings['name'] ?> </label> 

				 	<input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Nombre del profesor' size = '15' value = '' onblur="comprobarTexto(this,15)" required>
				 	<label class="errormsg" for="nombre" id="nombre_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="apellido"><?php echo $strings['surname'] ?>  </label> 

				 	<input type = 'text' name = 'apellido' id = 'apellido' placeholder = 'Apellidos del profesor' size = '30' onblur="comprobarTexto(this,30)" required>
				 	<label class="errormsg" for="apellido" id="apellido_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;
 
 				<div class="form-group">
				 	<label for="area">Area </label>

				 	<input type = 'text' name = 'area' id = 'area' placeholder = 'Solo letras' size = '30' onblur=" comprobarTexto(this,60)" required>
				 	<label class="errormsg" for="area" id="area_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="departamento"><?php echo $strings['departamento'] ?> </label>

				 	<input type = 'text' name = 'departamento' id = 'departamento' placeholder = 'Solo letras' size = '30' onblur=" comprobarTexto(this,60)" required>
				 	<label class="errormsg" for="departamento" id="departamento_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="ADD" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>