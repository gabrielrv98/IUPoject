<?php

class Index {

	var $productos;

	function __construct($productos){
		$this->productos = $productos;
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_SPANISH.php';

		?>
	<head>
			<title class="Intercambio de tiempo"> <?php echo $strings['Intercambio de tiempo']; ?></title>

	</head>

		<?php
		include '../View/Header.php';
		
?>

	<label > <h1>Aqui empieza la vista index</h1></label>
	<p> En esta aplicacion ppuedes comprar o vender productos hechos a mano de agricultura</p>

	<table border = ¨0¨>
		<?php 
			foreach ($this->productos as $key ) { ?>
		<td>			
			<div>
				<img src="<?php echo $key['FOTO'];?>" height="42" width="42">
				<br>
				<label> 
					<?php echo $key['TITULO']; ?>
				</label>
				<br>
				<label>
					<?php echo $key['DESCRIPCION'] ; ?>
				</label>
			</div>
		</td>
	<?php } ?>
</table>
<br><br>

<?php
	include '../View/Footer.php';
	}// fin del metodo render


}

?>