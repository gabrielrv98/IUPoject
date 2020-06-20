<?php
//Clase : INTERCAMBIOS_SHOWCURRENT_View
//Creado el : 19-06-20
//Creado por: grvidal
//Muestra los detalles de la categoria seleccionada
//-------------------------------------------------------

class INTERCAMBIOS_SHOWCURRENT {

	var $lista;
	var $nombre1;
	var $nombre2;

	function __construct($datos,$nombre1,$nombre2){

		$this->nombre1 = $nombre1;
		$this->nombre2 = $nombre2;
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
			<th>
				ID
			</th>
			<th class="idProd1">
				ID prod 1
			</th>
			<th class="idProd2">
				ID prod 2
			</th>
			<th class="unid1">
				Unidades 1
			</th>
			<th class="unid2">
				Unidades 2
			</th>
			<th class="accept1">
				Aceptacion 1
			</th>
			<th class="accept1">
				Aceptacion2
			</th>
				<tr>
					<td>
						<?php  
						echo $this->lista['ID']; ?>
					</td>
					<td>
						<?php echo $this->lista['ID_PRODUCTO1'], " ",$this->nombre1 ; ?>
					</td>
					<td>
						<?php echo $this->lista['ID_PRODUCTO2'], " ",$this->nombre2 ; ?>
					</td>
					<td>
						<?php echo $this->lista['UNIDADES1'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['UNIDADES2'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['ACCEPT1'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['ACCEPT2'] ; ?>
					</td>
				</tr>
			
		</table>
	</div>
	
	<br>

	<div>
		<label   class="verProd" style="font-size: 150%; text-decoration: underline;">Ver</label><label style="font-size: 150%; text-decoration: underline;"> 1</label> <br>
		
			<a href="../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->lista['ID_PRODUCTO1']; ?>"> <?php echo $this->nombre1 ?> </a>
		<br><br>
		
	</div>
	<div>
		<label   class="verProd" style="font-size: 150%; text-decoration: underline;">Ver</label><label style="font-size: 150%; text-decoration: underline;"> 2</label> <br>
		
			<a href="../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->lista['ID_PRODUCTO2']; ?>"> <?php echo $this->nombre2 ?> </a>
		<br><br>
		
	</div>

		<br>
		<a href="../../Controller/INTERCAMBIOS_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>