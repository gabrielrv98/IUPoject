<?php
//Clase : USUARIO_SHOWALL_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los usuarios
//-------------------------------------------------------

class USUARIOS_SHOWALL {

	var $lista;


	function __construct($datos){
		//session_start();
		$this->lista = $datos;
		$this->render();
	}

	function render(){
	
		include_once '../Locale/Strings_' . $_SESSION['idioma'] . '.php';  
		?>
		
		<head>
			<title class="TShowAll"><?php echo $strings['TShowAll']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>

		
		<h1 class="TShowAll"><?php echo $strings['TShowAll']; ?></h1>
		<a href = '../Controller/USUARIOS_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/adduser.ico'>
		</a>
		<a href = '../Controller/USUARIOS_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<div>
		<table border = ¨1¨>
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
			<th class="email">
				Email
			</th>
			<th class="tipo_usuario">
				<?php echo $strings['tipo_usuario']; ?>
			</th>
			<?php 
			foreach ($this->lista as $key ) {  
				//echo var_dump($key); ?>

				<tr>
					<td>
						<?php echo $key['LOGIN'] ; ?>
					</td>
					<td>
						<?php  
						echo $key['DNI']; ?>
					</td>
					<td>
						<?php echo $key['NOMBRE'] ; ?>
					</td>
					<td>
						<?php echo $key['APELLIDOS'] ; ?>
					</td>
					<td>
						<?php  
						echo $key['EMAIL']; 
						?>
					</td>
					<td>
						<?php  
						echo $key['TIPO_USUARIO']; 
						?>
					</td>
					<td>
						<a href = "../Controller/USUARIOS_Controller.php?action=EDIT&&login=<?php echo $key['LOGIN']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&&login=<?php echo $key['LOGIN']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<td>
						<a href = "../Controller/USUARIOS_Controller.php?action=DELETE&&login=<?php echo $key['LOGIN']; ?>"  > 
							<img src='../View/icon/deleteuser.ico'>
						</a>
					</td>
				</tr>
			<?php }		?>
			
		</table>
	</div>
		<br>
		<a href="../../Controller/Index_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>