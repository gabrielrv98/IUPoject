<?php
//Clase : PRODUCTOS_CATEGORIAS_DELETE_View
//Creado el : 11-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

		class PRODUCTOS_CATEGORIAS_DELETE{

		var $valores;

		function __construct($valores){	
			$this->valores = $valores;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit"> <?php echo $strings['Tedit']; ?></title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings 
		 ?>
			<h1 class="eliminarProductoCategoria">Eliminar producto_categoria</h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=DELETE' method='post' onsubmit="return comprobarProducto(this);" enctype="multipart/form-data">
				 	
				<div class="form-group"><!-- Texto para la categoria  -->
				 	<label for="idCategoria" class="idCategoria">ID categoria</label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'idCategoria' id = 'idCategoria' placeholder = 'Numero' size = '30' onblur="comprobarEntero(this);" value="<?php echo $this->valores['CATEGORIAS_ID'] ?>" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group"><!-- Texto para la categoria  -->
				 	<label for="nombreCategoria" class="nombreCategoria">Nombre categoria</label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'nombreCategoria' id = 'nombreCategoria' placeholder = 'Numero' size = '30'  value="<?php echo $this->valores['NOMBRE_CATEGORIA'] ?>" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group"><!-- Texto para el producto  -->
				 	<label for="idProducto" class="idProducto">ID producto</label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'idProducto' id = 'idProducto' placeholder = 'Numero' size = '30' onblur="comprobarEntero(this);" value="<?php echo $this->valores['PRODUCTO_ID'] ?>" readonly>
				</div>&nbsp;&nbsp;
				<div class="form-group"><!-- Texto para la categoria  -->
				 	<label for="nombreProducto" class="nombreProducto">Nombre producto</label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'nombreProducto' id = 'nombreProducto' placeholder = 'Numero' size = '30'  value="<?php echo $this->valores['TITULO'] ?>" readonly>
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary submit" value="DELETE" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>

			
			<a href='../Controller/PRODUCTOS_CATEGORIAS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>