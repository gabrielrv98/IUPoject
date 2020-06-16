<?php
//Clase : USUARIO_SHOWALL_View
//Creado el : 2-06-20
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los PRODUCTOS_CATEGORIAS
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
			<title class="TShowAll"><?php echo $strings['TShowAll']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings
		include_once '../Model/USUARIOS_Model.php';
					$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando ?>

		
		<h1 class="TShowAll"><?php echo $strings['TShowAll']; ?></h1>
		<?php 
				if($usuario->isAdmin()){ // si el usuario es administrador puede añadir categorias
					?>
		<a href = '../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/bolsa-de-la-compra.png' height="42" width="42" >
		</a>

		<?php } ?>

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
					<td>
						<?php echo $key['CATEGORIAS_ID'] ; ?>
					</td>
					<td>
						<?php echo $key['NOMBRE_CATEGORIA'] ; ?>
					</td>
					</td>
				<?php if($usuario->isAdmin()){ // si el usuario es administrador es le ofrece busqeuda por otros usuarios
					?>
					<td>
						<a href = "../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=EDIT&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>

				<?php } ?>
					<td>
						<a href = "../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<?php if($usuario->isAdmin()){ // si el usuario es administrador es le ofrece busqeuda por otros usuarios		
					?>
					<td>
						<a href = "../Controller/PRODUCTOS_CATEGORIAS_Controller.php?action=DELETE&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/bolsa-de-la-compra_delete.png' height="42" width="42">
						</a>
					</td>
					<?php } ?>
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