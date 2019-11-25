<?php
//Clase : USUARIO_SHOWALL_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los usuarios
//-------------------------------------------------------

class USUARIOS_SHOWALL {

	var $lista;


	function __construct($datos){
		session_start();
		$this->lista = $datos;
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
		<a href = '../Controller/USUARIOS_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/adduser.ico'>
		</a>
		<a href = '../Controller/USUARIOS_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<div>
		<table border = ¨1¨>
			<th>
				<?php echo $strings['Login']; ?>
			</th>
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
				Email
			</th>
			<?php 
			foreach ($this->lista as $key ) {  ?>
				<tr>
					<td>
						<?php echo $key['login'] ; ?>
					</td>
					<td>
						<?php  
						echo $key['DNI']; ?>
					</td>
					<td>
						<?php echo $key['nombre'] ; ?>
					</td>
					<td>
						<?php echo $key['apellidos'] ; ?>
					</td>
					<td>
						<?php  
						echo $key['email']; 
						?>
					</td>
					<td>
						<a href = "../Controller/USUARIOS_Controller.php?action=EDIT&&login=<?php echo $key['login']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&&login=<?php echo $key['login']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/USUARIOS_Controller.php?action=DELETE&&login=<?php echo $key['login']; ?>"  > 
							<img src='../View/icon/deleteuser.ico'>
						</a>
					</td>
				</tr>
			<?php }		?>
			
		</table>
	</div>
		<br>
		<a href="../../Controller/USUARIOS_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>

		<?php
		include '../View/Footer.php';
	}

}

?>