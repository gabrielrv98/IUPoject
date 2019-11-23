<?php
//Clase : PROFESOR_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra todos los campos con los datos de los profesores
//-------------------------------------------------------

class PROFESOR_SHOWCURRENT {

	var $lista;
	var $datos;
	var $titulaciones;
	var $espacios;

	function __construct($lista,$titulaciones,$espacios){
		session_start();
		//se recogen los datos a mostrar
		$this->lista = $lista;
		$this->titulaciones = $titulaciones;		
		$this->espacios = $espacios;
		$this->render();
	}

	function render(){
	//se incluye el diccionario correcto
		include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';

		?>
		<head>
			<title><?php echo $strings['TShowC']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>

		<h1><?php echo $strings['TShowC']; ?></h1>
		<table border="1">
			<!--Campos que se van a mostrar-->
			<th>
				DNI
			</th>
			<th>
				<?php echo $strings['name']; ?>
			</th>
			<th>
				<?php echo $strings['surname']; ?>
			</th>
			<th>
				Area
			</th>
			<th>
				<?php echo $strings['departamento']; ?>
			</th>

			<tr>
				<!--Campos con los valores del usuario del dni-->
				<td>
					<?php echo $this->lista['DNI'] ; ?>
				</td>
				<td>
					<?php  
					echo $this->lista['NOMBREPROFESOR']; ?>	
				</td>
				<td>
					<?php echo $this->lista['APELLIDOSPROFESOR'] ; ?>
				</td>
				<td>
					<?php echo $this->lista['AREAPROFESOR'] ; ?>
				</td>
				<td>
					<?php echo $this->lista['DEPARTAMENTOPROFESOR'] ; ?>
				</td>
				<td>
					<a href = "../Controller/PROFESOR_Controller.php?action=EDIT&&DNI=<?php echo $this->lista['DNI']; ?>"  > 
						<img src='../View/icon/edituser.ico'>
					</a>
				</td>
				<td>
					<a href = "../Controller/PROFESOR_Controller.php?action=DELETE&&DNI=<?php echo $this->lista['DNI']; ?>"  > 
						<img src='../View/icon/deleteuser.ico'>
					</a>
				</td>
			</tr>
			
		</table>

		<p><?php echo $strings['profTitAso']; ?></p>
		<?php if($this->titulaciones != null){ ?>
		<ul>
			<?php foreach ($this->titulaciones as $key ) { ?>

				<li>
					<a href = "../Controller/PROF_TITULACION_Controller.php?action=SHOWCURRENT&&DNI=<?php echo $key['DNI']; ?>&&codT=<?php echo $key['CODTITULACION']; ?>">
						<?php echo $key['DNI'] . "-" . $key['CODTITULACION'] ; ?>
					</a>
				</li>
			<?php }  ?>
		</ul>
		<?php } ?>

		<p><?php echo $strings['profEspAso']; ?></p>
		<?php if($this->espacios != null){ ?>
		<ul>
			<?php foreach ($this->espacios as $key ) {?>

				<li>
					<a href = "../Controller/PROF_ESPACIO_Controller.php?action=SHOWCURRENT&&DNI=<?php echo $key['DNI']; ?>&&codE=<?php echo $key['CODESPACIO']; ?>">
						<?php echo $key['DNI'] . "-" . $key['CODESPACIO'] ; ?>
					</a>
				</li>
			<?php }  ?>
		</ul>

		<?php } ?>

		<br>

		<a href='../Controller/PROFESOR_Controller.php'> <?php echo $strings['Volver']; ?> </a>

		<?php
		include '../View/Footer.php';
	}

}

?>