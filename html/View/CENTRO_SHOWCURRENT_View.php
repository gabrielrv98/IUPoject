<?php
//Clase : CENTRO_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra todos los campos con los datos del centro
//-------------------------------------------------------
class CENTRO_SHOWCURRENT {

	var $lista;
	var $datos;
	var $titulaciones;
	var $espacios;

	function __construct($lista, $titulaciones,$espacios){
		session_start();
		$this->lista = $lista;
		$this->titulaciones = $titulaciones;
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

		<h1 class="TShowC"><?php echo $strings['TShowC']; ?></h1>
		<?php include '../View/Header.php'; //header necesita los strings ?>

		<table border="1">
			<th class="CodCentro">
				<?php echo $strings['CodCentro']; ?>
			</th>
			<th class="CodEdificio">
				<?php echo $strings['CodEdificio']; ?>
			</th>
			<th class="NomCentro">
				<?php echo $strings['NomCentro']; ?>
			</th>
			<th class="DirCentro">
				<?php echo $strings['DirCentro']; ?>
			</th>
			<th class="RespCentro">
				<?php echo $strings['RespCentro']; ?>
			</th>


			<tr>
				<td>
						<?php echo $this->lista['CODCENTRO'] ; ?>
					</td>
					<td>
						<?php  echo $this->lista['CODEDIFICIO']; ?>
					</td>
					<td>
						<?php  echo $this->lista['NOMBRECENTRO']; ?>
					</td>
					<td>
						<?php echo $this->lista['DIRECCIONCENTRO'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['RESPONSABLECENTRO'] ; ?>
					</td>
					<td>
						<a href = "../Controller/CENTRO_Controller.php?action=EDIT&&centro=<?php echo $this->lista['CODCENTRO']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/CENTRO_Controller.php?action=DELETE&&centro=<?php echo $this->lista['CODCENTRO']; ?>"  > 
							<img src='../View/icon/deleteuser.ico'>
						</a>
					</td>
				</td>
			</tr>

		</table>

		<p class="titAso"><?php echo $strings['titAso']?></p>
		<?php if($this->titulaciones != null){ ?>
		<ul>
			<?php foreach ($this->titulaciones as $key ) {?>

				<li>
					<a href = "../Controller/TITULACION_Controller.php?action=SHOWCURRENT&&CODTITULACION=<?php echo $key['CODTITULACION']; ?>" >
						<?php echo $key['NOMBRETITULACION']; ?>
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

		<a href='../Controller/CENTRO_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>

		<?php
		include '../View/Footer.php';
	}

}

?>