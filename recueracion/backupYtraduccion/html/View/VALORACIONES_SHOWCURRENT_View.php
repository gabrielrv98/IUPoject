<?php
//Clase : VALORACIONES_SHOWCURRENT_View
//Creado el : 18-06-20
//Creado por: grvidal
//Muestra los detalles de la categoria seleccionada
//-------------------------------------------------------

class VALORACIONES_SHOWCURRENT {

	var $lista;

	function __construct($datos){

		$this->lista = $datos;
		$this->render();
	}

	function render(){  
		?>
		
		<head>
			<title class="TShowC"></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings
		?>

		
		<h1 class="TShowC"></h1>
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
				<tr>
					<td>
						<?php echo $this->lista['ID_INTERCAMBIO'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['ID_PRODUCTO'],' ',$this->lista['TITULO'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['COMENTARIO'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['PUNTUACION'] ; ?>
					</td>
				</tr>
			
		</table>
	</div>
	
	<br>

	<div>
		<label   class="producto" style="font-size: 150%; text-decoration: underline;"></label> <br>
		<br>
		<a href="../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->lista['ID_PRODUCTO']; ?>"> <?php echo $this->lista['TITULO'] ?> </a><br>
	</div>

	<div>
		<label   class="intercambios" style="font-size: 150%; text-decoration: underline;"></label> <br>
		<br>
		<a href="../Controller/INTERCAMBIOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->lista['ID_INTERCAMBIO']; ?>"> <?php echo $this->lista['ID_INTERCAMBIO'] ?> </a><br>
	</div>
		
		<br>
		<a href="../../Controller/VALORACIONES_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>