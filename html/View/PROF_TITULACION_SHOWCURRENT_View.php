<?php
//Clase : PROF_TITULACION_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra todos los campos con los datos de  la relacion profesor-titulacion
//-------------------------------------------------------
class PROF_TITULACION_SHOWCURRENT {

	var $lista;
	var $datos;


	function __construct($lista){
		session_start();
		$this->lista = $lista;
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
				DNI
			</th>
			<th>
				<?php echo $strings['CODTITULACION']; ?>
			</th>
			<th>
				<?php echo $strings['ANHOACADEMICO']; ?>
			</th>


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
						<a href = "../Controller/PROF_TITULACION_Controller.php?action=DELETE&&DNI=<?php echo $this->lista['DNI']; ?>&&codT=<?php echo $this->lista['CODTITULACION']; ?>"  > 
							<img src='../View/icon/deleteuser.ico'>
						</a>
					</td>
			</tr>

		</table>
		<br>

		<a href='../Controller/PROF_TITULACION_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>

		<?php
		include '../View/Footer.php';
	}

}

?>