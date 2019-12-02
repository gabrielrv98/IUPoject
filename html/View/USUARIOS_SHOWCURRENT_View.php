<?php
//Clase : USUARIO_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra todos los campos con los datos del usuario
//-------------------------------------------------------

class USUARIOS_SHOWCURRENT {

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

		<h1> <?php echo $strings['TShowC']; ?> </h1>
		<table border="1">
			<th class="Login">
				<?php echo $strings['Login']; ?>
			</th>
			<th class="DNI">
				DNI
			</th>
			<th class="name">
				<?php echo $strings['name']; ?>
			</th>
			<th class="surname">
				<?php echo $strings['surname']; ?>
			</th>
			<th class="tlf">
				<?php echo $strings['tlf']; ?>
			</th>
			<th class="email">
				Email
			</th>
			<th class="bDate">
				<?php echo $strings['bDate']; ?>
			</th>
			<th class="picture">
				<?php echo $strings['picture']; ?>
			</th>
			<th class="sexo">
				<?php echo $strings['sexo']; ?>
			</th>
			<tr>
				<td>
					<?php echo $this->lista['login'] ; ?>
				</td>
				<td>
					<?php echo $this->lista['DNI']; ?>
				</td>
				<td>
					<?php echo $this->lista['nombre'] ; ?>
				</td>					
				<td>
					<?php echo $this->lista['apellidos'] ; ?>
				</td>
				<td>
					<?php echo $this->lista['telefono']; ?>
				</td>
				<td>
					<?php echo $this->lista['email']; ?>
				</td>
				<td>
					<?php echo $this->lista['FechaNacimiento']; ?>
				</td>
				<td>
					<img src="<?php echo $this->lista['fotopersonal'];?>" height="42" width="42">
				</td>
				<td class="<?php echo $this->lista['sexo']; ?>">
					<?php echo $strings[$this->lista['sexo']]; ?>
				</td>
			</tr>

		</table>
		<br>

		<a href='../../Controller/USUAIOS_CONTROLER.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>


		<?php
		include '../View/Footer.php';
	}

}

?>