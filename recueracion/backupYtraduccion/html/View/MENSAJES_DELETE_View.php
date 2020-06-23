<?php
//Clase : MENSAJES_DELETE_View
//Creado el : 22-06-2020
//Creado por: grvidal
//Muestra los campos de la tupla antes de eliminarlo
//-------------------------------------------------------
	class MENSAJES_DELETE{


		var $valores;

		function __construct($valores){	
			$this->valores = $valores;
			$this->render();
		}

		function render(){
		?>
			<head>
				<link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
				<title class="Tdelete"> <?php echo $strings['Tdelete']; ?> </title>
			</head> 

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="deleteUser"></h1>	
			<form name = 'Form' action='../Controller/MENSAJES_Controller.php?action=EDIT' method='post' onsubmit="return comprobarUsuarios(this);">


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
					<label for="contenido" class="contenido"> </label> 
				 	<br> 
				 	<textarea name="contenido" id="contenido" cols='80' rows='3' onblur="comprobarAlfabeticoEnter(this,200);" readonly><?php echo $this->valores['CONTENIDO']; ?></textarea> 
				 	<label class="errormsg letrasynumeros" for="contenido" id="contenido_error" > letras y numeros  </label>
				 	<label class="errormsg tooShortNoNum" for="contenido" id="contenido_errorLength" > demasiado corto sin numeros </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label for="dia" class="FECHA"> </label> 
				 	<br> 
				 	<input type="text" name="dia" id="dia" value="<?php echo $this->valores['FECHA'] ?>"  readonly>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="DELETE" >
					<?php echo $strings['submit'] ; ?>
				</button>
				 
			</form>
				
		
			<a href='../Controller/MENSAJES_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>