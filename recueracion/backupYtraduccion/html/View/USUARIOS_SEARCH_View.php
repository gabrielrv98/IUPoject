<?php
//Clase : USUARIO_SEARCH_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y busca usuarios que coincidan con esos datos
//-------------------------------------------------------
	class USUARIOS_SEARCH{


		function __construct(){
			//session_start();	
			$this->render();
		}

		function render(){
		?>
			<head>
				<link rel="stylesheet" type="text/css" href="../View/css/estilo.css">
				<title class="Tsearch"> Buscar</title>
			</head>

			<?php include '../View/Header.php'; //header necesita los strings ?>
			
			<h1 class="searchUser"></h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php?action=SEARCH' method='post' onsubmit=" return comprobarUsuarioSearch(this)" enctype="multipart/form-data">

				<div class="form-group">
				 	<label for="login" class="Login">Login </label>  
				 	<input class="form-control" type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu login' size = '10' onblur="comprobarAlfabeticoVacio(this,15);">
				 	<label class="errormsg letrasynumeros" for="login" id="login_error" > </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="DNI">DNI  </label> 
				 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' placeholder = 'Utiliza tu dni' size = '9' onblur="comprobarDniSearch(this)">
				 	<label class="errormsg dniError" for="DNI" id="DNI_error" >  </label>
				</div>&nbsp;&nbsp; 

				<div class="form-group">
					<label for="nombre" class="name">Nombre  </label>
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Solo letras' size = '20' onblur="comprobarTexto(this,30);"  >
				 	<label class="errormsg textonly" for="nombre" id="nombre_error" >  </label>
				</div>&nbsp;&nbsp; 
 
 				<div class="form-group">
				 	<label for="apellidos" class="surname">Apellido  </label>
				 	<input class="form-control" type = 'text' name = 'apellidos' id = 'apellidos' placeholder = 'Solo letras' size = '50' onblur="comprobarTexto(this,50);"  >
				 	<label class="errormsg textonly" for="apellidos" id="apellidos_error" ></label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="tlf" class="tlf">Telefono  </label>
				 	<input class="form-control" type = 'number' name = 'tlf' id = 'tlf' placeholder = 'Numero de telefono' size = '9' onblur="comprobarTelfSearch(this)" >
				 	<label class="errormsg tlfError" for="tlf" id="tlf_error" > </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="email" class="email">Email </label>
				 	<input class="form-control" type = 'text' name = 'email' id = 'email' placeholder ='Utiliza tu correo' size = '40' onblur="comprobarEmailSearch(this,60)" value = '' >
				 	<label class="errormsg emailError" for="email" id="email_error" > email </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="fechaNacimiento" class="bDate">Fecha  </label>
				 	<input class="form-control" type = 'date' name = 'fechaNacimiento' id = 'fechaNacimiento' onblur="comprobarFechaNacimiento(this);" onkeydown=" return false" >
				 	<label class="errormsg fechaNacimientoError" for="fechaNacimiento" id="fechaNacimiento_error" > fecha error </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="alergias" class="alergias">Alergias </label>
				 	<input class="form-control" type = 'text' name = 'alergias' id = 'alergias' placeholder = 'Letras y numeros' size = '50' value = '' onblur="comprobarAlfabeticoVacio(this,50)" >
				 	<label class="errormsg letrasynumeros" for="alergias" id="alergias_error" > error </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="direccion" class="direccion">direccion  </label>
				 	<input class="form-control" type = 'text' name = 'direccion' id = 'direccion' placeholder = 'Letras y numeros' size = '50' value = '' onblur="comprobarAlfabeticoVacio(this,250)" >
				 	<label class="errormsg letrasynumeros" for="direccion" id="direccion_error" > error </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="cp" class="cp">Codigo postal  </label>
				 	<input class="form-control" type = 'text' name = 'cp' id = 'cp' placeholder = 'codigo postal' size = '5' value = '' onblur="comprobarCPSearch(this)" >
				 	<label class="errormsg errorCP" for="cp" id="cp_error" > error CP</label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="sexo" class="sexo">Sexo  </label>
				 	<select name="sexo" >
						<option value="" class="mix"> Mix</option>
    					<option value="hombre" class="male"> Hombre</option>
    					<option value="mujer" class="female"> Mujer</option>
					</select>
					<label class="errormsg sexoError" for="sexo" id="sexo_error" > sexoError </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="tipo_usuario" class="tipo_usuario">Tipo usuario</label>
				 	<select name="tipo_usuario" >
				 			<option value="" class="todoTipo"> Cualquiera</option>
    						<option value="admin" class="admin"> admin </option>
    						<option value="usuario" class="usuario">user</option>
					</select>

				 	<label class="errormsg tipo_usuarioError" for="tipo_usuario" id="tipo_usuario_error" > usuario error</label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="activado" class="activado">activado</label>
				 	<select name="activado" >
				 			<option value="" class="todoTipo"> todo</option>
    						<option value="activado" class="activado"> activado</option>
    						<option value="desactivado" class="desactivado"> desactivado</option>
					</select>

				 	<label class="errormsg activadoError" for="activado" id="activado_error" > activadoerror </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
					Submit
				</button>
			</form>
				
		
			<a href='../Controller/USUARIOS_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>