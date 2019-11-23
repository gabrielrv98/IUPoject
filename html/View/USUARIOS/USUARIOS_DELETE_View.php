<?php
//Clase : USUARIO_DELETE_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de la tupla antes de eliminarlo
//-------------------------------------------------------
	class USUARIOS_DELETE{


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
				<link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
				<script type="text/javascript" src='../js/validaciones.js'></script>
				<title> <?php echo $strings['Tdelete']; ?> </title>
			</head> 

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1><?php echo $strings['deleteUser']; ?></h1>	
			<form name = 'Form' action='../Controller/USUARIOS_Controller.php?action=EDIT' method='post' onsubmit="return comprobarUsuarios(this);">


				<div class="form-group">
				 	<label for="login"><?php echo $strings['Login'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'login' id = 'login'  value = '<?php echo $this->valores['login']; ?>' placeholder = 'Utiliza tu login' size = '10' onblur="comprobarAlfabetico(this,15);" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="password"><?php echo $strings['password'] ?> </label> 
				 	<input class="form-control" type = 'text' name = 'password' id = 'password'  value = '<?php echo $this->valores['password']; ?>' placeholder = 'letras y numeros' size = '15' value = '' onblur="comprobarAlfabetico(this,128)" readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="DNI">DNI  </label> 
				 	<input class="form-control" type = 'text' name = 'DNI' id = 'DNI' value = '<?php echo $this->valores['DNI']; ?>' placeholder = 'Utiliza tu dni' size = '9' onblur="comprobarDni(this)" readonly ><br>
				</div>&nbsp;&nbsp; 

				<div class="form-group">
					<label for="nombre"><?php echo $strings['name'] ?>  </label>
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' value = '<?php echo $this->valores['nombre']; ?>' placeholder = 'Solo letras' size = '20' value = '' onblur="comprobarTexto(this,30)" readonly >
				</div>&nbsp;&nbsp; 
 
 				<div class="form-group">
				 	<label for="apellidos"><?php echo $strings['surname'] ?>  </label>
				 	<input class="form-control" type = 'text' name = 'apellidos' id = 'apellidos'  value = '<?php echo $this->valores['apellidos']; ?>' placeholder = 'Solo letras' size = '50' value = '' onblur="comprobarTexto(this,50)" readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="tlf"><?php echo $strings['tlf'] ?>  </label>
				 	<input class="form-control" type = 'number' name = 'tlf' id = 'tlf' value = '<?php echo $this->valores['telefono']; ?>' placeholder = 'Numero de telefono' size = '9' value = '' onblur="comprobarTelf(this)" readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="email">Email </label>
				 	<input class="form-control" type = 'text' name = 'email' id = 'email' placeholder ='Utiliza tu correo' size = '40' value = '<?php echo $this->valores['email']; ?>' onblur="comprobarEmail(this,60)" readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="date"><?php echo $strings['bDate'] ?>  </label>
				 	<input class="form-control" type = 'date' name = 'bday' id = 'bday' value="<?php echo $this->valores['FechaNacimiento']; ?>" onblur="comprobarFechaNacimiento(this);" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="foto"><?php echo $strings['picture'] ?>  </label>
				 	<img name="foto" id="foto" src="<?php echo $this->valores['fotopersonal'];?>" height="42" width="42">
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="sexo"><?php echo $strings['sexo'] ?>  </label>
				 	<select name="sexo" readonly>
    							<option value="hombre"  <?php if($this->valores['sexo'] != "hombre") echo 'disabled'; ?> > <?php echo $strings['male'] ; ?></option>
    							<option value="mujer" <?php if($this->valores['sexo'] != "mujer") echo 'disabled'; ?> > <?php echo $strings['female'] ; ?></option>
							</select>
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