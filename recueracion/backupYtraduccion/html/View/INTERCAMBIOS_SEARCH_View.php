<?php
//Clase : INTERCAMBIOS_ADD_View
//Creado el : 8-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class INTERCAMBIOS_SEARCH{

		var $productos;

		function __construct($productos){	
			$this->productos = $productos;
			$this->render();
		}

		function render(){ 
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tsearch"> Buscar</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="searchInter"></h1>	
			<form name = 'Form' action='../Controller/INTERCAMBIOS_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarCategoriasSearch(this);" enctype="multipart/form-data">
				 	
				<div class="form-group">
				 	<label for="idProd1" class="tituloProducto">Titulo producto</label>
				 	<br> 
				 	<select name="idProd1" id="idProd1" onchange="checkEqualsSearch(2,this);" required>
				 		<?php foreach ($this->productos as $key ) { //recorremos todos los productos?>
				 			<option value="<?php echo $key['ID'];?>"><?php echo $key['TITULO']; ?></option>
				 		<?php  } ?>
				 			<option value="" class="indiferente" selected>indiferente</option>
				 	</select>
				 	<label class="errormsg idRepetidos" for="idProd1" id="idProd1_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept1" class="accept1">Accept</label>
				 	<br> 
				 	<select id="accept1" name="accept1" onchange="comprobarAcceptSearch(this);" required>
				 		<option value="aceptado" class="aceptado"> Aceptado</option>
				 		<option value="denegado" class="denegado" >Denegado</option>
				 		<option value="" class="indiferente" selected>indiferente</option>
				 		
				 	</select>
				 	<label class="errormsg acceptError" for="accept1" id="accept1_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;


				<div class="form-group">
				 	<label for="idProd2" class="tituloProducto">Titulo producto</label>
				 	<br> 
				 	<select name="idProd2" id="idProd2" onchange="checkEqualsSearch(1,this);" required>
				 		<?php foreach ($this->productos as $key ) { //recorremos todos los productos?>
				 			<option value="<?php echo $key['ID'];?>"><?php echo $key['TITULO']; ?></option>
				 		<?php  } ?>
				 			<option value="" class="indiferente" selected>indiferente</option>
				 	</select>
				 	<label class="errormsg idRepetidos" for="idProd2" id="idProd2_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept2" class="accept2">Accept</label>
				 	<br> 
				 	<select id="accept2" name="accept2" onchange="comprobarAcceptSearch(this);" required>
				 		<option value="aceptado" class="aceptado"> Aceptado</option>
				 		<option value="denegado" class="denegado" >Denegado</option>
				 		<option value="" class="indiferente" selected>indiferente</option>
				 		
				 	</select>
				 	<label class="errormsg acceptError" for="accept2" id="accept2_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>

			
			<a href='../Controller/INTERCAMBIOS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>