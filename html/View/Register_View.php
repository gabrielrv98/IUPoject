<?php

	class Register{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
			<script type="text/javascript" src='../js/validaciones.js'></script>
			<title> <?php echo $strings['Tadd']; ?></title>
		</head>
		<?php include '../View/Header.php'; //header necesita los strings ?>
		
			<h1><?php echo $strings['Registro']; ?></h1>	
			<form name = 'Form' action='../Controller/Register_Controller.php' method='post' onsubmit="return comprobarUsuarios(this);">
			
				 	<div class="form-group">
				 	<label for="login"><?php echo $strings['Login'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu login' size = '10' onblur="comprobarAlfabetico(this,15);" required>
				 	<label for="login" id="loginError" disabled> siii </label>label
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="password"><?php echo $strings['password'] ?> </label> 
				 	<input class="form-control" type = 'text' name = 'password' id = 'password' placeholder = 'letras y numeros' size = '15' value = '' onblur="comprobarAlfabetico(this,128)" required >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="DNI">DNI  </label> 
				 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' placeholder = 'Utiliza tu dni' size = '9' onblur="comprobarDni(this)" required >
				</div>&nbsp;&nbsp; 

				<div class="form-group">
					<label for="nombre"><?php echo $strings['name'] ?>  </label>
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Solo letras' size = '20' onblur="comprobarTexto(this,30)" required >
				</div>&nbsp;&nbsp; 
 
 				<div class="form-group">
				 	<label for="apellidos"><?php echo $strings['surname'] ?>  </label>
				 	<input class="form-control" type = 'text' name = 'apellidos' id = 'apellidos' placeholder = 'Solo letras' size = '50' value = '' onblur="comprobarTexto(this,50)" required >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="tlf"><?php echo $strings['tlf'] ?>  </label>
				 	<input class="form-control" type = 'number' name = 'tlf' id = 'tlf' placeholder = 'Numero de telefono' size = '9' value = '' onblur="comprobarTelf(this)" required >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="email">Email </label>
				 	<input class="form-control" type = 'text' name = 'email' id = 'email' placeholder ='Utiliza tu correo' size = '40' value = '' onblur="comprobarEmail(this,60)" required >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="bday"><?php echo $strings['bDate'] ?>  </label>
				 	<input class="form-control" type = 'date' name = 'bday' id = 'bday' onblur="comprobarFechaNacimiento(this);" required>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="foto"><?php echo $strings['picture'] ?>  </label>
				 	<input type = 'file' name = 'foto' id = 'foto' required >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="sexo"><?php echo $strings['sexo'] ?>  </label>
				 	<select name="sexo" required>
    							<option value="hombre"> <?php echo $strings['male'] ; ?></option>
    							<option value="mujer"> <?php echo $strings['female'] ; ?></option>
							</select>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="REGISTER" >
					<?php echo $strings['submit'] ; ?>
				</button>

			
			<a href='../Controller/Index_Controller.php'> <?php echo $strings['Volver']; ?> </a>
			</form>
				
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	