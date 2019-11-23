<?php

//Clase : EDIFICIO_SHOWALL_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los edificios
//-------------------------------------------------------
class EDIFICIO_SHOWALL {

	var $lista;
	var $datos;


	function __construct($datos){
		session_start();
		$this->lista = $datos->fetch_array();//first row of the output
		$this->datos = $datos;
		
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
		
		<head>
			<title><?php echo $strings['TShowAll']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>
 
		<h1><?php echo $strings['TShowAll']; ?></h1>
		<a href = '../Controller/EDIFICIO_Controller.php?action=ADD' style="color:#FFFFFF;">
			 <img src='../View/icon/adduser.ico'>
		</a> 
		<a href = '../Controller/EDIFICIO_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<table border ="1">
			<th>
				<?php echo $strings['CodEdificio']; ?>
			</th>
			<th>
				<?php echo $strings['NomEdificio']; ?>
			</th>
			<th>
				<?php echo $strings['DirEdificio']; ?>
			</th>
			<th>
				<?php echo $strings['CampusEdifio']; ?>
			</th>

			<?php 
			while ($this->lista != null) { ?>

				<tr>
					<td>
						<?php echo $this->lista['CODEDIFICIO'] ; ?>
					</td>
					<td>
						<?php  
						echo $this->lista['NOMBREEDIFICIO']; ?>
					</td>
					<td>
						<?php echo $this->lista['DIRECCIONEDIFICIO'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['CAMPUSEDIFICIO'] ; ?>
					</td>

					<td>
						<a href = "../Controller/EDIFICIO_Controller.php?action=EDIT&&codigo=<?php echo $this->lista['CODEDIFICIO']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/EDIFICIO_Controller.php?action=SHOWCURRENT&&codigo=<?php echo $this->lista['CODEDIFICIO']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/EDIFICIO_Controller.php?action=DELETE&&codigo=<?php echo $this->lista['CODEDIFICIO']; ?>"  > 
							<img src='../View/icon/deleteuser.ico'>
						</a>
					</td>
				</tr>
			<?php 
				$this->lista = $this->datos->fetch_array();
			}
			?>
			
		</table>
		<br>
		<a href="../../Controller/EDIFICIO_Controller.php"> <?php echo $strings['Volver'] ; ?> </a>
 
		<br>

		<?php
		include '../View/Footer.php';
	}

}

?>