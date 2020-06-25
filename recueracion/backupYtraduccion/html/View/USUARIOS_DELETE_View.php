<?php
//Clase : USUARIO_DELETE_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los atributos del usuario antes de eliminarlo
//-------------------------------------------------------
	class USUARIOS_DELETE{


		var $valores;

		function __construct($valores){	
			$this->valores = $valores;
			$this->render();
		}

		function render(){
		?>
			<head>
				<link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
				<title class="Tdelete"> Tdelete </title>
			</head> 

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="deleteUser"></h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php?action=EDIT' method='post' onsubmit="return comprobarUsuarios(this);">


				<div class="form-group">
				 	<label for="login" class="Login">Login</label>  
				 	<input class="form-control" type = 'text' name = 'login' id = 'login'  value = '<?php echo $this->valores['LOGIN']; ?>' placeholder = 'Utiliza tu login' size = '10' onblur="comprobarAlfabetico(this,15);" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="password" class="password">password</label> 
				 	<input class="form-control" type = 'text' name = 'password' id = 'password'  value = '<?php echo $this->valores['PASSWORD']; ?>' placeholder = 'letras y numeros' size = '15' value = '' onblur="comprobarAlfabetico(this,128)" readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="DNI" class="DNI">DNI  </label> 
				 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' value = '<?php echo $this->valores['DNI']; ?>' placeholder = 'Utiliza tu dni' size = '9' onblur="comprobarDni(this)" readonly ><br>
				</div>&nbsp;&nbsp; 

				<div class="form-group">
					<label for="nombre" class="name">name  </label>
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' value = '<?php echo $this->valores['NOMBRE']; ?>' placeholder = 'Solo letras' size = '20' value = '' onblur="comprobarTexto(this,30)" readonly >
				</div>&nbsp;&nbsp; 
 
 				<div class="form-group">
				 	<label for="apellidos" class="surname">surname  </label>
				 	<input class="form-control" type = 'text' name = 'apellidos' id = 'apellidos'  value = '<?php echo $this->valores['APELLIDOS']; ?>' placeholder = 'Solo letras' size = '50' value = '' onblur="comprobarTexto(this,50)" readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="tlf" class="tlf">tlf  </label>
				 	<input class="form-control" type = 'number' name = 'tlf' id = 'tlf' value = '<?php echo $this->valores['TELEFONO']; ?>' placeholder = 'Numero de telefono' size = '9' value = '' onblur="comprobarTelf(this)" readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="email" class="email">Email </label>
				 	<input class="form-control" type = 'text' name = 'email' id = 'email' placeholder ='Utiliza tu correo' size = '40' value = '<?php echo $this->valores['EMAIL']; ?>' onblur="comprobarEmail(this,60)" readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="date" class="bDate">bDate  </label>
				 	<input class="form-control" type = 'date' name = 'bday' id = 'bday' value="<?php echo $this->valores['FECHANACIMIENTO']; ?>" onblur="comprobarFechaNacimiento(this);" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					 	<label for="alergias" class="alergias">alergias  </label>
					 	<input class="form-control" type = 'text' name = 'alergias' id = 'alergias' placeholder = 'Letras y numeros' size = '50' value="<?php echo $this->valores['ALERGIAS']; ?>" onblur="comprobarAlfabeticoVacio(this,50)" readonly> 
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="direccion" class="direccion">direccion </label>
					 	<input class="form-control" type = 'text' name = 'direccion' id = 'direccion' value="<?php echo $this->valores['DIRECCION']; ?>" placeholder = 'Letras y numeros' size = '50' value = '' onblur="comprobarAlfabeticoVacio(this,250)" readonly> 
					</div>&nbsp;&nbsp;

					<div class="form-group">
					 	<label for="cp" class="cp">cp  </label>
					 	<input class="form-control" type = 'text' name = 'cp' id = 'cp' placeholder = 'codigo postal' value="<?php echo $this->valores['CODIGO_POSTAL']; ?>" size = '5' value = '' onblur="comprobarCP(this)" readonly>
					</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="sexo" class="sexo">sexo  </label>
				 	<select name="sexo" readonly>
    							<option class="male" value="hombre"  <?php if($this->valores['SEXO'] != "hombre") echo 'disabled'; ?> > male</option>
    							<option class="female" value="mujer" <?php if($this->valores['SEXO'] != "mujer") echo 'disabled'; ?> > female</option>
							</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					 <label for="tipo_usuario" class="tipo_usuario"> tipo_usuario' </label>
					 <select name="tipo_usuario" required>
	    				<option value="admin" class="admin" <?php if($this->valores['TIPO_USUARIO'] != "admin") echo 'disabled'; ?> > admin</option>
	    				<option value="usuario" class="usuario" <?php if($this->valores['TIPO_USUARIO'] != "usuario") echo 'disabled'; ?> >usuario</option>
					</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					 <label for="activado" class="activado">activado</label>
					 <select name="activado" required>
	    				<option value="activado" class="activado" <?php if($this->valores['ACTIVADO'] != "activado") echo 'disabled'; ?>> activado</option>
	    				<option value="desactivado" class="desactivado" <?php if($this->valores['ACTIVADO'] != "desactivado") echo 'disabled'; ?>> desactivado</option>
					</select>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="DELETE" >
					submit
				</button>
				 
			</form>
				
		
			<a href='../Controller/USUARIOS_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>