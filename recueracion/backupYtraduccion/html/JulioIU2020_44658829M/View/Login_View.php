<?php
//Clase : Login_View.php
//Creado el : 8-06-20
//Creado por: grvidal
//Muestra un boton para registrarse, asi como un formulario de login y contraseña para entrar a la aplicacion
//-------------------------------------------------------

	class Login{


		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; 
?>
		<head>
			<title class="Intercambio de tiempo"> Intercambio de tiempo </title>
		</head>

			<h1 class="ISesion">Inicio</h1>	 
			<form name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_login(this);">
		
				 	<div class="form-group">
				 	<label for="login" class="Login">Login</label>  
				 	<input class="form-control" type = 'text' name = 'login' id = 'login' placeholder = 'Utiliza tu login' size = '10' onblur="comprobarAlfabetico(this,15);" required>
				 	<label class="errormsg letrasynumeros" for="login" id="login_error" >  'letrasynumeros'   </label>
				 	<label class="errormsg tooShortNoNum" for="login" id="login_errorLength" > tooShortNoNum</label>
				</div>&nbsp;&nbsp;
				 	
				<div class="form-group">
				 	<label for="password" class="password">Contraseña</label> 
				 	<input class="form-control" type = 'password' name = 'password' id = 'password' placeholder = 'letras y numeros' size = '15' value = '' onblur="comprobarAlfabetico(this,128)" required >
				 	<label class="errormsg letrasynumeros" for="password" id="password_error" >  letrasynumeros   </label>
				 	<label class="errormsg tooShortNoNum" for="password" id="password_errorLength" > tooShortNoNum</label>
				</div>&nbsp;&nbsp;

					<input type='submit' name='action' value='Login'>

			</form>
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
