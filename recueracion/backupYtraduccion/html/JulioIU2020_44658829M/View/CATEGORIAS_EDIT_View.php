<?php
//Clase : CATEGORIAS_EDIT_View
//Creado el : 8-06-2020
//Creado por: grvidal
//Muestra el formulario de editar una categoria, que consta de el nombre de la categoria y los manda por post a CATEGORIAS_CONTROLLER con el action EDIT
//-------------------------------------------------------

	class CATEGORIAS_EDIT{


		var $valores;

		function __construct($valores){	
			//session_start();
			$this->valores = $valores;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit"> Tedit</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<!--  Titulo -->
			<h1 class="editCategoria"></h1>	
			<!--  Inicio del formulario-->
			<form name = 'Form' action='../Controller/CATEGORIAS_Controller.php?action=EDIT' method='post' onsubmit="return comprobarCategoriaEdit(this);" enctype="multipart/form-data">

				<!--ID de la Categoria  -->
				<div class="form-group">
				 	<label for="id" class="idCategoria">idCategoria</label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'id' id = 'id' value="<?php echo $this->valores['ID'] ;?>" onblur="comprobarEntero(this);" readonly>
				</div>&nbsp;&nbsp;
				 	
				 <!--Nombre de la Categoria  -->
				<div class="form-group">
				 	<label for="nombre" class="nombreCategoria">nombreCategoria </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabetico(this,50);" value="<?php echo $this->valores['NOMBRE_CATEGORIA'] ;?>" required>
				 	<!-- Cadena de control de error -->
				 	<label class="errormsg letrasynumeros" for="nombre" id="nombre_error" > letrasynumeros </label>
				 	<label class="errormsg tooShortNoNum" for="nombre" id="nombre_errorLength" > tooShortNoNum </label>
				</div>&nbsp;&nbsp;
				
				<button type="submit" name='action' class="btn btn-primary submit" value="EDIT" >
					submit
				</button>

			</form>

			<!-- Boton de submit  -->
			<a href='../Controller/CATEGORIAS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>