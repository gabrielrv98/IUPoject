<?php
//Clase : CATEGORIAS_ADD_View
//Creado el : 8-06-2020
//Creado por: grvidal
//Muestra el formulario de añadir una categoria, que consta de el nombre de la categoria y los manda por post a CATEGORIAS_CONTROLLER con el action ADD
//-------------------------------------------------------

	class CATEGORIAS_ADD{


		function __construct(){	
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tadd"> Tadd</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
		<!--  Titulo -->
			<h1 class="addCategoria"></h1>	

			<!--  Inicio del formulario-->
			<form name = 'Form' action='../Controller/CATEGORIAS_Controller.php?action=ADD' method='post' onsubmit="return comprobarCategoria(this);" enctype="multipart/form-data">
				 	

				 <!--Nombre de la Categoria  -->
				<div class="form-group">
					<!--  Etiqueta de referencia-->
				 	<label for="nombre" class="nombreCategoria">nombreCategoria </label> 
				 	<br> 
				 	<!-- Entrada de datos  -->
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabetico(this,50);" required>
				 	<!-- Cadena de control de error -->
				 	<label class="errormsg letrasynumeros" for="nombre" id="nombre_error" > letrasynumeros </label>
				 	<label class="errormsg tooShortNoNum" for="nombre" id="nombre_errorLength" > tooShortNoNum </label>
				</div>&nbsp;&nbsp;
				
				<!-- Boton de submit  -->
				<button type="submit" name='action' class="btn btn-primary submit" value="ADD" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>

			
			<a href='../Controller/CATEGORIAS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>