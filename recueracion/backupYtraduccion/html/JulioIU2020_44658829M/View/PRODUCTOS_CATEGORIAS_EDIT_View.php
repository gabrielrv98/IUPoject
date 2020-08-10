<?php
//Clase : PRODUCTOS_CATEGORIAS_EDIT_View
//Creado el : 11-06-2020
//Creado por: grvidal
//Muestra los atributos de pructo_categoria y y permite editarlos todos menos el id 
//-------------------------------------------------------

	class PRODUCTOS_CATEGORIAS_EDIT{

		var $valores;
		var $productos;
		var $categorias;

		function __construct($valores,$datosP,$datosC){	
			$this->valores = $valores;
			$this->productos = $datosP;
			$this->categorias = $datosC;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit">  Tedit </title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>

			<h1 class="editarProductoCategoria">Editar producto-Categoria</h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=EDIT' method='post' onsubmit="return comprobarProductosCategorias(this);" enctype="multipart/form-data">

				<label class="ClavesForaneasPermanentes">Las claves no se pueden cambiar </label><br><br>
				<div class="form-group"><!-- Select para la categoria  -->
				 	<label for="idCategoria" class="nombreCategoria">Nombre de la categoria</label>
				 	<select name="idCategoria" id="idCategoria" onchange="changeIDCategorias(this,'idCategoria');">
				 		<?php foreach ($this->categorias as $key) { ?>
				 			<option value="<?php echo $key['ID'];?>" <?php if($key['ID'] != $this->valores['CATEGORIAS_ID']) echo "disabled"; ?> > <?php echo $key['NOMBRE_CATEGORIA']; ?></option>
				 		<?php }  ?>
					</select>

				 	<label class="errormsg idCategoriaError" for="idCategoriaSelect" id="idCategoriaSelect_error" >Error en la categoria </label>
				</div>&nbsp;&nbsp;

				<div class="form-group"><!-- Select para el producto  -->
				 	<label for="idProducto" class="nombreCategoria">Nombre del producto</label>
				 	<select name="idProducto" id="idProducto" onchange="changeIDCategorias(this,'idProducto');">
				 		<?php foreach ($this->productos as $key) {
				 			echo var_dump($key); ?>
				 			<option value="<?php echo $key['ID'];?>" <?php if($key['ID'] != $this->valores['PRODUCTO_ID']) echo "disabled"; ?> > <?php echo $key['TITULO']; ?></option>
				 		<?php }  ?>
					</select>

				 	<label class="errormsg idProductoError" for="idProductoSelect" id="idProductoSelect_error" >Error en la categoria </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="EDIT" >
					 submit 
				</button>

			</form>

			
			<a href='../Controller/PRODUCTOS_CATEGORIAS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin edit

?>