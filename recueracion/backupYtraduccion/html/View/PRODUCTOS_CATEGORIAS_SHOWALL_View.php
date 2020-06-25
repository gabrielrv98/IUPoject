<?php
//Clase : PRODUCTOS_CATEGORIAS_SHOWCURRENT_View
//Creado el : 2-06-20
//Creado por: grvidal
//Muestra una tabla con todos los productos categorias
//-------------------------------------------------------

class PRODUCTOS_CATEGORIAS_SHOWALL {

	var $lista;


	function __construct($datos){ 
		$this->lista = $datos;
		$this->render();
	}

	function render(){
		?>
		
		<head>
			<title class="TShowAll"> TShowAll </title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings?>

		
		<h1 class="TShowAll"></h1>
		<a href = '../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/bolsa-de-la-compra.png' height="42" width="42" >
		</a>
		<a href = '../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
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
			<?php 
			foreach ($this->lista as $key ) {  ?>

				<tr>		
					<td>
						<?php echo $key['PRODUCTO_ID'] ; ?>
					</td>
					<td>
						<?php echo $key['TITULO'] ; ?>
					</td>	
					<td>
						<?php echo $key['CATEGORIAS_ID'] ; ?>
					</td>
					<td>
						<?php echo $key['NOMBRE_CATEGORIA'] ; ?>
					</td>

					<td>
						<a href = "../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=EDIT&&idP=<?php echo $key['PRODUCTO_ID']; ?>&&idC=<?php echo $key['CATEGORIAS_ID'];?>"> 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>

					<td>
						<a href = "../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=SHOWCURRENT&&idP=<?php echo $key['PRODUCTO_ID']; ?>&&idC=<?php echo $key['CATEGORIAS_ID'];?>"> 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					
					<td>
						<a href = "../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=DELETE&&idP=<?php echo $key['PRODUCTO_ID']; ?>&&idC=<?php echo $key['CATEGORIAS_ID'];?>"> 
							<img src='../View/icon/bolsa-de-la-compra_delete.png' height="42" width="42">
						</a>
					</td>
				</tr>
			<?php }		?>
			
		</table>
	</div>
		<br>
		<a href="../../Controller/Index_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>