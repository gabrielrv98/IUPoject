<?php
//Clase : MENSAJES_ADD_View
//Creado el : 20-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class MENSAJES_ADD{

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
			<form name = 'Form' action='../Controller/MENSAJES_Controller.php?action=ADD' method='post' onsubmit="return comprobarValoracion(this);" enctype="multipart/form-data">
				 	
				<div class="form-group">
				 	<label for="idInter" class="intercambios">Intercambio </label> 
				 	<br> 
				 	<select id="idInter" name="idInter" onchange="colocarProductos(this)" required>
				 		<?php $control1 = 0; //variable de control
				 			 $control2 = 0; //variable de control
				 		 foreach ($this->intercambios as $inter) { // se recorren todos los intercambios
				 				foreach ($this->productos as $prod) {//se busca los productos en dicho intercambio y se guarda el nombre
				 				 	if($inter['ID_PRODUCTO1'] == $prod['ID']){
				 				 		$nombre1 = $prod['TITULO'];
				 				 		if ($control1 == 0){
				 				 			$id1 =  $prod['ID'];
				 				 			$nombreText1 = $prod['TITULO'];
				 				 		} 
				 				 		$control1 = 1;
				 				 	} 
				 				 	if($inter['ID_PRODUCTO2'] == $prod['ID']){
				 				 		$nombre2 = $prod['TITULO'];
				 				 		if ($control2 == 0){
											$id2 =  $prod['ID'];
				 				 			$nombreText2 = $prod['TITULO'];
				 				 		} 
				 				 		$control2 = 1;
				 				 	} 
				 				 	
				 				 } ?>
				 			<option value="<?php echo $inter['ID'] ?>"><?php echo $inter['ID_PRODUCTO1'],":",$nombre1," - ",$inter['ID_PRODUCTO2'],":",$nombre2 ?></option>
				 		<?php } ?>
				 	</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					
				 	<input type="checkbox" name="id1" id="id1" onchange="desactivarCheckBox(this);" checked="true"><label id="tituloProd1" ><?php echo $nombreText1; ?></label><br>

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
				 	<label class="errormsg letrasynumeros" for="descripcion" id="coment_error" > <?php echo $strings['letrasynumeros'] ?>  </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="coment_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
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

			
			<a href='../Controller/MENSAJES_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>