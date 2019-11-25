<?php

//Clase : PROF_TITULACION_SHOWALL_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de la relacion profesor-titulacion
//-------------------------------------------------------
class PROF_TITULACION_SHOWALL {

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
		<a href = '../Controller/PROF_TITULACION_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/adduser.ico'>
		</a> 
		<a href = '../Controller/PROF_TITULACION_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<table border="1">
			<th>
				DNI
			</th>
			<th>
				<?php echo $strings['CODTITULACION']; ?>
			</th>
			<th>
				<?php echo $strings['ANHOACADEMICO']; ?>
			</th>

			<?php 
			while ($this->lista != null) { ?>

				<tr>
					<td>
						<?php echo $this->lista['DNI'] ; ?>
					</td>
					<td>
						<?php  echo $this->lista['CODTITULACION']; ?>
					</td>
					<td>
						<?php  echo $this->lista['ANHOACADEMICO']; ?>
					</td>

					<td>
						<a href = "../Controller/PROF_TITULACION_Controller.php?action=EDIT&&DNI=<?php echo $this->lista['DNI'];?>&&codT=<?php echo $this->lista['CODTITULACION']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/PROF_TITULACION_Controller.php?action=SHOWCURRENT&&DNI=<?php echo $this->lista['DNI']; ?>&&codT=<?php echo $this->lista['CODTITULACION']; ?>"  >
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/PROF_TITULACION_Controller.php?action=DELETE&&DNI=<?php echo $this->lista['DNI']; ?>&&codT=<?php echo $this->lista['CODTITULACION']; ?>"  > 
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
		<a href="../../Controller/PROF_TITULACION_Controller.php"><img src="../View/icon/back.ico" height="32" width="32"> </a>

		<br>

		<?php
		include '../View/Footer.php';
	}

}

?>