<?php
//Clase : CATEGORIAS_SHOWCURRENT_View
//Creado el : 7-06-20
//Creado por: grvidal
//Muestra una tabla con los atributos de la categoria, ademas muestra los productos en dicha categoria.
//-------------------------------------------------------

class CATEGORIAS_SHOWCURRENT {

	var $lista;
	var $productos;

	function __construct($datos,$productos){

		$this->productos = $productos;
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
	
	<br>
	<div>
		<label   class="productosEnCategoria" style="font-size: 150%; text-decoration: underline;"></label> <br><br>
		<table border = ¨0¨>
				<?php $columnas = 0;
					foreach ($this->productos as $key ) { 
						if ($columnas == 0) { ?>

					<tr>
					<?php	 } ?>
				<td>		
					<div>
						<a href="../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID_PRODUCTO']; ?>">
							<img src='../View/icon/showuser.ico'>
						</a>
						<img src="<?php echo $key['FOTO'];?>" height="42" width="42">
						<br>
						<label> 
							<?php echo $key['TITULO']; ?>
						</label>
						<br>
						<label size ="10">
							<?php echo strlen($key['DESCRIPCION']) > 25 ? substr($key['DESCRIPCION'], 0,25): $key['DESCRIPCION'] ; ?>
						</label>
					</div>
				</td>
			<?php $columnas = $columnas + 1;
				if( $columnas == 5){
					$columnas = 0;  ?>
				</tr>
				<?php } 
				} ?>
		</table>
	</div>
		<br>
		<a href="../../Controller/CATEGORIAS_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>