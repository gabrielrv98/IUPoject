<?php
//Clase : ESPACIO_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra todos los campos con los datos del espacio
//-------------------------------------------------------
class ESPACIO_SHOWCURRENT {

	var $lista;
	var $datos;
	var $profesores;

	function __construct($lista,$profesores){
		session_start();
		$this->lista = $lista;
		$this->profesores = $profesores;
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
			<th class="CodEspacio">
				<?php echo $strings['CodEspacio']; ?>
			</th>
			<th class="CodEdificio">
				<?php echo $strings['CodEdificio']; ?>
			</th>
			<th class="CodCentro">
				<?php echo $strings['CodCentro']; ?>
			</th>
			<th class="tipo">
				<?php echo $strings['tipo']; ?>
			</th>
			<th class="supEspacio">
				<?php echo $strings['supEspacio']; ?>
			</th>
			<th class="nInventary">
				<?php echo $strings['nInventary']; ?>
			</th>


			<tr>
				<td>
					<?php echo $this->lista['CODESPACIO'] ; ?>
				</td>
				<td>
					<?php  
					echo $this->lista['CODEDIFICIO']; ?>
				</td>
				<td>
					<?php echo $this->lista['CODCENTRO'] ; ?>
				</td>
				<td>
					<?php echo $this->lista['TIPO'] ; ?>
				</td>
				<td>
					<?php echo $this->lista['SUPERFICIEESPACIO'] ; ?>
				</td>
				<td>
					<?php echo $this->lista['NUMINVENTARIOESPACIO'] ; ?>
				</td>
				<td>
					<a href = "../Controller/ESPACIO_Controller.php?action=EDIT&&espacio=<?php echo $this->lista['CODESPACIO']; ?>"  > 
						<img src='../View/icon/edituser.ico'>
					</a>
				</td>
				<td>
					<a href = "../Controller/ESPACIO_Controller.php?action=DELETE&&espacio=<?php echo $this->lista['CODESPACIO']; ?>"  > 
						<img src='../View/icon/deleteuser.ico'>
					</a>
				</td>
			</tr>

		</table>

		<p><?php echo $strings['profEspAso']?></p>
		<?php if($this->profesores != null){ ?>
		<ul>
			<?php foreach ($this->profesores as $key ) {?>

				<li>
					<a href = "../Controller/PROF_ESPACIO_Controller.php?action=SHOWCURRENT&&DNI=<?php echo $key['DNI']; ?>&&codE=<?php echo $key['CODESPACIO']; ?>">
						<?php echo $key['DNI'] . "-" . $key['CODESPACIO'] ; ?>
					</a>
				</li>
			<?php }  ?>
		</ul>

		<?php } ?>

		<br>

		<a href='../Controller/ESPACIO_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>

		<?php
		include '../View/Footer.php';
	}

}

?>