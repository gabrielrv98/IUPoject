<?php

	class Login{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; 
?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<script type="text/javascript" src='../js/validaciones.js'></script>
			<title> <?php echo $strings['Login']; ?></title>
		</head>

			<h1><?php echo $strings['Login']; ?></h1>	 
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_login();">
		
				 	<div class="form-group">
				 	<label for="login"><?php echo $strings['Login'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu login' size = '10' onblur="comprobarAlfabetico(this,15);" required>
				 	<label class="errormsg" for="login" id="login_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;
				 	
				<div class="form-group">
				 	<label for="password"><?php echo $strings['password'] ?> </label> 
				 	<input class="form-control" type = 'text' name = 'password' id = 'password' placeholder = 'letras y numeros' size = '15' value = '' onblur="comprobarAlfabetico(this,128)" required >
				 	<label class="errormsg" for="password" id="password_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

					<input type='submit' name='action' value='Login'>

			</form>
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
