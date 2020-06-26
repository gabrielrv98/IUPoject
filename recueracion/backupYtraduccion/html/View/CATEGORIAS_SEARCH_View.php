<?php
//Clase : CATEGORIAS_SEARCH_View
//Creado el : 8-06-2020
//Creado por: grvidal
//Muestra el formulario de buscar categorias, que consta de el nombre de la categoria y los manda por post a CATEGORIAS_CONTROLLER con el action SEARCH
//-------------------------------------------------------

	class CATEGORIAS_SEARCH{


		function __construct(){	
			$this->render();
		}

		function render(){ 
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tsearch"> Buscar</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings?>
			<h1 class="searchProducto"></h1>	
			<form name = 'Form' action='../Controller/CATEGORIAS_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarCategoriasSearch(this);" enctype="multipart/form-data">
				 	
				<div class="form-group">
				 	<label for="nombre" class="nombreCategoria">nombreCategoria</label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabeticoVacio(this,50);">
				 	<label class="errormsg letrasynumeros" for="nombre" id="nombre_error" > letrasynumeros </label>
				 	<label class="errormsg tooShortNoNum" for="nombre" id="nombre_errorLength" > tooShortNoNum </label>
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
					submit
				</button>

			</form>

			
			<a href='../Controller/CATEGORIAS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>