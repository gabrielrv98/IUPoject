<?php
//Clase : VALORACIONES_DELETE_View
//Creado el : 18-06-2020
//Creado por: grvidal
//Muestra los campos de una valoracion antes de eliminarlo
//-------------------------------------------------------
	class VALORACIONES_DELETE{


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
			<form name = 'Form' action='../Controller/VALORACIONES_Controller.php?action=EDIT' method='post' onsubmit="return comprobarUsuarios(this);">


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
					<label for="idProd" class="producto"> </label> 
				 	<br> 
				 	<input type="text" name="idProd" id="idProd" value="<?php echo $this->valores['ID_PRODUCTO'] ?>" size="1" readonly>
				</div>

				<div class="form-group">
					<label for="coment" class="coment"> </label> 
				 	<br> 
				 	<textarea name="coment" id="coment" cols='80' rows='3' onblur="comprobarAlfabeticoEnter(this,200);" readonly><?php echo $this->valores['COMENTARIO']; ?></textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="coment_error" > letras y numeros  </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="coment_errorLength" > demasiado corto sin numeros </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label for="punt" class="puntuacion"> </label> 
				 	<br> 
				 	<input type="number" name="punt" id="punt" onchange="comprobarPuntuacion(this);" value="<?php echo $this->valores['PUNTUACION'] ?>" readonly>
				 	<label class="errormsg onlynumbers" for="punt" id="punt_error" > Solo numeros </label>
				 	<label class="errormsg outLimit" for="punt" id="punt_limited" > Out of limit </label>
				 	<label class="errormsg paramVacio" for="punt" id="punt_errorLength" > No vacio </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="DELETE" >
					<?php echo $strings['submit'] ; ?>
				</button>
				 
			</form>
				
		
			<a href='../Controller/VALORACIONES_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>