<?php
//Clase : PRODUCTOS_CATEGORIAS_ADD_View
//Creado el : 10-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class PRODUCTOS_CATEGORIAS_ADD{

		var $datosCategorias;
		var $datosProductos;

		function __construct($datosCategorias,$datosProductos){
			$this->datosCategorias = $datosCategorias;	
			 $this->datosProductos = $datosProductos;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tadd"> <?php echo $strings['Tadd']; ?></title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="addProdCate">Añadir producto-categoria</h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=ADD' method='post' onsubmit="return comprobarProductosCategoria(this);" enctype="multipart/form-data">



				<div class="form-group">
				 	<label for="idCategoria" class="nombreCategoria">Nombre de la categoria</label>
				 	<select name="idCategoria" id="idCategoria" required>
				 		<?php foreach ($this->datosCategorias as $key) { ?>
				 			<?php echo var_dump($key) ?>
				 			<option value="<?php echo $key['ID'];?>"> <?php echo $key['NOMBRE_CATEGORIA']; ?></option>
				 		<?php }  ?>
					</select>

				 	<label class="errormsg idCategoriaError" for="idCategoria" id="idCategoria_error" >Error en la categoria </label>
				</div>&nbsp;&nbsp;
				 	
				<div class="form-group">
				 	<label for="idProducto" class="nombreCategoria">Nombre del producto</label>
				 	<select name="idProducto" id="idProducto" required>
				 		<?php foreach ($this->datosProductos as $key) { ?>
				 			<?php echo var_dump($key) ?>
				 			<option value="<?php echo $key['ID'];?>"> <?php echo $key['TITULO']; ?></option>
				 		<?php }  ?>
					</select>

				 	<label class="errormsg idProductoError" for="idProducto" id="idCategoria_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;
				
				<button type="submit" name='action' class="btn btn-primary submit" value="ADD" >
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