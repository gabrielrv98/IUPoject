<?php
//Clase : EDIFICIO_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra todos los campos con los datos del edificio
//-------------------------------------------------------
class EDIFICIO_SHOWCURRENT {

	var $lista;
	var $datos;
	var $centros;
	var $espacios;

	function __construct($lista,$centros,$espacios){
		session_start();
		$this->lista = $lista;
		$this->centros = $centros;
		$this->espacios = $espacios;
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';

		?>
		<head>
			<title class="TShowC"><?php echo $strings['TShowC']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>
		<?php include '../View/Header.php'; //header necesita los strings ?>

		<h1 class="TShowC"><?php echo $strings['TShowC']; ?></h1>
		<table border="1">
			<th class="CodEdificio">
				<?php echo $strings['CodEdificio']; ?>
			</th>
			<th class="NomEdificio">
				<?php echo $strings['NomEdificio']; ?>
			</th>
			<th class="DirEdificio">
				<?php echo $strings['DirEdificio']; ?>
			</th>
			<th class="CampusEdifio">
				<?php echo $strings['CampusEdifio']; ?>
			</th>


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
					<a href = "../Controller/EDIFICIO_Controller.php?action=DELETE&&codigo=<?php echo $this->lista['CODEDIFICIO']; ?>"  > 
						<img src='../View/icon/deleteuser.ico'>
					</a>
				</td>
			</tr>
		</table>

		<p class="centAso"><?php echo $strings['centAso']?></p>
		<?php if($this->centros != null){ ?>
		<ul>
			<?php foreach ($this->centros as $key ) {?>

				<li>
					<a href = "../Controller/CENTRO_Controller.php?action=SHOWCURRENT&&centro=<?php echo $key['CODCENTRO']; ?>">
						<?php echo $key['NOMBRECENTRO']; ?>
					</a>
				</li>
			<?php }  ?>
		</ul>

		<?php } ?>

		<p class="espAso"><?php echo $strings['espAso']?></p>
		<?php if($this->espacios != null){ ?>
		<ul>
			<?php foreach ($this->espacios as $key ) {?>

				<li>
					<a href = "../Controller/ESPACIO_Controller.php?action=SHOWCURRENT&&espacio=<?php echo $key['CODESPACIO']; ?>">
						<?php echo $key['CODESPACIO']; ?>
					</a>
				</li>
			<?php }  ?>
		</ul>

		<?php } ?>

		<br>

		<a href='../Controller/EDIFICIO_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>

		<?php
		include '../View/Footer.php';
	}

}

?>