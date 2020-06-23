<?php
//Clase : USUARIO_SHOWALL_View
//Creado el : 2-06-20
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los PRODUCTOS
//-------------------------------------------------------

class PRODUCTOS_SHOWALL {

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

		<?php include '../View/Header.php'; //header necesita los strings ?>

		
		<h1 class="TShowAll"></h1>
		<a href = '../Controller/PRODUCTOS_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/bolsa-de-la-compra.png' height="42" width="42" >
		</a>
		<a href = '../Controller/PRODUCTOS_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<div>
		<table border = ¨1¨>
			<th class="tituloProducto">
				titulo
			</th>
			<th class="descripcionProducto">
				descripcion
			</th>
			<th class="fotoProducto">
				foto
			</th>
			<th class="horasUnidades">
				horas o unidades
			</th>
			<th class="name">
				nombre
			</th>
			<th class="estado">
				estado
			</th>
			<?php 
			foreach ($this->lista as $key ) {  ?>

				<tr>
					<td>
						<?php  
						echo $key['TITULO']; ?>
					</td>
					<td>
						<?php echo $key['DESCRIPCION'] ; ?>
					</td>
					<td>
						<img src="<?php echo $key['FOTO'];?>" height="42" width="42">
					</td>
					<td>
						<?php echo $key['HORAS_UNIDADES'] ; ?>
					</td>
					<td>
						<?php  
						echo $key['NOMBRE'], " " , $key['APELLIDOS'] ; 
						?>
					</td>
					<td class="<?php  echo $key['ESTADO']; ?>">
						<?php  echo $key['ESTADO']; ?>
					</td>
					<td>
						<a href = "../Controller/PRODUCTOS_Controller.php?action=EDIT&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/PRODUCTOS_Controller.php?action=DELETE&&id=<?php echo $key['ID']; ?>"  > 
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