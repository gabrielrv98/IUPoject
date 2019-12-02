<?php

//Clase : PROFESOR_EDIT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de los profesores como cadenas de texto
// y se pueden editar, luego se actualizan en la base de datos
//-------------------------------------------------------
	class PROFESOR_EDIT{

		//array con los valores para rellenar la funcion edit
		var $valores;


		function __construct($valores){	
			session_start();
			$this->valores = $valores;
			$this->render();
		}

		function render(){

			//Cargamos el diccionario apropiado
			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
			<head>
				<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
				<script type="text/javascript" src='../js/validaciones.js'></script>
				<title class="Tedit"> <?php echo $strings['Tedit']; ?> </title>
			</head> 

			<?php include '../View/Header.php'; //header necesita los strings ?>

 
			<!-- Titulo de la pagina -->
			<h1 class="editProfessor"><?php echo $strings['editProfessor']; ?></h1>	
			<!-- Inicio del formulario -->
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php?action=EDIT' method='post' onsubmit="return comprobarRrofesor(this);">

				<?php //se solicitan los nuevos valores para los campos, mostrando el valor anterior. EL DNI del profsor no se puede cambiar ?>

				<div class="form-group">
				 	<label for="DNI">DNI </label>  

				 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' value = '<?php echo $this->valores['DNI']; ?>' placeholder = 'Utiliza el DNI' size = '9' onblur="comprobarDni(this);" readonly>
				 	<label class="errormsg dniError" for="DNI" id="DNI_error" > <?php echo $strings['dniError'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nombre" class="name"><?php echo $strings['name'] ?> </label> 

				 	<input type = 'text' name = 'nombre' id = 'nombre' value = '<?php echo $this->valores['NOMBREPROFESOR']; ?>' placeholder = 'Nombre del profesor' size = '15' value = '' onblur="comprobarTexto(this,15)" >
				 	<label class="errormsg textonly" for="nombre" id="nombre_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="apellido" class="surname"><?php echo $strings['surname'] ?>  </label>
				 	
				 	<input type = 'text' name = 'apellido' id = 'apellido' placeholder = 'Apellidos del profesor' size = '30' onblur="comprobarTexto(this,30)"  value = '<?php echo $this->valores['APELLIDOSPROFESOR']; ?>' required>
				 	<label class="errormsg textonly" for="apellido" id="apellido_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;
 
 				<div class="form-group">
				 	<label for="area" class="Area">Area </label>

				 	<input type = 'text' name = 'area' id = 'area' value = '<?php echo $this->valores['AREAPROFESOR']; ?>' placeholder = 'Solo letras' size = '60' value = '' onblur=" comprobarTexto(this,60)" required>
				 	<label class="errormsg textonly" for="area" id="area_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="departamento" class="departamento"><?php echo $strings['departamento'] ?> </label>

				 	<input type = 'text' name = 'departamento' id = 'departamento' value = '<?php echo $this->valores['DEPARTAMENTOPROFESOR']; ?>' placeholder = 'Solo letras' size = '60' onblur=" comprobarTexto(this,60)" required>
					<label class="errormsg textonly" for="departamento" id="departamento_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="EDIT" >
					<?php echo $strings['submit'] ; ?>
				</button>
			</form>
				
		
			<a href='../Controller/PROFESOR_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>