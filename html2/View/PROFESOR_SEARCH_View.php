<?php
//Clase : PROFESOR_SEARCH_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y busca profesores que coincidan con esos datos
//-------------------------------------------------------
	class PROFESOR_SEARCH{


		function __construct(){	
			session_start();

			$this->render();
		}

		function render(){

			//Cargamos el diccionario apropiado
			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<script type="text/javascript" src='../View/js/validaciones.js'></script>
			<title class="Tadd"> <?php echo $strings['Tadd']; ?></title>
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>
			<!-- Titulo de la pagina -->
			<h1 class="searchProfesor"><?php echo $strings['searchProfesor']; ?></h1>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarRrofesorSearch(this);">

				 	<?php //Se solicitan los valores para buscar los profesores, si hay varios campos cubiertos la busqueda sera mas precisa ?>
				 	<!-- Division buscar por DNI -->
					<div class="form-group">
				 	<label for="DNI">DNI </label>  

				 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' placeholder = 'Utiliza el DNI' size = '9' onblur="comprobarDniSearch(this);" >
				 	<label class="errormsg dniError" for="DNI" id="DNI_error" > <?php echo $strings['dniError'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division buscar por nombre -->
				<div class="form-group">
				 	<label for="nombre" class="name"><?php echo $strings['name'] ?> </label> 

				 	<input type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Nombre del profesor' size = '15' value = '' onblur="comprobarTexto(this,15)" >
				 	<label class="errormsg textonly" for="nombre" id="nombre_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division buscar por apellido -->
				<div class="form-group">
				 	<label for="apellido" class="apellido"><?php echo $strings['surname'] ?>  </label> 

				 	<input type = 'text' name = 'apellido' id = 'apellido' placeholder = 'Apellidos del profesor' size = '30' onblur="comprobarTexto(this,30)" >
				 	<label class="errormsg textonly" for="apellido" id="apellido_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;
 
 				<!-- Division buscar por area -->
 				<div class="form-group">
				 	<label for="area" class="Area">Area </label>

				 	<input type = 'text' name = 'area' id = 'area' placeholder = 'Solo letras' size = '30' onblur=" comprobarTexto(this,60)" >
				 	<label class="errormsg textonly" for="area" id="area_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

 				<!-- Division buscar por departamento -->
				<div class="form-group">
				 	<label for="departamento" class="departamento"><?php echo $strings['departamento'] ?> </label>

				 	<input type = 'text' name = 'departamento' id = 'departamento' placeholder = 'Solo letras' size = '30' onblur=" comprobarTexto(this,60)" >
				 	<label class="errormsg textonly" for="departamento" id="departamento_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/PROFESOR_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>