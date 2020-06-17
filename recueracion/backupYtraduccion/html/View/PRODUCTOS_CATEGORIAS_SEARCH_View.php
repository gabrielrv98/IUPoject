<?php
//Clase : PRODUCTOS_CATEGORIAS_ADD_View
//Creado el : 10-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class PRODUCTOS_CATEGORIAS_SEARCH{

		var $datosProductos;
		var $datosCategorias;

		function __construct($productos, $categorias){
		$this->datosProductos = $productos;	
		$this->datosCategorias = $categorias;	
			$this->render();
		}

		function render(){ 
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tsearch"> Buscar</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings 
			include_once '../Model/USUARIOS_Model.php';
					$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando
					$usuariosProductos = $usuario->getUsuariosConProductos();//recuperamos los nombres de las personas con productos en oferta?>
			<h1 class="searchProductoCategoria">Buscar</h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarProductosCategoriaSearch(this);" enctype="multipart/form-data">
				 	
				<div class="form-group"><!-- Texto para la categoria  -->
				 	<label for="idCategoria" class="idCategoria">ID categoria</label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'idCategoria' id = 'idCategoria' placeholder = 'Numero' size = '30' onblur="comprobarEnteroVacio(this);">
				 	<label class="errormsg onlynumbers" for="idCategoria" id="idCategoria_error" > Solo numeros </label>
				 	<label class="errormsg tooShortNoNum" for="idCategoria" id="idCategoria_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group"><!-- Select para la categoria  -->
				 	<label for="idCategoria" class="nombreCategoria">Nombre de la categoria</label>
				 	<select name="idCategoria" id="idCategoriaSelect" onchange="changeIDCategorias(this,'idCategoria');">
				 		<?php foreach ($this->datosCategorias as $key) { ?>
				 			<?php echo var_dump($key) ?>
				 			<option value="<?php echo $key['ID'];?>"> <?php echo $key['NOMBRE_CATEGORIA']; ?></option>
				 		<?php }  ?>
					</select>

				 	<label class="errormsg idCategoriaError" for="idCategoriaSelect" id="idCategoriaSelect_error" >Error en la categoria </label>
				</div>&nbsp;&nbsp;

				<div class="form-group"><!-- Texto para el producto  -->
				 	<label for="idProducto" class="idProducto">ID producto</label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'idProducto' id = 'idProducto' placeholder = 'Numero' size = '30' onblur="comprobarEnteroVacio(this);">
				 	<label class="errormsg onlynumbers" for="idProducto" id="idProducto_error" > Solo numeros </label>
				</div>&nbsp;&nbsp;

				<div class="form-group"><!-- Select para el producto  -->
				 	<label for="idProducto" class="nombreCategoria">Nombre del producto</label>
				 	<select name="idProductoSelect" id="idProductoSelect" onchange="changeIDCategorias(this,'idProducto');">
				 		<?php foreach ($this->datosProductos as $key) { ?>
				 			<?php echo var_dump($key) ?>
				 			<option value="<?php echo $key['ID'];?>"> <?php echo $key['TITULO']; ?></option>
				 		<?php }  ?>
					</select>

				 	<label class="errormsg idProductoError" for="idProductoSelect" id="idProductoSelect_error" >Error en la categoria </label>
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
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