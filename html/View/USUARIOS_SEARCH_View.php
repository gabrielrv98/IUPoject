<?php
//Clase : USUARIO_SEARCH_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y busca usuarios que coincidan con esos datos
//-------------------------------------------------------
	class USUARIOS_SEARCH{


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
				<title><?php echo $strings['Tsearch']; ?></title>
			</head>

			<?php include '../View/Header.php'; //header necesita los strings ?>
			
			<h1><?php echo $strings['searchUser']; ?></h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php?action=SEARCH' method='post' onsubmit=" return comprobarUsuarioSearch(this)" enctype="multipart/form-data">

				<div class="form-group">
				 	<label for="login"><?php echo $strings['Login'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu login' size = '10' onblur="comprobarAlfabetico(this,15);">
				 	<label class="errormsg" for="login" id="login_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="DNI">DNI  </label> 
				 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' placeholder = 'Utiliza tu dni' size = '9' onblur="comprobarDniSearch(this)">
				 	<label class="errormsg" for="DNI" id="DNI_error" > <?php echo $strings['dniError'] ?> </label>
				</div>&nbsp;&nbsp; 

				<div class="form-group">
					<label for="nombre"><?php echo $strings['name'] ?>  </label>
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Solo letras' size = '20' onblur="comprobarTexto(this,30);"  >
				 	<label class="errormsg" for="nombre" id="nombre_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp; 
 
 				<div class="form-group">
				 	<label for="apellidos"><?php echo $strings['surname'] ?>  </label>
				 	<input class="form-control" type = 'text' name = 'apellidos' id = 'apellidos' placeholder = 'Solo letras' size = '50' onblur="comprobarTexto(this,50);"  >
				 	<label class="errormsg" for="apellidos" id="apellidos_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="tlf"><?php echo $strings['tlf'] ?>  </label>
				 	<input class="form-control" type = 'number' name = 'tlf' id = 'tlf' placeholder = 'Numero de telefono' size = '9' onblur="comprobarTelfSearch(this)" >
				 	<label class="errormsg" for="tlf" id="tlf_error" > <?php echo $strings['tlfError'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="email">Email </label>
				 	<input class="form-control" type = 'text' name = 'email' id = 'email' placeholder ='Utiliza tu correo' size = '40' onblur="comprobarEmailSearch(this,60)" value = '' >
				 	<label class="errormsg" for="email" id="email_error" > <?php echo $strings['emailError'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="date"><?php echo $strings['bDate'] ?>  </label>
				 	<input class="form-control" type = 'date' name = 'bday' id = 'bday' onblur="comprobarFechaNacimiento(this);">
				 	<label class="errormsg" for="bday" id="bday_error" > <?php echo $strings['bdayError'] ?> </label>
				</div>&nbsp;&nbsp;
				
				<div class="form-group">
				 	<label for="sexo"><?php echo $strings['sexo'] ?>  </label>
				 	<select name="sexo" >
						<option value=""> <?php echo $strings['mix'] ; ?></option>
    					<option value="hombre"> <?php echo $strings['male'] ; ?></option>
    					<option value="mujer"> <?php echo $strings['female'] ; ?></option>
					</select>
					<label class="errormsg" for="sexo" id="sexo_error" > <?php echo $strings['sexoError'] ?> </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="SEARCH" >
					<?php echo $strings['submit'] ; ?>
				</button>
			</form>
				
		
			<a href='../Controller/Index_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>