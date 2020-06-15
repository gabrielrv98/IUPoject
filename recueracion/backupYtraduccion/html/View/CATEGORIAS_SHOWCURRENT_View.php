<?php
//Clase : CATEGORIAS_SHOWCURRENT_View
//Creado el : 3-06-20
//Creado por: grvidal
//Muestra los detalles de la categoria seleccionada
//-------------------------------------------------------

class CATEGORIAS_SHOWCURRENT {

	var $lista;


	function __construct($datos){
		$this->lista = $datos;
		$this->render();
	}

	function render(){  
		?>
		
		<head>
			<title class="TShowC"><?php echo $strings['TShowC']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings
		?>

		
		<h1 class="TShowC"><?php echo $strings['TShowC']; ?></h1>
		<div>
		<table border = ¨1¨>
			<th>
				ID
			</th>
			<th class="nombreCategoria">
				<?php echo $strings['nombreCategoria']; ?>
			</th>
			
				<tr>
					<td>
						<?php  
						echo $this->lista['ID']; ?>
					</td>
					<td>
						<?php echo $this->lista['NOMBRE_CATEGORIA'] ; ?>
					</td>
				</tr>
			
		</table>
	</div>

	<label   class="productosEnCategoria"><?php echo $strings['productosEnCategoria'] ?> </label> 

		<br>
		<a href="../../Controller/CATEGORIAS_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>