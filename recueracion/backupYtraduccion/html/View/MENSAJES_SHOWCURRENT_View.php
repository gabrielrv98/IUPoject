<?php
//Clase : MENSAJES_SHOWCURRENT_View
//Creado el : 18-06-20
//Creado por: grvidal
//Muestra los detalles de la categoria seleccionada
//-------------------------------------------------------

class MENSAJES_SHOWCURRENT {

	var $lista;

	function __construct($datos){
		$this->lista = $datos;
		$this->render();
	}

	function render(){  
		?>
		
		<head>
			<title class="TShowC"></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings
		?>

		
		<h1 class="TShowC"></h1>
		<div>
		<table border = ¨1¨>
			<th class="idIntercambio">
				ID intercambio
			</th>
			<th class="fecha">
				FECHA
			</th>
			<th class="usuario">
				USUARIO
			</th>
			<th class="coment">
				COMENT
			</th>
				<tr>
					<td>
						<?php echo $this->lista['ID_INTERCAMBIO'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['FECHA'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['LOGIN_USUARIO'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['CONTENIDO'] ; ?>
					</td>
				</tr>
			
		</table>
	</div>
	
	<br>

	<div>
		<label   class="usuario" style="font-size: 150%; text-decoration: underline;"></label> <br>
		<br>
		<a href="../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&&login=<?php echo $this->lista['LOGIN_USUARIO']; ?>"> <?php echo $this->lista['LOGIN_USUARIO'] ?> </a><br>
	</div>

	<div>
		<label   class="intercambios" style="font-size: 150%; text-decoration: underline;"></label> <br>
		<br>
		<a href="../Controller/INTERCAMBIOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->lista['ID_INTERCAMBIO']; ?>"> <?php echo $this->lista['ID_INTERCAMBIO'] ?> </a><br>
	</div>
		
		<br>
		<a href="../../Controller/MENSAJES_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>