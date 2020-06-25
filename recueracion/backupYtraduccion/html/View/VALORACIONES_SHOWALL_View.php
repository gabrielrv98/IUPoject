<?php
//Clase : USUARIO_SHOWALL_View
//Creado el : 18-06-20
//Creado por: grvidal
//Muestra unos todas las valoraciones
//-------------------------------------------------------

class VALORACIONES_SHOWALL {

	var $lista;


	function __construct($datos){ 
		$this->lista = $datos;
		$this->render();
	}

	function render(){

		?>
		
		<head>
			<title class="TShowAll">Todo</title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>

		
		<h1 class="TShowAll"></h1>
		<a href = '../Controller/VALORACIONES_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/bolsa-de-la-compra.png' height="42" width="42" >
		</a>

		<a href = '../Controller/VALORACIONES_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<div>
		<table border = ¨1¨>
			<th class="idIntercambio">
				INTERCAMBIO
			</th>
			<th class="idProducto">
				PRODUCTO
			</th>
			<th class="coment">
				COMENTARIO
			</th>
			<th class="puntuacion">
				PUNTUACION
			</th>
			<?php 
			foreach ($this->lista as $key ) {  ?>

				<tr>			
					<td>
						<?php echo $key['ID_INTERCAMBIO'] ; ?>
					</td>
					<td>
						<?php echo $key['ID_PRODUCTO'],' ',$key['TITULO'] ; ?>
					</td>
					<td>
						<?php echo $key['COMENTARIO'] ; ?>
					</td>
					<td>
						<?php echo $key['PUNTUACION'] ; ?>
					</td>
				<?php if($usuario->isAdmin()){ // si el usuario es administrador es le ofrece busqeuda por otros usuarios
					?>
					<td>
						<a href = "../Controller/VALORACIONES_Controller.php?action=EDIT&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>

				<?php } ?>
					<td>
						<a href = "../Controller/VALORACIONES_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<?php if($usuario->isAdmin()){ // si el usuario es administrador es le ofrece busqeuda por otros usuarios		
					?>
					<td>
						<a href = "../Controller/VALORACIONES_Controller.php?action=DELETE&&id=<?php echo $key['ID']; ?>"  > 
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