<?php
//Clase : PROFESOR_DELETE_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de la tupla antes de eliminarlo
//-------------------------------------------------------
	class PROFESOR_DELETE{

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
				<link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
				<script type="text/javascript" src='../js/validaciones.js'></script>
				<title> <?php echo $strings['Tdelete']; ?> </title>
			</head> 

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1><?php echo $strings['deletepRrofessor']; ?></h1>	
			<form name = 'Form' action='../Controller/PROFESOR_Controller.php?action=DELETE' method='post' >

					<?php //Se muestran los valores antes de ser eliminados. Ninguno se puede alterar ?>
					<div class="form-group">
				 	<label for="DNI">DNI </label>  

				 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' value = '<?php echo $this->valores['DNI']; ?>' placeholder = 'Utiliza el DNI' size = '9' onblur="comprobarDni(this);" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nombre"><?php echo $strings['name'] ?> </label> 

				 	<input type = 'text' name = 'nombre' id = 'nombre' value = '<?php echo $this->valores['NOMBREPROFESOR']; ?>' placeholder = 'Nombre del profesor' size = '15' value = '' onblur="comprobarTexto(this,15)" readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="apellido"><?php echo $strings['surname'] ?>  </label> 

				 	<input type = 'text' name = 'apellido' id = 'apellido' value = '<?php echo $this->valores['APELLIDOSPROFESOR']; ?>' placeholder = 'Apellidos del profesor' size = '30' onblur="comprobarTexto(this,30)" readonly>
				</div>&nbsp;&nbsp;
 
 				<div class="form-group">
				 	<label for="area">Area </label>

				 	<input type = 'text' name = 'area' id = 'area' value = '<?php echo $this->valores['AREAPROFESOR']; ?>' placeholder = 'Solo letras' size = '60' value = '' onblur=" comprobarTexto(this,60)" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="departamento"><?php echo $strings['departamento'] ?> </label>

				 	<input type = 'text' name = 'departamento' id = 'departamento' value = '<?php echo $this->valores['DEPARTAMENTOPROFESOR']; ?>' placeholder = 'Solo letras' size = '60' onblur=" comprobarTexto(this,60)" readonly>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="DELETE" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'> <?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>