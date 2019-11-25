<?php
//Clase : TITULACION_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos con los datos de la titulacion
//-------------------------------------------------------
class TITULACION_SHOWCURRENT {

	var $lista;
	var $datos;
	var $profTit;

	function __construct($lista,$profTit){
		session_start();
		$this->lista = $lista;
		$this->profTit = $profTit;
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';

		?>
		<head>
			<title><?php echo $strings['TShowC']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>

		<h1><?php echo $strings['TShowC']; ?></h1>
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
						<a href = "../Controller/TITULACION_Controller.php?action=DELETE&&CODTITULACION=<?php echo $this->lista['CODTITULACION']; ?>"  > 
							<img src='../View/icon/deleteuser.ico'>
						</a>
					</td>
			</tr>

		</table>

		<p><?php echo $strings['profTitAso']?></p>
		<?php if($this->profTit != null){ ?>
		<ul>
			<?php foreach ($this->profTit as $key ) {?>

				<li>
					<a href = "../Controller/PROF_TITULACION_Controller.php?action=SHOWCURRENT&&DNI=<?php echo $key['DNI']; ?>&&codT=<?php echo $key['CODTITULACION']; ?>">
						<?php echo $key['DNI'] . "-" . $key['CODTITULACION'] ; ?>
					</a>
				</li>
			<?php }  ?>
		</ul>

		<?php } ?>

		<br>

		<a href='../Controller/TITULACION_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>

		<?php
		include '../View/Footer.php';
	}

}

?>