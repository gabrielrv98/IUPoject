<?php
//Clase : MEJORES_INTERCAMBIOS
//Creado el : 23-06-20
//Creado por: grvidal
//Muestra el ranking por intercambios
//-------------------------------------------------------

class MEJORES_INTERCAMBIOS {

	var $lista;


	function __construct($datos){
		$this->lista = $datos;
		$this->render();
	}

	function render(){ 
		?>
		
		<head>
			<title class="TShowAll"> TShowAll s ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>

		
		<h1 class="TShowAll"></h1>
		<label class="rankingIntercambiosExplicacion">explicacion</label><br>
		<a href = '../Controller/INTERCAMBIOS_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<div>
		<table border = ¨1¨>
			<th class="puesto">
				Puesto
			</th>
			<th class="titulosMsg">
				titulos de productos
			</th>
			<th class="unid1">
				Unidades 1
			</th>
			<th class="unid2">
				Unidades 2
			</th>
			<th class="puntuacion">
				puntuacion
			</th>
			<?php $puesto = 1;
			foreach ($this->lista as $key ) {  ?>

				<tr>
					<td>
						<?php echo $puesto ; ?>
					</td>
					<td>
						<?php  echo $key['TITULO1'], " <-> ",$key['TITULO2'] ; ?>
					</td>
					<td>
						<?php echo $key['UNIDADES1'] ; ?>
					</td>
					<td>
						<?php echo $key['UNIDADES2'] ; ?>
					</td>
					<td>
						<?php echo $key['PUNTUACION1'] ; ?>
					</td>
					<td>
						<a href = "../Controller/INTERCAMBIOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
				</tr>
			<?php $puesto = $puesto + 1; 
				}		?>
			
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