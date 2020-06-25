<?php
//Clase : VALORACIONES_SEARCH_View
//Creado el : 18-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y busca valoraciones que coincidan con esos datos
//-------------------------------------------------------

	class VALORACIONES_SEARCH{

		var $producto;
		var $intercambios;
		function __construct($producto,$intercambios){	
			$this->producto = $producto ;	
			$this->intercambios = $intercambios ;
			$this->render();
		}

		function render(){ 
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tsearch"> Buscar</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="searchProducto"></h1>	
			<form name = 'Form' action='../Controller/VALORACIONES_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarCategoriasSearch(this);" enctype="multipart/form-data">
				 	
				<div class="form-group" >
				 	<label for="idInter" class="intercambios">producto </label> 
				 	<br> 
				 	<select id="idInter" name="idInter">
				 		<option value="" class="indiferente" selected> </option>
				 		<?php foreach ($this->intercambios as $key) { //se recorren los intercambios?>
				 			
				 			<option value="<?php echo $key['ID']; ?>"><?php echo $key['ID']; ?> </option>

				 	<?php	} ?>
				 			
				 	</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="idProd" class="producto">producto </label> 
				 	<br> 
				 	<select id="idProd" name="idProd">
				 		<option value="" class="indiferente" selected> </option>
				 		<?php foreach ($this->producto as $prod) { ?>
				 			
				 			<option value="<?php echo $prod['ID']; ?>"><?php echo $prod['TITULO']; ?> </option>

				 	<?php	} ?>
				 			
				 	</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label for="coment" class="coment"> </label> 
				 	<br> 
				 	<textarea name="coment" id="coment" cols='80' rows='3' onblur="comprobarAlfabeticoEnterVacio(this,200);" ></textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="coment_error" > letrasynumeros  </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label for="punt" class="puntuacion"> </label> 
				 	<br> 
				 	<input type="number" name="punt" id="punt" onchange="comprobarPuntuacionVacio(this);" >
				 	<label class="errormsg onlynumbers" for="punt" id="punt_error" > Solo numeros </label>
				 	<label class="errormsg outLimit" for="punt" id="punt_limited" > Out of limit </label>
				 	<label class="errormsg paramVacio" for="punt" id="punt_errorLength" > No vacio </label>
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
					submit
				</button>

			</form>

			
			<a href='../Controller/VALORACIONES_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>