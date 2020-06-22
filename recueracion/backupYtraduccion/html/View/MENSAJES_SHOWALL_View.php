<?php
//Clase : MENSAJES_SHOWALL_View
//Creado el : 20-06-20
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los MENSAJES
//-------------------------------------------------------

class MENSAJES_SHOWALL {

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
		<a href = '../Controller/MENSAJES_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/bolsa-de-la-compra.png' height="42" width="42" >
		</a>

		<a href = '../Controller/MENSAJES_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<div>
		<table border = ¨1¨>
			<th class="titulosMsg">
				TITULO PRODUCTO
			</th>
			<th class="fecha">
				FECHA
			</th>
			<th class="usuario">
				USUARIO
			</th>
			<th class="coment">
				PUNTUACION
			</th>
			<?php foreach ($this->lista as $key ) { ?>

					<tr>			
						<td>
							<?php echo $key['TITULO1'], " <-> ", $key['TITULO2']; ?>
						</td>
						<td>
							<?php echo $key['FECHA']; ?>
						</td>
						<td>
							<?php echo $key['LOGIN_USUARIO']; ?>
						</td>
						<td>
							<?php echo $key['CONTENIDO']; ?>
						</td>

						<td>
							<a href = "../Controller/MENSAJES_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID_INTERCAMBIO']; ?>"  > 
								<img src='../View/icon/showuser.ico'>
							</a>
						</td>
						<?php if($usuario->isAdmin()){ // si el usuario es administrador puede eliminar toda la conversaicon directamente	
						?>
						<td>
							<a href = "../Controller/MENSAJES_Controller.php?action=DELETE&&id=<?php echo $key['ID_INTERCAMBIO']; ?>"  > 
								<img src='../View/icon/bolsa-de-la-compra_delete.png' height="42" width="42">
							</a>
						</td>
						<?php }		?>
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