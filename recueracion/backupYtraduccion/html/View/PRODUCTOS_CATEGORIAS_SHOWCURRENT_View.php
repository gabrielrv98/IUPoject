<?php
//Clase : USUARIO_SHOWCURRENT_View
//Creado el : 11-06-20
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los PRODUCTOS_CATEGORIAS
//-------------------------------------------------------

class PRODUCTOS_CATEGORIAS_SHOWCURRENT {

	var $lista;


	function __construct($datos){ 
		$this->lista = $datos;
		$this->render();
	}

	function render(){ 
		?>
		
		<head>
			<title class="TShowC"><?php echo $strings['TShowC']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings
		?>

		
		<h1 class="TShowC"></h1>
		<div>
		<table border = ¨1¨>
			<th class="idProducto">
				id Producto
			</th>
			<th class="tituloProducto">
				nombre Producto
			</th>
			<th class="idCategoria">
				ID categoria
			</th>
			<th class="nombreCategoria">
				nombre categoria
			</th>
				<tr>
					<td>
						<?php  
						echo $this->lista['PRODUCTO_ID']; ?>
					</td>
					<td>
						<?php echo $this->lista['TITULO'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['CATEGORIAS_ID'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['NOMBRE_CATEGORIA'] ; ?>
					</td>
					
				</tr>
			
		</table>
	</div>
	<br><br>
	<div>
		<label class="enlaceProducto">Enlace al producto</label> <br>
		<a href="../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->lista['PRODUCTO_ID']; ?>"> <?php echo $this->lista['TITULO'] ?> </a>
		<br>
	</div>
	<br><br>
	<div>
		<label class="enlaceCategoria">Enlace al categoria</label> <br>
		<a href="../Controller/CATEGORIAS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->lista['CATEGORIAS_ID']; ?>"> <?php echo $this->lista['NOMBRE_CATEGORIA'] ?> </a>
	</div>

		<br>
		<a href="../../Controller/PRODUCTOS_CATEGORIAS_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>