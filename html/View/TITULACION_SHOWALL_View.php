<?php

//Clase : TITULACION_SHOWALL_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de las  titulaciones
//-------------------------------------------------------

class TITULACION_SHOWALL {

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
		<a href = '../Controller/TITULACION_Controller.php?action=ADD' style="color:#FFFFFF;">
			 <img src='../View/icon/adduser.ico'>
		</a>
		<a href = '../Controller/TITULACION_Controller.php?action=SEARCH'>
			 <img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<table border="1">
			<th>
				<?php echo $strings['codeTitulation']; ?>
			</th>
			<th>
				<?php echo $strings['codeCenter']; ?>
			</th>
			<th>
				<?php echo $strings['nameTitulation']; ?>
			</th>
			<th>
				<?php echo $strings['responsableTitulation']; ?>
			</th>

			<?php 
			while ($this->lista != null) {  ?>
				<tr>
					<td>
						<?php echo $this->lista['CODTITULACION'] ; ?>
					</td>
					<td>
						<?php  
						echo $this->lista['CODCENTRO']; ?>
					</td>
					<td>
						<?php echo $this->lista['NOMBRETITULACION'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['RESPONSABLETITULACION'] ; ?>
					</td>

					<td>
						<a href = "../Controller/TITULACION_Controller.php?action=EDIT&&CODTITULACION=<?php echo $this->lista['CODTITULACION']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/TITULACION_Controller.php?action=SHOWCURRENT&&CODTITULACION=<?php echo $this->lista['CODTITULACION']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/TITULACION_Controller.php?action=DELETE&&CODTITULACION=<?php echo $this->lista['CODTITULACION']; ?>"  > 
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
		<a href="../../Controller/TITULACION_Controller.php"> <?php echo $strings['Volver'] ; ?> </a>
		<?php
		include '../View/Footer.php';
	}

}

?>