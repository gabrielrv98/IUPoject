<?php
//Clase : USUARIO_EDIT_View
//Creado el : 5-06-2020
//Creado por: grvidal
//Muestra los campos de los usuarios como cadenas de texto
// y se pueden editar, luego se actualizan en la base de datos
//-------------------------------------------------------
	class USUARIOS_EDIT{


		var $valores;
		var $usuario;

		function __construct($valores,$usuario){	
			
			$this->usuario = $usuario;
			$this->valores = $valores;
			$this->render();
		}

		function render(){
		?>
			<head>
				<title class="Tedit"> Tedit</title>
			</head> 

		<?php include '../View/Header.php'; //header necesita los strings ?>
		
			<body>
				<h1 class="editUser"></h1>	
				<form name = 'Form' action='../Controller/USUARIOS_Controller.php?action=EDIT' method='post' onsubmit="return comprobarUsuarios(this);" enctype="multipart/form-data">

					<div class="form-group">
					 	<label for="login" class="Login">Login</label>  
					 	<input class="form-control" type = 'text' name = 'login' id = 'login' onblur="comprobarAlfabetico(this,15);"  value = '<?php echo $this->valores['LOGIN']; ?>' readonly>
					 	<label class="errormsg letrasynumeros" for="login" id="login_error" > letrasynumeros</label>
					 	<label class="errormsg tooShortNoNum" for="login" id="login_errorLength" > tooShortNoNum</label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="password" class="password">password </label> 
					 	<input class="form-control" type = 'text' name = 'password' id = 'password'  value = '<?php echo $this->valores['PASSWORD']; ?>' placeholder = 'letras y numeros' size = '15' value = '' onblur="comprobarAlfabetico(this,128)" required >
					 	<label class="errormsg letrasynumeros" for="password" id="password_error" > letrasynumeros</label>
					 	<label class="errormsg tooShortNoNum" for="password" id="password_errorLength" > tooShortNoNum</label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="DNI" class="DNI">DNI  </label> 
					 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' value = '<?php echo $this->valores['DNI']; ?>' placeholder = 'Utiliza tu dni' size = '9' onblur="comprobarDni(this)" readonly >
					 	<label class="errormsg dniError" for="DNI" id="DNI_error" > dniError </label>
					</div>&nbsp;&nbsp; 

					<div class="form-group">
						<label for="nombre" class="name">name  </label>
					 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' value = '<?php echo $this->valores['NOMBRE']; ?>' placeholder = 'Solo letras' size = '20' value = '' onblur="comprobarTexto(this,30)" required >
					 	<label class="errormsg textonly" for="nombre" id="nombre_error" > textonly</label>
					 	<label class="errormsg tooShortNoNum" for="nombre" id="nombre_errorLength" > tooShortNoNum</label>
					</div>&nbsp;&nbsp; 
	 
	 				<div class="form-group">
					 	<label for="apellidos" class="surname">surname  </label>
					 	<input class="form-control" type = 'text' name = 'apellidos' id = 'apellidos'  value = '<?php echo $this->valores['APELLIDOS']; ?>' placeholder = 'Solo letras' size = '50' value = '' onblur="comprobarTexto(this,50)" required >
					 	<label class="errormsg textonly" for="apellidos" id="apellidos_error" > textonly </label>
					 	<label class="errormsg tooShortNoNum" for="apellidos" id="apellidos_errorLength" > tooShortNoNum</label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="tlf" class="tlf">tlf  </label>
					 	<input class="form-control" type = 'number' name = 'tlf' id = 'tlf' value = '<?php echo $this->valores['TELEFONO']; ?>' placeholder = 'Numero de telefono' size = '9' value = '' onblur="comprobarTelf(this)" required >
					 	<label class="errormsg tlfError" for="tlf" id="tlf_error" > tlfError </label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="email" class="email">Email </label>
					 	<input class="form-control" type = 'text' name = 'email' id = 'email' placeholder ='Utiliza tu correo' size = '40' value = '<?php echo $this->valores['EMAIL']; ?>' onblur="comprobarEmail(this,60)" readonly >
					 	<label class="errormsg emailError" for="email" id="email_error" >emailError </label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
				 		<label for="fechaNacimiento" class="bDate">bDate  </label>
				 		<input class="form-control" type = 'date' name = 'fechaNacimiento' id = 'fechaNacimiento' value="<?php echo $this->valores['FECHANACIMIENTO']; ?>" onblur="comprobarFechaNacimiento(this);" onkeydown=" return false" required>
				 		<label class="errormsg fechaNacimientoError" for="fechaNacimiento" id="fechaNacimiento_error" > fechaNacimientoError </label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="alergias" class="alergias">alergias </label>
					 	<input class="form-control" type = 'text' name = 'alergias' id = 'alergias' placeholder = 'Letras y numeros' size = '50' value="<?php echo $this->valores['ALERGIAS']; ?>" onblur="comprobarAlfabeticoVacio(this,50)" >
					 	<label class="errormsg letrasynumeros" for="alergias" id="alergias_error" > letrasynumeros</label>
				 	<label class="errormsg tooShortNoNum" for="alergias" id="alergias_errorLength" > tooShortNoNum </label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="direccion" class="direccion">direccion </label>
					 	<input class="form-control" type = 'text' name = 'direccion' id = 'direccion' value="<?php echo $this->valores['DIRECCION']; ?>" placeholder = 'Letras y numeros' size = '50' value = '' onblur="comprobarAlfabeticoVacio(this,250)" >
					 	<label class="errormsg letrasynumeros" for="direccion" id="direccion_error" > letrasynumeros </label>
					 	<label class="errormsg tooShortNoNum" for="direccion" id="direccion_errorLength" > tooShortNoNum </label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="cp" class="cp">cp  </label>
					 	<input class="form-control" type = 'text' name = 'cp' id = 'cp' placeholder = 'codigo postal' value="<?php echo $this->valores['CODIGO_POSTAL']; ?>" size = '5' value = '' onblur="comprobarCP(this)" >
					 	<label class="errormsg errorCP" for="cp" id="cp_error" > errorCP </label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="sexo" class="sexo">sexo  </label>
					 	<select name="sexo" required>
	    							<option class="male" value="hombre"  <?php if($this->valores['SEXO'] == "hombre") echo 'selected'; ?> > male</option>
	    							<option class="female" value="mujer" <?php if($this->valores['SEXO'] == "mujer") echo 'selected'; ?> > female</option>
								</select>
								<label class="errormsg" for="sexo" id="sexo_error" > sexoError </label>
					</div>&nbsp;&nbsp;

				<?php if ($this->usuario->isAdmin()) { ?>
					<div class="form-group">
					 	<label for="tipo_usuario" class="tipo_usuario">tipo_usuario</label>
					 	<select name="tipo_usuario" required>
	    						<option value="admin" class="admin" <?php if($this->valores['TIPO_USUARIO'] == "admin") echo 'selected'; ?> > admin</option>
	    						<option value="usuario" class="usuario" <?php if($this->valores['TIPO_USUARIO'] == "usuario") echo 'selected'; ?> > usuario</option>
						</select>

					 	<label class="errormsg tipo_usuarioError" for="tipo_usuario" id="tipo_usuario_error" > tipo_usuarioError </label>
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="activado" class="activado">activado</label>
					 	<select name="activado" required>
	    						<option value="activado" class="activado" <?php if($this->valores['ACTIVADO'] == "activado") echo 'selected'; ?>> activado</option>
	    						<option value="desactivado" class="desactivado" <?php if($this->valores['ACTIVADO'] == "desactivado") echo 'selected'; ?>> desactivado</option>
						</select>

					 	<label class="errormsg activadoError" for="activado" id="activado_error" > activadoError </label>
					</div>&nbsp;&nbsp;
				<?php } ?>

					<button type="submit" name='action' class="btn btn-primary submit" value="EDIT" >
						submit
					</button>

			</form>
				
			<a href='../Controller/USUARIOS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
			
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>