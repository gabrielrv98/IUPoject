<?php

//Clase : CENTRO_SHOWALL_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los centros
//-------------------------------------------------------
class CENTRO_SHOWALL {

	var $lista;


	function __construct($datos){
		session_start();
		$this->lista =  $datos;
		
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
		<a href = '../Controller/CENTRO_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/adduser.ico'>
		</a>
		<a href = '../Controller/CENTRO_Controller.php?action=SEARCH' style="color:#FFFFFF;">
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<table border="1">
			<th>
				<?php echo $strings['CodCentro']; ?>
			</th>
			<th>
				<?php echo $strings['CodEdificio']; ?>
			</th>
			<th>
				<?php echo $strings['NomCentro']; ?>
			</th>
			<th>
				<?php echo $strings['DirCentro']; ?>
			</th>
			<th>
				<?php echo $strings['RespCentro']; ?>
			</th>

			<?php 
			foreach ($this->lista as $key ) {
			?>

				<tr>
					<td>
						<?php echo $key['CODCENTRO'] ; ?>
					</td>
					<td>
						<?php  echo $key['CODEDIFICIO']; ?>
					</td>
					<td>
						<?php  echo $key['NOMBRECENTRO']; ?>
					</td>
					<td>
						<?php echo $key['DIRECCIONCENTRO'] ; ?>
					</td>
					<td>
						<?php echo $key['RESPONSABLECENTRO'] ; ?>
					</td>

					<td>
						<a href = "../Controller/CENTRO_Controller.php?action=EDIT&&centro=<?php echo $key['CODCENTRO']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/CENTRO_Controller.php?action=SHOWCURRENT&&centro=<?php echo $key['CODCENTRO']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/CENTRO_Controller.php?action=DELETE&&centro=<?php echo $key['CODCENTRO']; ?>"  > 
							<img src='../View/icon/deleteuser.ico'>
						</a>
					</td>
				</tr>
			<?php 
			}
			?>
			
		</table>
		<br>
		<a href="../../Controller/CENTRO_Controller.php"> <?php echo $strings['Volver'] ; ?> </a>

		<br>

		<?php
		include '../View/Footer.php';
	}

}

?>