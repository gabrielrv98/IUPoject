<?php
//Clase : VALORACIONES_ADD_View
//Creado el : 18-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y añade la valoracion de un producto referente a un intercambio
//-------------------------------------------------------

	class VALORACIONES_ADD{

		var $intercambios;
		var $usuario;

		// añadir variable que sea 1 o 2 para prod1 o 2
		function __construct($intercambios,$usuario){	
			$this->intercambios = $intercambios;
			$this->usuario = $usuario;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tadd"> añadir</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="addValoracion"></h1>	
			<form name = 'Form' action='../Controller/VALORACIONES_Controller.php?action=ADD' method='post' onsubmit="return comprobarValoracion(this);" enctype="multipart/form-data">

			<?php if ($this->intercambios->num_rows === 0) { ?>
				<label class="noValoracionesAun tituloStyle errormsg" style="visibility: visible;"></label><br><br>
			<?php } ?>
				
				 	
				<div class="form-group">
				 	<label for="idInter" class="intercambios">Intercambio </label> 
				 	<br> 
				 	<select id="idInter" name="idInter" onchange="colocarProductos(this)" required>
				 		<?php $control = 0; //variable de control
				 				$id1 =  "";
				 				$nombreText1 = "productoEjemplo1";
				 				$id2 =  "";
				 				$nombreText2 = "productoEjemplo2"; 
				 		 foreach ($this->intercambios as $inter) { // se recorren todos los intercambios
				 		 	if ($control == 0) {
				 		 		$id1 =  $inter['ID1'];
				 				$nombreText1 = $inter['TITULO1'];
				 				$id2 =  $inter['ID2'];
				 				$nombreText2 = $inter['TITULO2']; 
				 		 		$control = 1;
				 		 	} ?>
									

				 			<option value="<?php echo $inter['ID'] ?>"><?php echo $inter['ID1'],":",$inter['TITULO1']," - ",$inter['ID2'],":",$inter['TITULO2'] ?></option>
				 		<?php } ?>
				 	</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label class="productoAValorar tituloStyle"></label><br>
					<label class="eligeElOtro"></label><br><br>
					
				 	<input type="checkbox" name="id1" id="id1" onchange="desactivarCheckBox(this);" checked="true"
				 	<?php //if ($this->usuario->RellenaDatos()['DNI'] == ) {
				 		# code...
				 	//} ?>
				 	><label id="tituloProd1" ><?php echo $nombreText1; ?></label><br>

				 	<input type="checkbox" name="id2" id="id2" onchange="desactivarCheckBox(this);"><label id="tituloProd2" ><?php echo $nombreText2; ?></label>

				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label for="idProd" class="producto"> </label> 
				 	<br> 
				 	<input type="text" name="idProd" id="idProd" value="<?php echo $id1 ?>" size="1" readonly>
				</div>

				<div class="form-group">
					<label for="coment" class="coment"> </label> 
				 	<br> 
				 	<textarea name="coment" id="coment" cols='80' rows='3' onblur="comprobarAlfabeticoEnter(this,200);" ></textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="coment_error" > letrasynumeros </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="coment_errorLength" > tooShortNoNum</label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label for="punt" class="puntuacion"> </label> 
				 	<br> 
				 	<input type="number" name="punt" id="punt" onchange="comprobarPuntuacion(this);" required>
				 	<label class="errormsg onlynumbers" for="punt" id="punt_error" > Solo numeros </label>
				 	<label class="errormsg outLimit" for="punt" id="punt_limited" > Out of limit </label>
				 	<label class="errormsg paramVacio" for="punt" id="punt_errorLength" > No vacio </label>
				</div>&nbsp;&nbsp;

				
				<button type="submit" name='action' class="btn btn-primary submit" value="ADD" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>

			
			<a href='../Controller/VALORACIONES_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>