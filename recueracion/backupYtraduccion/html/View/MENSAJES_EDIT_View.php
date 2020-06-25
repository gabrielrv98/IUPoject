<?php
//Clase : MENSAJES_EDIT_View
//Creado el : 21-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class MENSAJES_EDIT{


		var $valores;

		function __construct($valores){	

			$this->valores = $valores;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit"> editar</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="editCategoria"></h1>	
			<form name = 'Form' action='../Controller/MENSAJES_Controller.php?action=EDIT' method='post' onsubmit="return comprobarMensajes(this);" enctype="multipart/form-data">

				<div class="form-group">
				 	<label for="idInter" >ID </label> 
				 	<br> 
				 	<input type="id" name="id" value="<?php echo $this->valores['ID'] ?>" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="idInter" class="intercambios">Intercambio </label> 
				 	<br> 
				 	<select id="idInter" name="idInter" onchange="colocarProductos(this)" required>
				 		
				 			<option value="<?php echo $this->valores['ID_INTERCAMBIO'] ?>" selected><?php echo $this->valores['ID_INTERCAMBIO']; ?></option>		
				 	</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label for="loginUser" class="usuario"> </label> 
				 	<br> 
				 	<input type="text" name="loginUser" id="loginUser" value="<?php echo $this->valores['LOGIN_USUARIO'] ?>" size="1" readonly>
				</div>

				<div class="form-group">
					<label for="contenido" class="coment"> </label> 
				 	<br> 
				 	<textarea name="contenido" id="contenido" cols='80' rows='3' onblur="comprobarAlfabeticoEnter(this,200);"><?php echo $this->valores['CONTENIDO']; ?></textarea> 
				 	<label class="errormsg letrasynumeros" for="contenido" id="contenido_error" > letras y numeros  </label>
				 	<label class="errormsg tooShortNoNum" for="contenido" id="contenido_errorLength" > demasiado corto sin numeros </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="dia" class="fecha">Fecha</label>
				 	<input class="form-control" type = 'date' name = 'dia' id = 'dia' onblur="comprobarFechaNacimiento(this);" value="<?php echo date("Y-m-d") ?>" onkeydown="return false"  required>
				 	<label class="errormsg fechaNacimientoError" for="dia" id="dia_error" > fechaNacimientoError </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="hora" class="hora">Hora</label>
				 	<input class="form-control" type = 'time' name = 'hora' id = 'hora' onblur="comprobarHora(this);" value="<?php echo date("H:i") ?>" onkeydown="return false"  required>
				 	<label class="errormsg horaError" for="hora" id="hora_error" > error con la fecha </label><br>
				 	<?php if ($usuario->isAdmin()){ ?>
				 		<label class="timeHelp"></label>
				 	<?php } ?>
				 	
				</div>&nbsp;&nbsp;
				
				<button type="submit" name='action' class="btn btn-primary submit" value="EDIT" >
					 submit 
				</button>

			</form>

			
			<a href='../Controller/MENSAJES_Controller.php?action=SHOWCONVER&&idInter=<?php echo $this->lista['ID_INTERCAMBIO']; ?>'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>